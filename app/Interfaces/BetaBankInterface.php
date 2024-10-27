<?php

namespace App\Interfaces;

interface BetaBankInterface
{
    public function transferInhouse(string $account, float $amount, string $currency): float;
    public function transferOnline(string $account, string $bankCode, float $amount, string $currency): float;
}