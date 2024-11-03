<?php 

namespace App\Services;

use App\Models\Bank;
use Illuminate\Support\Facades\DB;

class BankService
{
    /**
     * Mengirim uang berdasarkan aturan dan prioritas.
     * Pilih jenis transfer dengan biaya terendah (inhouse atau transfer-online).
     */
    public function sendMoney($accountNumber, $amount, $preferredType = null)
    {
        $rules = $this->getTransactionRules();

        $bank = Bank::where('account_number', $accountNumber)->first();

        if (!$bank) {
            return ['status' => 'error', 'message' => 'Bank not found'];
        }

        $transferType = $this->selectCostEffectiveType($bank, $amount, $rules, $preferredType);

        $response = $this->initiateTransfer($accountNumber, $amount, $transferType);

        return $response;
    }

    /**
     * Ambil aturan transaksi dari database atau konfigurasi.
     */
    private function getTransactionRules()
    {
        // Contoh implementasi untuk mendapatkan aturan dinamis
        return DB::table('transaction_rules')->get();
    }

    /**
     * Pilih tipe transfer yang paling hemat biaya.
     */
    private function selectCostEffectiveType($bank, $amount, $rules, $preferredType)
    {
        $costs = [
            'inhouse' => $this->calculateCost($bank, $amount, 'inhouse', $rules),
            'transfer-online' => $this->calculateCost($bank, $amount, 'transfer-online', $rules),
        ];

        if ($preferredType && isset($costs[$preferredType])) {
            return $preferredType;
        }

        // Pilih tipe dengan biaya terendah
        return array_search(min($costs), $costs);
    }

    /**
     * Inisialisasi transfer ke bank yang ditentukan.
     */
    private function initiateTransfer($accountNumber, $amount, $transferType)
    {
        // Lakukan logika transfer ke bank
        // Implementasikan logika sesuai API atau SDK yang ada
        return ['status' => 'success', 'message' => "Transferred $amount via $transferType"];
    }

    /**
     * Hitung biaya untuk transfer jenis tertentu.
     */
    private function calculateCost($bank, $amount, $type, $rules)
    {
        // Cari aturan yang sesuai dari database atau konfigurasi untuk bank dan tipe transfer
        $rule = $rules->where('bank_id', $bank->id)->where('type', $type)->first();

        // Hitung biaya berdasarkan aturan yang ada
        return $rule ? $rule->cost * $amount : 0; // Misalnya, aturan cost per unit amount
    }
}