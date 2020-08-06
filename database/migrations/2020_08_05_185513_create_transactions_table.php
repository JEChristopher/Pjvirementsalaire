<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->integer('prefix');
            $table->integer('phone');
            $table->string('cp_code')->nullable();
            $table->string('client_transaction_id');
            $table->string('transaction_id')->nullable();
            $table->string('operator_transaction_id')->nullable();
            $table->string('lot')->nullable();
            $table->string('cp_treatement_status')->nullable();

            $table->string('cp_operator')->nullable();
            $table->string('cp_pay_id')->nullable();
            $table->string('cp_message')->nullable();
            $table->timestamp('cp_created_at')->nullable();
            $table->timestamp('cp_updated_at')->nullable();
            $table->timestamp('cp_processed')->nullable();
            $table->string('synchronisation')->nullable();
            $table->string('cp_description')->nullable();
            $table->string('cp_raw')->nullable();
            $table->string('cp_receiver')->nullable();
            $table->string('sending_statuts')->nullbable();
            $table->string('cp_transfert_valid')->nullable();
            $table->string('cp_comment')->nullable();
            $table->string('cp_sending_confirm')->nullable();
            $table->string('validated at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
