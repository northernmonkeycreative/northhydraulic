<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name'); 
            $table->string('contact_name'); 
            $table->string('contact_number'); 
            $table->string('contact_email')->nullable(); 
            $table->string('site_name')->nullable(); 
            $table->longText('site_address')->nullable();
            $table->string('postcode')->nullable(); 
            $table->longText('company_notes')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
