<?php

namespace App\Services\Interfaces;

class AlphaBankInterface
{
    private $connectionParams;

    public function __construct(array $params)
    {
        $this->connectionParams = $params;
    }

    public function transfer($account, $amount, $transferType)
    {
        // Lakukan proses transfer ke Bank Alpha
        // Simulasi transfer ke Alpha dengan menggunakan parameter koneksi

        return [
            'status' => 'success',
            'message' => "Transfer to {$account} amount {$amount} using Alpha bank was successful."
        ];
    }
}