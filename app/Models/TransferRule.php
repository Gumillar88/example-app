<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferRule extends Model
{
    protected $table = 'transfer_rules';
    protected $fillable = ['bank_id', 'transfer_type', 'priority', 'cost', 'start_time', 'end_time'];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}