<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\QueryBuilder\BankQueryBuilder;

class BankController extends Controller
{
    public function apiIndex()
    {
        $banks = BankQueryBuilder::getAllBanks();
        return response()->json($banks);
    }

    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10'
        ]);

        BankQueryBuilder::createBank($validated);

        return response()->json(['message' => 'Bank created successfully!'], 201);
    }

    public function apiDestroy($id)
    {
        $deleted = BankQueryBuilder::deleteBank($id);
        
        if (!$deleted) {
            return response()->json(['message' => 'Bank not found'], 404);
        }

        return response()->json(['message' => 'Bank deleted successfully!']);
    }
}