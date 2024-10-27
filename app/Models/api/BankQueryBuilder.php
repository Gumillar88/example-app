<?php

namespace App\Models\Api;

use Illuminate\Support\Facades\DB;

class BankQueryBuilder
{
    public static function getAllBanks()
    {
        return DB::table('banks')->get();
    }

    public static function createBank($data)
    {
        return DB::table('banks')->insert($data);
    }

    public static function deleteBank($id)
    {
        return DB::table('banks')->where('id', $id)->delete();
    }
}