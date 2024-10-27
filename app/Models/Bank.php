<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['name', 'code'];

    public function getTransfers()
    {
        return DB::table('transfers')
            ->where('bank_id', $this->id)
            ->get();
    }

    public static function getAllBanks()
    {
        return DB::table('banks')->get();
    }
}