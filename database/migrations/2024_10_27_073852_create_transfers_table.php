<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bank_id'); // ID bank tujuan
            $table->string('account_number'); // Rekening tujuan
            $table->enum('type', ['inhouse', 'transfer-online']); // Jenis transfer
            $table->enum('currency', ['IDR', 'USD']); // Mata uang
            $table->float('amount', 15, 2); // Jumlah transfer
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending'); // Status transfer
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
}