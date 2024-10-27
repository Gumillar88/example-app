<?php
namespace App\Services;

use Carbon\Carbon;

class BankService
{
    public static function sendMoney($transfer)
    {
        // Get this time now();
        $currentTime    = Carbon::now()->format('H:i');
        $transferType   = $transfer['type']; // that is type {Inhouse / Online}
        $account    = $transfer['account_number'];
        $bankCode   = $transfer['bank_code'];
        $amount     = $transfer['amount'];
        $currency   = $transfer['currency'];

        // This is a logic when transfering with "type" => online
        if ($transferType === 'online') {
            // checking time when a transfering
            return self::handleOnlineTransfer($currentTime, $account, $bankCode, $amount, $currency);
        }

        return true;
    }

    private static function handleOnlineTransfer($currentTime, $account, $bankCode, $amount, $currency)
    {
        /*
        ** Menentukan bank mana yang bisa digunakan berdasarkan waktu
        */ 
        $banks = self::getAvailableBanks($currentTime, $currency);

        foreach ($banks as $bank) {
            $result = self::executeTransfer($bank, $account, $bankCode, $amount, $currency);
            if ($result) {
                return $result;
            }
        }

        return false;
    }

    private static function getAvailableBanks($currentTime, $currency)
    {
        /*
        ** Menentukan bank yang tersedia berdasarkan waktu
        ** (implementasikan logika waktu transfer sesuai kebutuhan)
        ** Example => using time now()
        */
        $availableBanks = [];

        if ($currentTime >= '00:00' && $currentTime < '04:00') {
            return $availableBanks; // Tidak ada transfer antar bank
        } elseif ($currentTime >= '04:00' && $currentTime < '10:00') {
            $availableBanks = ['Alpha', 'Beta', 'Charlie'];
        } elseif ($currentTime >= '10:00' && $currentTime < '17:00') {
            $availableBanks = ['Beta', 'Charlie', 'Alpha'];
        } elseif ($currentTime >= '17:00' && $currentTime < '22:00') {
            if ($currency === 'IDR') {
                $availableBanks = ['Charlie', 'Alpha', 'Beta'];
            } else {
                return []; // Nothing transfer with USD
            }
        } elseif ($currentTime >= '22:00') {
            $availableBanks = ['Beta'];
        }

        return $availableBanks;
    }

    private static function executeTransfer($bank, $account, $bankCode, $amount, $currency)
    {
        /*
        ** Memanggil metode sesuai dengan bank
        */ 
        switch ($bank) {
            case 'Alpha':
                return self::alphaTransfer($account, $bankCode, $amount, $currency);
            case 'Beta':
                return self::betaTransfer($account, $amount, $currency);
            case 'Charlie':
                return self::charlieTransfer($account, $bankCode, $amount, $currency);
            default:
                return false;
        }
    }

    private static function alphaTransfer($account, $bankCode, $amount, $currency)
    {
        /*
        ** Dummy implementation, gunakan interface sesuai
        */ 
        return true; // Working when transferring
    }

    private static function betaTransfer($account, $amount, $currency)
    {
        /*
        ** Dummy implementation, gunakan interface sesuai
        */ 
        return true; // Working when transferring
    }

    private static function charlieTransfer($account, $bankCode, $amount, $currency)
    {
        /*
        ** Dummy implementation, gunakan interface sesuai
        */ 
        return true; // Working when transferring
    }
}