<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
 public function up()
{
    Schema::create('stores', function (Blueprint $table) {
        $table->id();
        $table->string('owner', 14);  
        $table->string('name', 19);  
        $table->timestamps();
    });
}

   
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
