<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngineercontrolsheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engineercontrolsheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('job_id')->unsigned()->index();
            $table->longText('action_taken')->nullable();
            $table->longText('parts_used')->nullable();
            $table->longText('further_action')->nullable();
            $table->string('customer_signature')->nullable(); 
            $table->date('customer_signature_date')->nullable();
            $table->timestamps();
        });

        Schema::table('engineercontrolsheets', function($table) {
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
        Schema::dropIfExists('engineercontrolsheets');
    }
}
