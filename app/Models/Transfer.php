<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'bank_id',
        'account_number',
        'type',
        'currency',
        'amount',
        'status'
    ];

    public function getBank()
    {
        return DB::table('banks')
            ->where('id', $this->bank_id)
            ->first();
    }

    public static function getAllTransfers()
    {
        return DB::table('transfers')->get();
    }
}