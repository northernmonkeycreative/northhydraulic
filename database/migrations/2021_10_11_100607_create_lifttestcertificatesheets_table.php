<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLifttestcertificatesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lifttestcertificatesheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('job_id')->unsigned()->index();
            $table->string('cert_no')->nullable(); 
            $table->string('make')->nullable(); 
            $table->string('model')->nullable(); 
            $table->string('serial')->nullable(); 
            $table->string('reg')->nullable(); 
            $table->string('safe_working_load')->nullable(); 
            $table->integer('overload_test_applied')->unsigned()->default(0);
            $table->integer('reset_relief_valves')->unsigned()->default(0);
            $table->string('safe_working_load_test')->nullable();
            $table->string('downward_creep')->nullable(); 
            $table->integer('check_lift_mountings')->unsigned()->default(0);
            $table->integer('operation_swl_floorheight')->unsigned()->default(0);
            $table->string('lift_raises_in')->nullable(); 
            $table->string('lift_lowers_in')->nullable(); 
            $table->string('signature')->nullable(); 
            $table->date('date_tested')->nullable();
            $table->date('date_next_due')->nullable();
            $table->longText('advisory_notes')->nullable();
            $table->timestamps();
        });

        Schema::table('lifttestcertificatesheets', function($table) {
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
        Schema::dropIfExists('lifttestcertificatesheets');
    }
}
