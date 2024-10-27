<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Helpers\AppHelpers;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    public function __construct()
    {
        $this->helper    = new AppHelpers();

    }
    
    public function index()
    {
        $banks = Bank::getAllBanks();

        return view('banks.index', compact('banks'));
    }

    public function create()
    {
        return view('banks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10'
        ]);

        DB::table('banks')->insert($validated);

        return redirect()->route('banks.index')->with('success', 'Bank created successfully!');
    }

    public function showTransfers($bankId)
    {
        $bank = Bank::find($bankId);
        $transfers = $bank ? $bank->getTransfers() : null;
        
        $data = [
            'bank'      => compact('bank'),
            'transfers' => $transfers,
            '_getBank'  => $this->helper->_getBank(),
        ];

        return view('banks.transfers', $data);
    }

    public function destroy($id)
    {
        DB::table('banks')->where('id', $id)->delete();
        return redirect()->route('banks.index')->with('success', 'Bank deleted successfully!');
    }
}