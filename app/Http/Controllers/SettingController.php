<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Show Settings Screen
    public function index()
    {
        $settings = Setting::get()->first();
        return view('settings.index', compact('settings'));
    }

    // Update Settings
    public function update(Request $request, $setting)
    {
        // Find the user to update
        $thesettings = Setting::where('id', $setting)->firstOrFail();
        
        // Handle the data
        $thesettings->company_name = $request->company_name;
        $thesettings->company_email = $request->company_email;
        $thesettings->company_phone = $request->company_phone;
        $thesettings->company_address = $request->company_address;
        $thesettings->company_postcode = $request->company_postcode;

        // Update the settings
        $thesettings->update();

        return back()->withSuccess('System Settings have been updated successfully');
    }

}
