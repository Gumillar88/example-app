<?php

namespace App\Interfaces;

interface AlphaBankInterface
{
    public function checkBalance(string $currency): float;
    public function send(string $account, string $bankCode, float $amount, string $currency): bool;
}