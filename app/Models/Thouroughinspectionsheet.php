<?php

namespace App\Models;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thouroughinspectionsheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'date_last_inspection',
        'vehicle_type',
        'vehicle_reg',
        'vehicle_mileage',
        'date_of_man',
        'platform_make',
        'platform_model',
        'platform_serial',
        'date_inspection',
        'swl',
        'tested_at',
        'work_platform_flooring',
        'work_platform_toeboards',
        'work_platform_topguard',
        'work_platform_midguard',
        'work_platform_gates',
        'work_platform_cagemounts',
        'work_platform_harnesspoints',
        'structure_scissorbooms_arms',
        'structure_scissorbooms_pins',
        'structure_bushes',
        'structure_zoom',
        'structure_corrosion',
        'structure_outriggers',
        'structure_pothole',
        'structure_slew_ring_serviceable',
        'structure_slew_ring_bolts',
        'structure_powertrack',
        'os_fueltank',
        'os_controlcables',
        'os_battery',
        'os_battery_charger',
        'os_pump',
        'os_slew_drive',
        'os_gearbox',
        'os_hydraulic_tank',
        'os_hydraulic_filter',
        'os_hydraulic_hoses',
        'os_control_cables',
        'os_hydraulic_cylinders_secure',
        'os_hydraulic_cylinders_distorted',
        'os_platforms_levelling',
        'os_drive_travel',
        'os_brakes',
        'os_tie_rods',
        'os_wheelnuts',
        'control_hydraulic_valves_manual',
        'control_hydraulic_valves_electric',
        'control_hydraulic_check_valves',
        'control_hydraulic_cylinder',
        'control_hydraulic_emergency',
        'control_hydraulic_system_pressures',
        'control_electric_ground',
        'control_electric_platform',
        'control_electric_emergency',
        'control_electric_indicator',
        'control_electric_wiring',
        'control_electric_speed',
        'safety_level_sensor',
        'safety_limit_switch',
        'safety_warning_lights',
        'safety_functional_test',
        'safety_overload',
        'safety_swl',
        'safety_load_applied',
        'additional_brakes',
        'additional_emergency',
        'additional_tow',
        'additional_wheel',
        'additional_lights',
        'decals_manufacture',
        'decals_safe_load',
        'decals_platform_instructions',
        'decals_emergency',
        'decals_instruction',
        'decals_safety',
        'additional_info',
        'engineer_signature',
        'customer_signature',
    ];

    /**
     * Get the Job that owns the engineer control sheet.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
