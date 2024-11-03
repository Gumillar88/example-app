<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Bank;
use App\Services\BankService;
use App\Models\Transfer;
use App\Helpers\AppHelpers;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    private $bankService;
    private $helper;

    public function __construct(BankService $bankService)
    {
        $this->bankService = $bankService;
        $this->helper = new AppHelpers();
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'bank_id'           => 'required|exists:banks,id',
            'account_number'    => 'required|string',
            'type'              => 'required|in:inhouse,transfer-online',
            'currency'          => 'required|in:IDR,USD',
            'amount'            => 'required|numeric',
            'status'            => 'required|in:pending,completed',
        ]);

        if ($validator->fails()) {
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
        $bank = Bank::find($input['bank_id']);

        $response = $this->bankService->sendMoney(
            $input['account_number'],
            $input['amount'],
            $input['type'] // Prioritaskan tipe transfer dari input, tetapi tentukan tipe terbaik di service
        );

        if ($response['status'] == 'success') {
            return redirect()->route('transfers.index')->with('success', 'Transfer created and sent successfully!');
        }

        return redirect()->route('transfers.index')->with('error', 'Transfer created but failed to send.');
    }
}