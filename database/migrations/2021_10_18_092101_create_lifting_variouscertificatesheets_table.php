<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiftingVariouscertificatesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lifting_variouscertificatesheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('job_id')->unsigned()->index();
            $table->longText('exam_location')->nullable();
            $table->date('date_last_exam')->nullable();
            $table->longText('cert_no')->nullable(); 
            $table->string('vehicle_make')->nullable(); 
            $table->string('vehicle_model')->nullable(); 
            $table->string('vehicle_reg')->nullable(); 
            $table->string('vehicle_vin')->nullable(); 
            $table->string('lifting_description')->nullable(); 
            $table->string('lifting_model')->nullable(); 
            $table->string('lifting_serial')->nullable(); 
            $table->string('lifting_year')->nullable(); 
            $table->string('lifting_safe_working_load')->nullable(); 
            $table->longText('details')->nullable(); 
            $table->string('engineer_signature')->nullable(); 
            $table->string('engineer_name')->nullable(); 
            $table->date('date_of_exam')->nullable();
            $table->date('date_next_exam')->nullable();
            
            $table->timestamps();
        });

        Schema::table('lifting_variouscertificatesheets', function($table) {
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lifting_variouscertificatesheets');
    }
}
