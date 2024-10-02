<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->char('type', 1); 
            $table->date('transaction_date'); 
            $table->decimal('amount', 10, 2);
            $table->string('cpf', 11);
            $table->string('card', 12);
            $table->time('transaction_time');
            $table->string('store_owner', 14);
            $table->string('store_name', 19);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
