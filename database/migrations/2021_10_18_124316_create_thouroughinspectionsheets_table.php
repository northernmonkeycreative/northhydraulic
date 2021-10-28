<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThouroughinspectionsheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thouroughinspectionsheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('job_id')->unsigned()->index();
            $table->date('date_last_inspection')->nullable();
            $table->string('vehicle_type')->nullable();  
            $table->string('vehicle_reg')->nullable(); 
            $table->string('vehicle_mileage')->nullable(); 
            $table->date('date_of_man')->nullable(); 
            $table->string('platform_make')->nullable(); 
            $table->string('platform_model')->nullable(); 
            $table->string('platform_serial')->nullable(); 
            $table->date('date_inspection')->nullable();
            $table->string('swl')->nullable();
            $table->string('tested_at')->nullable();

            $table->string('work_platform_flooring')->nullable();
            $table->string('work_platform_toeboards')->nullable();
            $table->string('work_platform_topguard')->nullable();
            $table->string('work_platform_midguard')->nullable();
            $table->string('work_platform_gates')->nullable();
            $table->string('work_platform_cagemounts')->nullable();
            $table->string('work_platform_harnesspoints')->nullable();

            $table->string('structure_scissorbooms_arms')->nullable();
            $table->string('structure_scissorbooms_pins')->nullable();
            $table->string('structure_bushes')->nullable();
            $table->string('structure_zoom')->nullable();
            $table->string('structure_corrosion')->nullable();
            $table->string('structure_outriggers')->nullable();
            $table->string('structure_pothole')->nullable();
            $table->string('structure_slew_ring_serviceable')->nullable();
            $table->string('structure_slew_ring_bolts')->nullable();
            $table->string('structure_powertrack')->nullable();

            $table->string('os_fueltank')->nullable();
            $table->string('os_controlcables')->nullable();
            $table->string('os_battery')->nullable();
            $table->string('os_battery_charger')->nullable();
            $table->string('os_pump')->nullable();
            $table->string('os_slew_drive')->nullable();
            $table->string('os_gearbox')->nullable();
            $table->string('os_hydraulic_tank')->nullable();
            $table->string('os_hydraulic_filter')->nullable();
            $table->string('os_hydraulic_hoses')->nullable();
            $table->string('os_control_cables')->nullable();
            $table->string('os_hydraulic_cylinders_secure')->nullable();
            $table->string('os_hydraulic_cylinders_distorted')->nullable();
            $table->string('os_platforms_levelling')->nullable();
            $table->string('os_drive_travel')->nullable();
            $table->string('os_brakes')->nullable();
            $table->string('os_tie_rods')->nullable();
            $table->string('os_wheelnuts')->nullable();

            $table->string('control_hydraulic_valves_manual')->nullable();
            $table->string('control_hydraulic_valves_electric')->nullable();
            $table->string('control_hydraulic_check_valves')->nullable();
            $table->string('control_hydraulic_cylinder')->nullable();
            $table->string('control_hydraulic_emergency')->nullable();
            $table->string('control_hydraulic_system_pressures')->nullable();

            $table->string('control_electric_ground')->nullable();
            $table->string('control_electric_platform')->nullable();
            $table->string('control_electric_emergency')->nullable();
            $table->string('control_electric_indicator')->nullable();
            $table->string('control_electric_wiring')->nullable();
            $table->string('control_electric_speed')->nullable();

            $table->string('safety_level_sensor')->nullable();
            $table->string('safety_limit_switch')->nullable();
            $table->string('safety_warning_lights')->nullable();
            $table->string('safety_functional_test')->nullable();
            $table->string('safety_overload')->nullable();
            $table->string('safety_swl')->nullable();
            $table->string('safety_load_applied')->nullable();

            $table->string('additional_brakes')->nullable();
            $table->string('additional_emergency')->nullable();
            $table->string('additional_tow')->nullable();
            $table->string('additional_wheel')->nullable();
            $table->string('additional_lights')->nullable();

            $table->string('decals_manufacture')->nullable();
            $table->string('decals_safe_load')->nullable();
            $table->string('decals_platform_instructions')->nullable();
            $table->string('decals_emergency')->nullable();
            $table->string('decals_instruction')->nullable();
            $table->string('decals_safety')->nullable();

            $table->longText('additional_info')->nullable(); 


            $table->string('engineer_signature')->nullable(); 
            $table->string('customer_signature')->nullable(); 

            
            $table->timestamps();
        });

        Schema::table('thouroughinspectionsheets', function($table) {
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
        Schema::dropIfExists('thouroughinspectionsheets');
    }
}
