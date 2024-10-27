<?php 

namespace App\Interfaces;

interface CharlieInterface
{
    public function getBalance(): array;
    public function transferIDR(string $account, int $transferType, string $bankCode, float $amount): int;
    public function transferUSD(string $account, int $transferType, string $bankCode, float $amount): int;
}