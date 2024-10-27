<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Bank;
use App\Models\Transfer;
use App\Helpers\AppHelpers;

use App\Services\BankService;

use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    public function __construct()
    {
        $this->helper    = new AppHelpers();
    }

    public function index()
    {
        $transfers = Transfer::getAllTransfers();
        $data = [
            'transfers' => $transfers,
            '_getBank' => $this->helper->_getBank(),
        ];
        return view('transfers.index', $data);
    }

    public function create()
    {
        $banks = Bank::getAllBanks();
        return view('transfers.create', compact('banks'));
    }

    public function store(Request $request)
    {
        $input = $request->input();
        
        $validator = Validator::make($input, [
            'bank_id'           => 'required|exists:banks,id',
            'account_number'    => 'required|string',
            'type'              => 'required|in:inhouse,online',
            'currency'          => 'required|in:IDR,USD',
            'amount'            => 'required|numeric',
            'status'            => 'required|in:pending,completed'
        ]);


        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'bank_id'           => $input['bank_id'],
            'account_number'    => $input['account_number'],
            'type'              => $input['type'],
            'currency'          => $input['currency'],
            'amount'            => $input['amount'],
            'status'            => $input['status'],
        ];
        
        $transferId = DB::table('transfers')->insertGetId($data);

        $bankCode = DB::table('banks')->where('id', $input['bank_id'])->first();
        $transfer = array_merge($data, ['id' => $transferId], ['bank_code' => $bankCode->code]);

        $sendResult = BankService::sendMoney($transfer);

        if ($sendResult) {
            return redirect()->route('transfers.index')->with('success', 'Transfer created and sent successfully!');
        }

        return redirect()->route('transfers.index')->with('error', 'Transfer created but failed to send.');
    }
}