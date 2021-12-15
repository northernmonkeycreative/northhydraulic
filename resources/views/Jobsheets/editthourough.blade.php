<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Job Sheet') }} {{$thejobsheet->id}}
            </h2>

            <div>
                <span class="sm:ml-3">
                    <a href="{{ route('thouroughinspectionsheet.show', $thejobsheet->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        Back To Jobsheet
                    </a>
                </span>  
            </div>
        </div>
        
    </x-slot>

    <!-- Alerts -->
    @include('layouts.partials.alerts.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">   
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Jobsheet Information</h3>
                            <p class="mt-1 text-sm text-gray-600">
                            Edit Jobsheet Information Here.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow-sm overflow-hidden sm:rounded-md">
                                <form action="{{ route('thourough.update', $thejobsheet->id) }}" class="form-horizontal" role="form" method="POST">
                                    @csrf
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">

                                            <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                            <label for="date_inspection" class="block text-sm font-medium text-gray-700">Start Date</label>
                                            @if ($errors->has('date_inspection'))<span class="text-red-700">{{ $errors->first('date_inspection') }}</span>@endif
                                            <input type="text" name="date_inspection" id="date_inspection" autocomplete="date_inspection" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('date_inspection', $thejobsheet->date_inspection) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                            <label for="date_last_inspection" class="block text-sm font-medium text-gray-700">Date Last Inspection</label>
                                            @if ($errors->has('date_last_inspection'))<span class="text-red-700">{{ $errors->first('date_last_inspection') }}</span>@endif
                                            <input type="text" name="date_last_inspection" id="date_last_inspection" autocomplete="date_last_inspection" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('date_last_inspection', $thejobsheet->date_last_inspection) }}">
                                            </div>


                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="vehicle_type" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
                                            @if ($errors->has('vehicle_type'))<span class="text-red-700">{{ $errors->first('vehicle_type') }}</span>@endif
                                            <input type="text" name="vehicle_type" id="vehicle_type" autocomplete="vehicle_type" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('vehicle_type', $thejobsheet->vehicle_type) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="vehicle_reg" class="block text-sm font-medium text-gray-700">Vehicle Reg</label>
                                            @if ($errors->has('vehicle_reg'))<span class="text-red-700">{{ $errors->first('vehicle_reg') }}</span>@endif
                                            <input type="text" name="vehicle_reg" id="vehicle_reg" autocomplete="vehicle_reg" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('vehicle_reg', $thejobsheet->vehicle_reg) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="vehicle_mileage" class="block text-sm font-medium text-gray-700">Vehicle Mileage</label>
                                            @if ($errors->has('vehicle_mileage'))<span class="text-red-700">{{ $errors->first('vehicle_mileage') }}</span>@endif
                                            <input type="text" name="vehicle_mileage" id="vehicle_mileage" autocomplete="vehicle_mileage" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('vehicle_mileage', $thejobsheet->vehicle_mileage) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                            <label for="date_of_man" class="block text-sm font-medium text-gray-700">Date Of Man</label>
                                            @if ($errors->has('date_of_man'))<span class="text-red-700">{{ $errors->first('date_of_man') }}</span>@endif
                                            <input type="text" name="date_of_man" id="date_of_man" autocomplete="date_of_man" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('date_of_man', $thejobsheet->date_of_man) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="platform_make" class="block text-sm font-medium text-gray-700">Platform Make</label>
                                            @if ($errors->has('platform_make'))<span class="text-red-700">{{ $errors->first('platform_make') }}</span>@endif
                                            <input type="text" name="platform_make" id="platform_make" autocomplete="platform_make" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('platform_make', $thejobsheet->platform_make) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="platform_model" class="block text-sm font-medium text-gray-700">Platform Model</label>
                                            @if ($errors->has('platform_model'))<span class="text-red-700">{{ $errors->first('platform_model') }}</span>@endif
                                            <input type="text" name="platform_model" id="platform_model" autocomplete="platform_model" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('platform_model', $thejobsheet->platform_model) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="platform_serial" class="block text-sm font-medium text-gray-700">Platform Serial</label>
                                            @if ($errors->has('platform_serial'))<span class="text-red-700">{{ $errors->first('platform_serial') }}</span>@endif
                                            <input type="text" name="platform_serial" id="platform_serial" autocomplete="platform_serial" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('platform_serial', $thejobsheet->platform_serial) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="swl" class="block text-sm font-medium text-gray-700">S.W.L</label>
                                            @if ($errors->has('swl'))<span class="text-red-700">{{ $errors->first('swl') }}</span>@endif
                                            <input type="text" name="swl" id="swl" autocomplete="swl" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('swl', $thejobsheet->swl) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="tested_at" class="block text-sm font-medium text-gray-700">Tested At 10% O/Load</label>
                                            @if ($errors->has('tested_at'))<span class="text-red-700">{{ $errors->first('tested_at') }}</span>@endif
                                            <input type="text" name="tested_at" id="tested_at" autocomplete="tested_at" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('tested_at', $thejobsheet->tested_at) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="work_platform_flooring" class="block text-sm font-medium text-gray-700">Flooring Intact & Self Draining</label>
                                                @if ($errors->has('work_platform_flooring'))<span class="text-red-700">{{ $errors->first('work_platform_flooring') }}</span>@endif
                                                <select name="work_platform_flooring" id="work_platform_flooring" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('work_platform_flooring', $thejobsheet->work_platform_flooring) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('work_platform_flooring', $thejobsheet->work_platform_flooring) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('work_platform_flooring', $thejobsheet->work_platform_flooring) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="work_platform_toeboards" class="block text-sm font-medium text-gray-700">Toe Boards Intact & 150mm high</label>
                                                @if ($errors->has('work_platform_toeboards'))<span class="text-red-700">{{ $errors->first('work_platform_flooring') }}</span>@endif
                                                <select name="work_platform_toeboards" id="work_platform_toeboards" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('work_platform_toeboards', $thejobsheet->work_platform_toeboards) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('work_platform_toeboards', $thejobsheet->work_platform_toeboards) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('work_platform_toeboards', $thejobsheet->work_platform_toeboards) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="work_platform_topguard" class="block text-sm font-medium text-gray-700">Top Guard Rail Intact pin/bolts 1100mm high</label>
                                                @if ($errors->has('work_platform_topguard'))<span class="text-red-700">{{ $errors->first('work_platform_topguard') }}</span>@endif
                                                <select name="work_platform_topguard" id="work_platform_topguard" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('work_platform_topguard', $thejobsheet->work_platform_topguard) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('work_platform_topguard', $thejobsheet->work_platform_topguard) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('work_platform_topguard', $thejobsheet->work_platform_topguard) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="work_platform_midguard" class="block text-sm font-medium text-gray-700">Mid Guard Rail Intact pin/bolts</label>
                                                @if ($errors->has('work_platform_midguard'))<span class="text-red-700">{{ $errors->first('work_platform_midguard') }}</span>@endif
                                                <select name="work_platform_midguard" id="work_platform_midguard" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('work_platform_midguard', $thejobsheet->work_platform_midguard) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('work_platform_midguard', $thejobsheet->work_platform_midguard) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('work_platform_midguard', $thejobsheet->work_platform_midguard) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="work_platform_gates" class="block text-sm font-medium text-gray-700">Gates In Good Order & Self Closing/Latching</label>
                                                @if ($errors->has('work_platform_gates'))<span class="text-red-700">{{ $errors->first('work_platform_gates') }}</span>@endif
                                                <select name="work_platform_gates" id="work_platform_gates" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('work_platform_gates', $thejobsheet->work_platform_gates) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('work_platform_gates', $thejobsheet->work_platform_gates) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('work_platform_gates', $thejobsheet->work_platform_gates) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="work_platform_cagemounts" class="block text-sm font-medium text-gray-700">Cage Mounts</label>
                                                @if ($errors->has('work_platform_cagemounts'))<span class="text-red-700">{{ $errors->first('work_platform_cagemounts') }}</span>@endif
                                                <select name="work_platform_cagemounts" id="work_platform_cagemounts" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('work_platform_cagemounts', $thejobsheet->work_platform_cagemounts) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('work_platform_cagemounts', $thejobsheet->work_platform_cagemounts) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('work_platform_cagemounts', $thejobsheet->work_platform_cagemounts) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="work_platform_harnesspoints" class="block text-sm font-medium text-gray-700">Harness Points Secure</label>
                                                @if ($errors->has('work_platform_harnesspoints'))<span class="text-red-700">{{ $errors->first('work_platform_harnesspoints') }}</span>@endif
                                                <select name="work_platform_harnesspoints" id="work_platform_harnesspoints" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('work_platform_harnesspoints', $thejobsheet->work_platform_harnesspoints) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('work_platform_harnesspoints', $thejobsheet->work_platform_harnesspoints) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('work_platform_harnesspoints', $thejobsheet->work_platform_harnesspoints) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="structure_scissorbooms_arms" class="block text-sm font-medium text-gray-700">Scissor/Booms Arms Intact</label>
                                                @if ($errors->has('structure_scissorbooms_arms'))<span class="text-red-700">{{ $errors->first('structure_scissorbooms_arms') }}</span>@endif
                                                <select name="structure_scissorbooms_arms" id="structure_scissorbooms_arms" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('structure_scissorbooms_arms', $thejobsheet->structure_scissorbooms_arms) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('structure_scissorbooms_arms', $thejobsheet->structure_scissorbooms_arms) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('structure_scissorbooms_arms', $thejobsheet->structure_scissorbooms_arms) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="structure_scissorbooms_pins" class="block text-sm font-medium text-gray-700">Scissor/Boom Pins & Retainer Secure</label>
                                                @if ($errors->has('structure_scissorbooms_pins'))<span class="text-red-700">{{ $errors->first('structure_scissorbooms_pins') }}</span>@endif
                                                <select name="structure_scissorbooms_pins" id="structure_scissorbooms_pins" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('structure_scissorbooms_pins', $thejobsheet->structure_scissorbooms_pins) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('structure_scissorbooms_pins', $thejobsheet->structure_scissorbooms_pins) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('structure_scissorbooms_pins', $thejobsheet->structure_scissorbooms_pins) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="structure_bushes" class="block text-sm font-medium text-gray-700">Bushes Bearings Serviceable</label>
                                                @if ($errors->has('structure_bushes'))<span class="text-red-700">{{ $errors->first('structure_bushes') }}</span>@endif
                                                <select name="structure_bushes" id="structure_bushes" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('structure_bushes', $thejobsheet->structure_bushes) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('structure_bushes', $thejobsheet->structure_bushes) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('structure_bushes', $thejobsheet->structure_bushes) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="structure_zoom" class="block text-sm font-medium text-gray-700">Zoom Wear Pads Serviceable</label>
                                                @if ($errors->has('structure_zoom'))<span class="text-red-700">{{ $errors->first('structure_zoom') }}</span>@endif
                                                <select name="structure_zoom" id="structure_zoom" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('structure_zoom', $thejobsheet->structure_zoom) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('structure_zoom', $thejobsheet->structure_zoom) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('structure_zoom', $thejobsheet->structure_zoom) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="structure_corrosion" class="block text-sm font-medium text-gray-700">External/Internal Structure Free From Corrosion</label>
                                                @if ($errors->has('structure_corrosion'))<span class="text-red-700">{{ $errors->first('structure_corrosion') }}</span>@endif
                                                <select name="structure_corrosion" id="structure_corrosion" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('structure_corrosion', $thejobsheet->structure_corrosion) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('structure_corrosion', $thejobsheet->structure_corrosion) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('structure_corrosion', $thejobsheet->structure_corrosion) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="structure_outriggers" class="block text-sm font-medium text-gray-700">Outriggers Operate & Free From Distortion</label>
                                                @if ($errors->has('structure_outriggers'))<span class="text-red-700">{{ $errors->first('structure_outriggers') }}</span>@endif
                                                <select name="structure_outriggers" id="structure_outriggers" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('structure_outriggers', $thejobsheet->structure_outriggers) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('structure_outriggers', $thejobsheet->structure_outriggers) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('structure_outriggers', $thejobsheet->structure_outriggers) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="structure_pothole" class="block text-sm font-medium text-gray-700">Pothole Protection Secure & Operational</label>
                                                @if ($errors->has('structure_pothole'))<span class="text-red-700">{{ $errors->first('structure_pothole') }}</span>@endif
                                                <select name="structure_pothole" id="structure_pothole" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('structure_pothole', $thejobsheet->structure_pothole) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('structure_pothole', $thejobsheet->structure_pothole) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('structure_pothole', $thejobsheet->structure_pothole) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="structure_slew_ring_serviceable" class="block text-sm font-medium text-gray-700">Slew Ring Bearing Serviceable</label>
                                                @if ($errors->has('structure_slew_ring_serviceable'))<span class="text-red-700">{{ $errors->first('structure_slew_ring_serviceable') }}</span>@endif
                                                <select name="structure_slew_ring_serviceable" id="structure_slew_ring_serviceable" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('structure_slew_ring_serviceable', $thejobsheet->structure_slew_ring_serviceable) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('structure_slew_ring_serviceable', $thejobsheet->structure_slew_ring_serviceable) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('structure_slew_ring_serviceable', $thejobsheet->structure_slew_ring_serviceable) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="structure_slew_ring_bolts" class="block text-sm font-medium text-gray-700">Slew Ring Bearing Bolts Secure</label>
                                                @if ($errors->has('structure_slew_ring_bolts'))<span class="text-red-700">{{ $errors->first('structure_slew_ring_bolts') }}</span>@endif
                                                <select name="structure_slew_ring_bolts" id="structure_slew_ring_bolts" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('structure_slew_ring_bolts', $thejobsheet->structure_slew_ring_bolts) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('structure_slew_ring_bolts', $thejobsheet->structure_slew_ring_bolts) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('structure_slew_ring_bolts', $thejobsheet->structure_slew_ring_bolts) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="structure_powertrack" class="block text-sm font-medium text-gray-700">Power Track Serviceable</label>
                                                @if ($errors->has('structure_powertrack'))<span class="text-red-700">{{ $errors->first('structure_powertrack') }}</span>@endif
                                                <select name="structure_powertrack" id="structure_powertrack" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('structure_powertrack', $thejobsheet->structure_powertrack) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('structure_powertrack', $thejobsheet->structure_powertrack) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('structure_powertrack', $thejobsheet->structure_powertrack) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_fueltank" class="block text-sm font-medium text-gray-700">Fuel Tank Free From Leaks</label>
                                                @if ($errors->has('os_fueltank'))<span class="text-red-700">{{ $errors->first('os_fueltank') }}</span>@endif
                                                <select name="os_fueltank" id="os_fueltank" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_fueltank', $thejobsheet->os_fueltank) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_fueltank', $thejobsheet->os_fueltank) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_fueltank', $thejobsheet->os_fueltank) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_controlcables" class="block text-sm font-medium text-gray-700">Control Cables</label>
                                                @if ($errors->has('os_controlcables'))<span class="text-red-700">{{ $errors->first('os_controlcables') }}</span>@endif
                                                <select name="os_controlcables" id="os_controlcables" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_controlcables', $thejobsheet->os_controlcables) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_controlcables', $thejobsheet->os_controlcables) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_controlcables', $thejobsheet->os_controlcables) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_battery" class="block text-sm font-medium text-gray-700">Battery Secure & Terminal/Levels Serviceable</label>
                                                @if ($errors->has('os_battery'))<span class="text-red-700">{{ $errors->first('os_battery') }}</span>@endif
                                                <select name="os_battery" id="os_battery" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_battery', $thejobsheet->os_battery) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_battery', $thejobsheet->os_battery) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_battery', $thejobsheet->os_battery) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_battery_charger" class="block text-sm font-medium text-gray-700">Battery Charger & Lead Secure/Operational</label>
                                                @if ($errors->has('os_battery_charger'))<span class="text-red-700">{{ $errors->first('os_battery_charger') }}</span>@endif
                                                <select name="os_battery_charger" id="os_battery_charger" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_battery_charger', $thejobsheet->os_battery_charger) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_battery_charger', $thejobsheet->os_battery_charger) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_battery_charger', $thejobsheet->os_battery_charger) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_pump" class="block text-sm font-medium text-gray-700">Pump Free from Leaks & Secure</label>
                                                @if ($errors->has('os_pump'))<span class="text-red-700">{{ $errors->first('os_pump') }}</span>@endif
                                                <select name="os_pump" id="os_pump" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_pump', $thejobsheet->os_pump) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_pump', $thejobsheet->os_pump) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_pump', $thejobsheet->os_pump) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_slew_drive" class="block text-sm font-medium text-gray-700">Slew Drive & Gears Correctly Adjusted</label>
                                                @if ($errors->has('os_slew_drive'))<span class="text-red-700">{{ $errors->first('os_slew_drive') }}</span>@endif
                                                <select name="os_slew_drive" id="os_slew_drive" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_slew_drive', $thejobsheet->os_slew_drive) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_slew_drive', $thejobsheet->os_slew_drive) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_slew_drive', $thejobsheet->os_slew_drive) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_gearbox" class="block text-sm font-medium text-gray-700">Gear Box Oil Level</label>
                                                @if ($errors->has('os_gearbox'))<span class="text-red-700">{{ $errors->first('os_gearbox') }}</span>@endif
                                                <select name="os_gearbox" id="os_gearbox" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_gearbox', $thejobsheet->os_gearbox) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_gearbox', $thejobsheet->os_gearbox) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_gearbox', $thejobsheet->os_gearbox) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_hydraulic_tank" class="block text-sm font-medium text-gray-700">Hydraulic Tank Free From Oil</label>
                                                @if ($errors->has('os_hydraulic_tank'))<span class="text-red-700">{{ $errors->first('os_hydraulic_tank') }}</span>@endif
                                                <select name="os_hydraulic_tank" id="os_hydraulic_tank" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_hydraulic_tank', $thejobsheet->os_hydraulic_tank) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_hydraulic_tank', $thejobsheet->os_hydraulic_tank) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_hydraulic_tank', $thejobsheet->os_hydraulic_tank) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_hydraulic_filter" class="block text-sm font-medium text-gray-700">Hydraulic Filter & Oil Serviceable</label>
                                                @if ($errors->has('os_hydraulic_filter'))<span class="text-red-700">{{ $errors->first('os_hydraulic_filter') }}</span>@endif
                                                <select name="os_hydraulic_filter" id="os_hydraulic_filter" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_hydraulic_filter', $thejobsheet->os_hydraulic_filter) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_hydraulic_filter', $thejobsheet->os_hydraulic_filter) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_hydraulic_filter', $thejobsheet->os_hydraulic_filter) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_hydraulic_hoses" class="block text-sm font-medium text-gray-700">Hydraulic Hoses & Pipes</label>
                                                @if ($errors->has('os_hydraulic_hoses'))<span class="text-red-700">{{ $errors->first('os_hydraulic_hoses') }}</span>@endif
                                                <select name="os_hydraulic_hoses" id="os_hydraulic_hoses" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_hydraulic_hoses', $thejobsheet->os_hydraulic_hoses) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_hydraulic_hoses', $thejobsheet->os_hydraulic_hoses) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_hydraulic_hoses', $thejobsheet->os_hydraulic_hoses) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_control_cables" class="block text-sm font-medium text-gray-700">Control Cables</label>
                                                @if ($errors->has('os_control_cables'))<span class="text-red-700">{{ $errors->first('os_control_cables') }}</span>@endif
                                                <select name="os_control_cables" id="os_control_cables" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_control_cables', $thejobsheet->os_control_cables) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_control_cables', $thejobsheet->os_control_cables) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_control_cables', $thejobsheet->os_control_cables) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_hydraulic_cylinders_secure" class="block text-sm font-medium text-gray-700">Hydraulic Cylinders Secure & Free From Leaks</label>
                                                @if ($errors->has('os_hydraulic_cylinders_secure'))<span class="text-red-700">{{ $errors->first('os_hydraulic_cylinders_secure') }}</span>@endif
                                                <select name="os_hydraulic_cylinders_secure" id="os_hydraulic_cylinders_secure" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_hydraulic_cylinders_secure', $thejobsheet->os_hydraulic_cylinders_secure) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_hydraulic_cylinders_secure', $thejobsheet->os_hydraulic_cylinders_secure) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_hydraulic_cylinders_secure', $thejobsheet->os_hydraulic_cylinders_secure) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_hydraulic_cylinders_distorted" class="block text-sm font-medium text-gray-700">Hydraulic Cylinders Not Distorted or Corroded</label>
                                                @if ($errors->has('os_hydraulic_cylinders_distorted'))<span class="text-red-700">{{ $errors->first('os_hydraulic_cylinders_distorted') }}</span>@endif
                                                <select name="os_hydraulic_cylinders_distorted" id="os_hydraulic_cylinders_distorted" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_hydraulic_cylinders_distorted', $thejobsheet->os_hydraulic_cylinders_distorted) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_hydraulic_cylinders_distorted', $thejobsheet->os_hydraulic_cylinders_distorted) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_hydraulic_cylinders_distorted', $thejobsheet->os_hydraulic_cylinders_distorted) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_platforms_levelling" class="block text-sm font-medium text-gray-700">Platforms Levelling/Rotation Serviceable</label>
                                                @if ($errors->has('os_platforms_levelling'))<span class="text-red-700">{{ $errors->first('os_platforms_levelling') }}</span>@endif
                                                <select name="os_platforms_levelling" id="os_platforms_levelling" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_platforms_levelling', $thejobsheet->os_platforms_levelling) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_platforms_levelling', $thejobsheet->os_platforms_levelling) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_platforms_levelling', $thejobsheet->os_platforms_levelling) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_drive_travel" class="block text-sm font-medium text-gray-700">Drive Travel Components Secure</label>
                                                @if ($errors->has('os_drive_travel'))<span class="text-red-700">{{ $errors->first('os_drive_travel') }}</span>@endif
                                                <select name="os_drive_travel" id="os_drive_travel" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_drive_travel', $thejobsheet->os_drive_travel) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_drive_travel', $thejobsheet->os_drive_travel) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_drive_travel', $thejobsheet->os_drive_travel) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_brakes" class="block text-sm font-medium text-gray-700">Brakes Operate To Manufacture Spec</label>
                                                @if ($errors->has('os_brakes'))<span class="text-red-700">{{ $errors->first('os_brakes') }}</span>@endif
                                                <select name="os_brakes" id="os_brakes" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_brakes', $thejobsheet->os_brakes) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_brakes', $thejobsheet->os_brakes) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_brakes', $thejobsheet->os_brakes) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_tie_rods" class="block text-sm font-medium text-gray-700">Tie Rods/Steering Linkage Secure</label>
                                                @if ($errors->has('os_tie_rods'))<span class="text-red-700">{{ $errors->first('os_tie_rods') }}</span>@endif
                                                <select name="os_tie_rods" id="os_tie_rods" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_tie_rods', $thejobsheet->os_tie_rods) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_tie_rods', $thejobsheet->os_tie_rods) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_tie_rods', $thejobsheet->os_tie_rods) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="os_wheelnuts" class="block text-sm font-medium text-gray-700">Wheel Nuts & Tyres Secure/Serviceable</label>
                                                @if ($errors->has('os_wheelnuts'))<span class="text-red-700">{{ $errors->first('os_wheelnuts') }}</span>@endif
                                                <select name="os_wheelnuts" id="os_wheelnuts" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('os_wheelnuts', $thejobsheet->os_wheelnuts) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('os_wheelnuts', $thejobsheet->os_wheelnuts) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('os_wheelnuts', $thejobsheet->os_wheelnuts) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_hydraulic_valves_manual" class="block text-sm font-medium text-gray-700">Control Valves Manual-Functional</label>
                                                @if ($errors->has('control_hydraulic_valves_manual'))<span class="text-red-700">{{ $errors->first('control_hydraulic_valves_manual') }}</span>@endif
                                                <select name="control_hydraulic_valves_manual" id="control_hydraulic_valves_manual" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_hydraulic_valves_manual', $thejobsheet->control_hydraulic_valves_manual) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_hydraulic_valves_manual', $thejobsheet->control_hydraulic_valves_manual) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_hydraulic_valves_manual', $thejobsheet->control_hydraulic_valves_manual) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_hydraulic_valves_electric" class="block text-sm font-medium text-gray-700">Control Valves Electric-Functional</label>
                                                @if ($errors->has('control_hydraulic_valves_electric'))<span class="text-red-700">{{ $errors->first('control_hydraulic_valves_electric') }}</span>@endif
                                                <select name="control_hydraulic_valves_electric" id="control_hydraulic_valves_electric" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_hydraulic_valves_electric', $thejobsheet->control_hydraulic_valves_electric) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_hydraulic_valves_electric', $thejobsheet->control_hydraulic_valves_electric) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_hydraulic_valves_electric', $thejobsheet->control_hydraulic_valves_electric) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_hydraulic_check_valves" class="block text-sm font-medium text-gray-700">Check Valves/Over Centre-Functional</label>
                                                @if ($errors->has('control_hydraulic_check_valves'))<span class="text-red-700">{{ $errors->first('control_hydraulic_check_valves') }}</span>@endif
                                                <select name="control_hydraulic_check_valves" id="control_hydraulic_check_valves" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_hydraulic_check_valves', $thejobsheet->control_hydraulic_check_valves) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_hydraulic_check_valves', $thejobsheet->control_hydraulic_check_valves) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_hydraulic_check_valves', $thejobsheet->control_hydraulic_check_valves) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_hydraulic_cylinder" class="block text-sm font-medium text-gray-700">Cylinder & Drive Speed Controls-Functional</label>
                                                @if ($errors->has('control_hydraulic_cylinder'))<span class="text-red-700">{{ $errors->first('control_hydraulic_cylinder') }}</span>@endif
                                                <select name="control_hydraulic_cylinder" id="control_hydraulic_cylinder" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_hydraulic_cylinder', $thejobsheet->control_hydraulic_cylinder) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_hydraulic_cylinder', $thejobsheet->control_hydraulic_cylinder) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_hydraulic_cylinder', $thejobsheet->control_hydraulic_cylinder) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_hydraulic_emergency" class="block text-sm font-medium text-gray-700">Emergency Lowering Controls-Functional</label>
                                                @if ($errors->has('control_hydraulic_emergency'))<span class="text-red-700">{{ $errors->first('control_hydraulic_emergency') }}</span>@endif
                                                <select name="control_hydraulic_emergency" id="control_hydraulic_emergency" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_hydraulic_emergency', $thejobsheet->control_hydraulic_emergency) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_hydraulic_emergency', $thejobsheet->control_hydraulic_emergency) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_hydraulic_emergency', $thejobsheet->control_hydraulic_emergency) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_hydraulic_system_pressures" class="block text-sm font-medium text-gray-700">System Pressures</label>
                                                @if ($errors->has('control_hydraulic_system_pressures'))<span class="text-red-700">{{ $errors->first('control_hydraulic_system_pressures') }}</span>@endif
                                                <select name="control_hydraulic_system_pressures" id="control_hydraulic_system_pressures" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_hydraulic_system_pressures', $thejobsheet->control_hydraulic_system_pressures) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_hydraulic_system_pressures', $thejobsheet->control_hydraulic_system_pressures) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_hydraulic_system_pressures', $thejobsheet->control_hydraulic_system_pressures) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_electric_ground" class="block text-sm font-medium text-gray-700">Ground Controls Functional</label>
                                                @if ($errors->has('control_electric_ground'))<span class="text-red-700">{{ $errors->first('control_electric_ground') }}</span>@endif
                                                <select name="control_electric_ground" id="control_electric_ground" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_electric_ground', $thejobsheet->control_electric_ground) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_electric_ground', $thejobsheet->control_electric_ground) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_electric_ground', $thejobsheet->control_electric_ground) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_electric_platform" class="block text-sm font-medium text-gray-700">Platform Controls Functional</label>
                                                @if ($errors->has('control_electric_platform'))<span class="text-red-700">{{ $errors->first('control_electric_platform') }}</span>@endif
                                                <select name="control_electric_platform" id="control_electric_platform" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_electric_platform', $thejobsheet->control_electric_platform) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_electric_platform', $thejobsheet->control_electric_platform) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_electric_platform', $thejobsheet->control_electric_platform) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_electric_emergency" class="block text-sm font-medium text-gray-700">Emergency Lower Controls (electrical/manual)</label>
                                                @if ($errors->has('control_electric_emergency'))<span class="text-red-700">{{ $errors->first('control_electric_emergency') }}</span>@endif
                                                <select name="control_electric_emergency" id="control_electric_emergency" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_electric_emergency', $thejobsheet->control_electric_emergency) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_electric_emergency', $thejobsheet->control_electric_emergency) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_electric_emergency', $thejobsheet->control_electric_emergency) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_electric_indicator" class="block text-sm font-medium text-gray-700">Indicator Lights/Aux Motor Function</label>
                                                @if ($errors->has('control_electric_indicator'))<span class="text-red-700">{{ $errors->first('control_electric_indicator') }}</span>@endif
                                                <select name="control_electric_indicator" id="control_electric_indicator" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_electric_indicator', $thejobsheet->control_electric_indicator) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_electric_indicator', $thejobsheet->control_electric_indicator) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_electric_indicator', $thejobsheet->control_electric_indicator) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_electric_wiring" class="block text-sm font-medium text-gray-700">Wiring/Harness Cable</label>
                                                @if ($errors->has('control_electric_wiring'))<span class="text-red-700">{{ $errors->first('control_electric_wiring') }}</span>@endif
                                                <select name="control_electric_wiring" id="control_electric_wiring" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_electric_wiring', $thejobsheet->control_electric_wiring) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_electric_wiring', $thejobsheet->control_electric_wiring) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_electric_wiring', $thejobsheet->control_electric_wiring) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="control_electric_speed" class="block text-sm font-medium text-gray-700">Speed Controls/Foot Pedal/Dead Man Switch</label>
                                                @if ($errors->has('control_electric_speed'))<span class="text-red-700">{{ $errors->first('control_electric_speed') }}</span>@endif
                                                <select name="control_electric_speed" id="control_electric_speed" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('control_electric_speed', $thejobsheet->control_electric_speed) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('control_electric_speed', $thejobsheet->control_electric_speed) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('control_electric_speed', $thejobsheet->control_electric_speed) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="safety_level_sensor" class="block text-sm font-medium text-gray-700">Level Sensors & Alarms Operational</label>
                                                @if ($errors->has('safety_level_sensor'))<span class="text-red-700">{{ $errors->first('safety_level_sensor') }}</span>@endif
                                                <select name="safety_level_sensor" id="safety_level_sensor" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('safety_level_sensor', $thejobsheet->safety_level_sensor) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('safety_level_sensor', $thejobsheet->safety_level_sensor) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('safety_level_sensor', $thejobsheet->safety_level_sensor) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="safety_limit_switch" class="block text-sm font-medium text-gray-700">Limit Switches, Interiors & Valves Operational</label>
                                                @if ($errors->has('safety_limit_switch'))<span class="text-red-700">{{ $errors->first('safety_limit_switch') }}</span>@endif
                                                <select name="safety_limit_switch" id="safety_limit_switch" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('safety_limit_switch', $thejobsheet->safety_limit_switch) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('safety_limit_switch', $thejobsheet->safety_limit_switch) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('safety_limit_switch', $thejobsheet->safety_limit_switch) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="safety_warning_lights" class="block text-sm font-medium text-gray-700">Warning Lights/Guages Functional</label>
                                                @if ($errors->has('safety_warning_lights'))<span class="text-red-700">{{ $errors->first('safety_warning_lights') }}</span>@endif
                                                <select name="safety_warning_lights" id="safety_warning_lights" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('safety_warning_lights', $thejobsheet->safety_warning_lights) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('safety_warning_lights', $thejobsheet->safety_warning_lights) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('safety_warning_lights', $thejobsheet->safety_warning_lights) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="safety_functional_test" class="block text-sm font-medium text-gray-700">Functional Test</label>
                                                @if ($errors->has('safety_functional_test'))<span class="text-red-700">{{ $errors->first('safety_functional_test') }}</span>@endif
                                                <select name="safety_functional_test" id="safety_functional_test" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('safety_functional_test', $thejobsheet->safety_functional_test) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('safety_functional_test', $thejobsheet->safety_functional_test) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('safety_functional_test', $thejobsheet->safety_functional_test) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="safety_overload" class="block text-sm font-medium text-gray-700">Overload Test Required</label>
                                                @if ($errors->has('safety_overload'))<span class="text-red-700">{{ $errors->first('safety_overload') }}</span>@endif
                                                <select name="safety_overload" id="safety_overload" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('safety_overload', $thejobsheet->safety_overload) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('safety_overload', $thejobsheet->safety_overload) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('safety_overload', $thejobsheet->safety_overload) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="safety_swl" class="block text-sm font-medium text-gray-700">S.W.L Test Required</label>
                                                @if ($errors->has('safety_swl'))<span class="text-red-700">{{ $errors->first('safety_swl') }}</span>@endif
                                                <select name="safety_swl" id="safety_swl" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('safety_swl', $thejobsheet->safety_swl) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('safety_swl', $thejobsheet->safety_swl) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('safety_swl', $thejobsheet->safety_swl) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                            <label for="safety_load_applied" class="block text-sm font-medium text-gray-700">Load Applied</label>
                                            @if ($errors->has('safety_load_applied'))<span class="text-red-700">{{ $errors->first('safety_load_applied') }}</span>@endif
                                            <input type="text" name="safety_load_applied" id="safety_load_applied" autocomplete="safety_load_applied" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('safety_load_applied', $thejobsheet->safety_load_applied) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="additional_brakes" class="block text-sm font-medium text-gray-700">Brakes/Handbrake</label>
                                                @if ($errors->has('additional_brakes'))<span class="text-red-700">{{ $errors->first('additional_brakes') }}</span>@endif
                                                <select name="additional_brakes" id="additional_brakes" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('additional_brakes', $thejobsheet->additional_brakes) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('additional_brakes', $thejobsheet->additional_brakes) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('additional_brakes', $thejobsheet->additional_brakes) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="additional_emergency" class="block text-sm font-medium text-gray-700">Emergency Brake Cable Fitted</label>
                                                @if ($errors->has('additional_emergency'))<span class="text-red-700">{{ $errors->first('additional_emergency') }}</span>@endif
                                                <select name="additional_emergency" id="additional_emergency" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('additional_emergency', $thejobsheet->additional_emergency) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('additional_emergency', $thejobsheet->additional_emergency) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('additional_emergency', $thejobsheet->additional_emergency) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="additional_tow" class="block text-sm font-medium text-gray-700">Tow Hitch</label>
                                                @if ($errors->has('additional_tow'))<span class="text-red-700">{{ $errors->first('additional_tow') }}</span>@endif
                                                <select name="additional_tow" id="additional_tow" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('additional_tow', $thejobsheet->additional_tow) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('additional_tow', $thejobsheet->additional_tow) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('additional_tow', $thejobsheet->additional_tow) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="additional_wheel" class="block text-sm font-medium text-gray-700">Wheel Bearings</label>
                                                @if ($errors->has('additional_wheel'))<span class="text-red-700">{{ $errors->first('additional_wheel') }}</span>@endif
                                                <select name="additional_wheel" id="additional_wheel" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('additional_wheel', $thejobsheet->additional_wheel) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('additional_wheel', $thejobsheet->additional_wheel) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('additional_wheel', $thejobsheet->additional_wheel) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="additional_lights" class="block text-sm font-medium text-gray-700">Lights & Light Board</label>
                                                @if ($errors->has('additional_lights'))<span class="text-red-700">{{ $errors->first('additional_lights') }}</span>@endif
                                                <select name="additional_lights" id="additional_lights" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('additional_lights', $thejobsheet->additional_lights) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('additional_lights', $thejobsheet->additional_lights) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('additional_lights', $thejobsheet->additional_lights) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="decals_manufacture" class="block text-sm font-medium text-gray-700">Manufacture Plate</label>
                                                @if ($errors->has('decals_manufacture'))<span class="text-red-700">{{ $errors->first('decals_manufacture') }}</span>@endif
                                                <select name="decals_manufacture" id="decals_manufacture" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('decals_manufacture', $thejobsheet->decals_manufacture) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('decals_manufacture', $thejobsheet->decals_manufacture) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('decals_manufacture', $thejobsheet->decals_manufacture) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="decals_manufacture" class="block text-sm font-medium text-gray-700">Safe Working Load</label>
                                                @if ($errors->has('decals_safe_load'))<span class="text-red-700">{{ $errors->first('decals_safe_load') }}</span>@endif
                                                <select name="decals_safe_load" id="decals_safe_load" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('decals_safe_load', $thejobsheet->decals_safe_load) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('decals_safe_load', $thejobsheet->decals_safe_load) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('decals_safe_load', $thejobsheet->decals_safe_load) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="decals_platform_instructions" class="block text-sm font-medium text-gray-700">Ground Controls & Platform Instructions</label>
                                                @if ($errors->has('decals_platform_instructions'))<span class="text-red-700">{{ $errors->first('decals_platform_instructions') }}</span>@endif
                                                <select name="decals_platform_instructions" id="decals_platform_instructions" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('decals_platform_instructions', $thejobsheet->decals_platform_instructions) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('decals_platform_instructions', $thejobsheet->decals_platform_instructions) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('decals_platform_instructions', $thejobsheet->decals_platform_instructions) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="decals_emergency" class="block text-sm font-medium text-gray-700">Emergency Lowering</label>
                                                @if ($errors->has('decals_emergency'))<span class="text-red-700">{{ $errors->first('decals_emergency') }}</span>@endif
                                                <select name="decals_emergency" id="decals_emergency" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('decals_emergency', $thejobsheet->decals_emergency) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('decals_emergency', $thejobsheet->decals_emergency) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('decals_emergency', $thejobsheet->decals_emergency) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="decals_instruction" class="block text-sm font-medium text-gray-700">Instruction Manual</label>
                                                @if ($errors->has('decals_instruction'))<span class="text-red-700">{{ $errors->first('decals_instruction') }}</span>@endif
                                                <select name="decals_instruction" id="decals_instruction" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('decals_instruction', $thejobsheet->decals_instruction) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('decals_instruction', $thejobsheet->decals_instruction) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('decals_instruction', $thejobsheet->decals_instruction) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="decals_safety" class="block text-sm font-medium text-gray-700">Safety/Instruction Decals</label>
                                                @if ($errors->has('decals_safety'))<span class="text-red-700">{{ $errors->first('decals_safety') }}</span>@endif
                                                <select name="decals_safety" id="decals_safety" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="" @if (old('decals_safety', $thejobsheet->decals_safety) == null) {{ 'selected' }} @endif>N/A</option>
                                                        <option value="y" @if (old('decals_safety', $thejobsheet->decals_safety) == 'y') {{ 'selected' }} @endif>Yes</option>
                                                        <option value="n" @if (old('decals_safety', $thejobsheet->decals_safety) == 'n') {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="additional_info" class="block text-sm font-medium text-gray-700">Additional Comments Advisory</label>
                                            @if ($errors->has('additional_info'))<span class="text-red-700">{{ $errors->first('additional_info') }}</span>@endif
                                            <input type="text" name="additional_info" id="additional_info" autocomplete="additional_info" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('additional_info', $thejobsheet->additional_info) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="engineer_signature" class="block text-sm font-medium text-gray-700">Engineer Signature</label>
                                            @if ($errors->has('engineer_signature'))<span class="text-red-700">{{ $errors->first('engineer_signature') }}</span>@endif
                                            <input type="text" name="engineer_signature" id="engineer_signature" autocomplete="engineer_signature" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('engineer_signature', $thejobsheet->engineer_signature) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="customer_signature" class="block text-sm font-medium text-gray-700">Customer Signature</label>
                                            @if ($errors->has('customer_signature'))<span class="text-red-700">{{ $errors->first('customer_signature') }}</span>@endif
                                            <input type="text" name="customer_signature" id="customer_signature" autocomplete="customer_signature" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('customer_signature', $thejobsheet->customer_signature) }}">
                                            </div>



                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                       
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                      
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>       
        </div>
    </div>
    <script type="text/javascript">
        // $(function () {
        //     $('#datepicker').datepicker();
        // });
        
        $(document).ready(function(){
        var customer_signature_date=$('input[name="customer_signature_date"]'); 

        var options={
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true,
        };
        customer_signature_date.datepicker(options);

        })

     </script>
</x-app-layout>
