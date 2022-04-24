<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');//Company
            $table->char('First_name', 50);	
            $table->char('last_name', 50);	
            $table->char('email', 100)->nullable();	
            $table->char('phone', 14)->nullable();	
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
        Schema::dropIfExists('employees');
    }
};
