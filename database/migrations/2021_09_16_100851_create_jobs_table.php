<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id')->startingValue(18300);
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->string('customer_name')->nullable(); 
            $table->string('department')->nullable(); 
            $table->dateTime('start')->nullable();
            $table->string('start_time')->nullable();
            $table->date('start_date')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_contact')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('reg')->nullable();
            $table->string('mileage')->nullable();
            $table->longText('details')->nullable();
            $table->longText('internal_notes')->nullable();
            $table->bigInteger('engineer_id')->unsigned()->nullable();
            $table->string('engineer_name')->nullable();
            $table->string('title')->nullable(); 
            $table->string('status')->nullable();  
            $table->string('invoice_number')->nullable();  
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
        Schema::dropIfExists('jobs');
    }
}
