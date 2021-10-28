<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCranetestcertificatesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cranetestcertificatesheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('job_id')->unsigned()->index();
            $table->string('vehicle_make')->nullable();
            $table->date('date_last_tested')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_reg')->nullable();
            $table->string('vehicle_chass_no')->nullable();
            $table->string('vehicle_mileage')->nullable();
            $table->string('crane_position')->nullable();
            $table->string('crane_make')->nullable();
            $table->string('crane_model')->nullable();
            $table->string('crane_serial')->nullable();
            $table->string('crane_manufacture_year')->nullable();
            $table->string('crane_lifting_duties')->nullable();
            $table->string('rotator_make')->nullable();
            $table->string('rotator_model')->nullable();
            $table->string('rotator_serial')->nullable();
            $table->string('grab_make')->nullable();
            $table->string('grab_model')->nullable();
            $table->string('grab_serial')->nullable();
            $table->string('bucket_make')->nullable();
            $table->string('bucket_model')->nullable();
            $table->string('bucket_serial')->nullable();
            $table->longText('load_radius')->nullable();
            $table->longText('safe_working_load')->nullable();
            $table->longText('test_load')->nullable();
            $table->longText('overload')->nullable();
            $table->string('test1')->nullable();
            $table->string('test1_workdone')->nullable();
            $table->string('test2')->nullable();
            $table->string('test2_workdone')->nullable();
            $table->string('test3')->nullable();
            $table->string('test3_workdone')->nullable();
            $table->string('test4')->nullable();
            $table->string('test4_workdone')->nullable();
            $table->string('test5')->nullable();
            $table->string('test5_workdone')->nullable();
            $table->string('test6')->nullable();
            $table->string('test6_workdone')->nullable();
            $table->string('test7')->nullable();
            $table->string('test7_workdone')->nullable();
            $table->string('test8')->nullable();
            $table->string('test8_workdone')->nullable();
            $table->string('test9')->nullable();
            $table->string('test9_workdone')->nullable();
            $table->string('test10')->nullable();
            $table->string('test10_workdone')->nullable();
            $table->string('test11')->nullable();
            $table->string('test11_workdone')->nullable();
            $table->string('test12')->nullable();
            $table->string('test12_workdone')->nullable();
            $table->string('test13')->nullable();
            $table->string('test13_workdone')->nullable();
            $table->string('test14')->nullable();
            $table->string('test14_workdone')->nullable();
            $table->string('test15')->nullable();
            $table->string('test15_workdone')->nullable();
            $table->longText('advisory')->nullable();
            $table->date('date_tested')->nullable();
            $table->string('engineer_signature')->nullable(); 
            $table->timestamps();
        });

        Schema::table('cranetestcertificatesheets', function($table) {
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
        Schema::dropIfExists('cranetestcertificatesheets');
    }
}
