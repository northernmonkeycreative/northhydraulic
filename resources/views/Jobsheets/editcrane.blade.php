<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Job Sheet') }} {{$thejobsheet->id}}
            </h2>

            <div>
                <span class="sm:ml-3">
                    <a href="{{ route('cranetestcertificatesheet.show', $thejobsheet->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                <form action="{{ route('crane.update', $thejobsheet->id) }}" class="form-horizontal" role="form" method="POST">
                                    @csrf
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">


                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="vehicle" class="block text-sm font-medium text-gray-700">Vehicle Make</label>
                                            @if ($errors->has('vehicle_make'))<span class="text-red-700">{{ $errors->first('vehicle_make') }}</span>@endif
                                            <input type="text" name="vehicle_make" id="vehicle_make" autocomplete="vehicle_make" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('vehicle_make', $thejobsheet->vehicle_make) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="vehicle" class="block text-sm font-medium text-gray-700">Vehicle Model</label>
                                            @if ($errors->has('vehicle_model'))<span class="text-red-700">{{ $errors->first('vehicle_model') }}</span>@endif
                                            <input type="text" name="vehicle_model" id="vehicle_model" autocomplete="vehicle_model" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('vehicle_model', $thejobsheet->vehicle_model) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="vehicle_reg" class="block text-sm font-medium text-gray-700">Vehicle Registration</label>
                                            @if ($errors->has('vehicle_reg'))<span class="text-red-700">{{ $errors->first('vehicle_reg') }}</span>@endif
                                            <input type="text" name="vehicle_reg" id="vehicle_reg" autocomplete="vehicle_reg" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('vehicle_reg', $thejobsheet->vehicle_reg) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="vehicle_chass_no" class="block text-sm font-medium text-gray-700">Vehicle Chassis Number</label>
                                            @if ($errors->has('vehicle_chass_no'))<span class="text-red-700">{{ $errors->first('vehicle_chass_no') }}</span>@endif
                                            <input type="text" name="vehicle_chass_no" id="vehicle_chass_no" autocomplete="vehicle_chass_no" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('vehicle_chass_no', $thejobsheet->vehicle_chass_no) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="vehicle_mileage" class="block text-sm font-medium text-gray-700">Mileage</label>
                                            @if ($errors->has('vehicle_mileage'))<span class="text-red-700">{{ $errors->first('vehicle_mileage') }}</span>@endif
                                            <input type="text" name="vehicle_mileage" id="vehicle_mileage" autocomplete="vehicle_mileage" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('vehicle_mileage', $thejobsheet->vehicle_mileage) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="crane_position" class="block text-sm font-medium text-gray-700">Crane Position</label>
                                            @if ($errors->has('crane_position'))<span class="text-red-700">{{ $errors->first('crane_position') }}</span>@endif
                                            <input type="text" name="crane_position" id="crane_position" autocomplete="crane_position" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('crane_position', $thejobsheet->crane_position) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="crane_make" class="block text-sm font-medium text-gray-700">Crane Make</label>
                                            @if ($errors->has('crane_make'))<span class="text-red-700">{{ $errors->first('crane_make') }}</span>@endif
                                            <input type="text" name="crane_make" id="crane_make" autocomplete="crane_make" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('crane_make', $thejobsheet->crane_make) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="crane_serial" class="block text-sm font-medium text-gray-700">Crane Serial</label>
                                            @if ($errors->has('crane_serial'))<span class="text-red-700">{{ $errors->first('crane_serial') }}</span>@endif
                                            <input type="text" name="crane_serial" id="crane_serial" autocomplete="crane_serial" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('crane_serial', $thejobsheet->crane_serial) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="crane_manufacture_year" class="block text-sm font-medium text-gray-700">Crane Year Of Manufacture</label>
                                            @if ($errors->has('crane_manufacture_year'))<span class="text-red-700">{{ $errors->first('crane_manufacture_year') }}</span>@endif
                                            <input type="text" name="crane_manufacture_year" id="crane_manufacture_year" autocomplete="crane_manufacture_year" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('crane_manufacture_year', $thejobsheet->crane_manufacture_year) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="crane_lifting_duties" class="block text-sm font-medium text-gray-700">Crane Lifting Duties</label>
                                            @if ($errors->has('crane_lifting_duties'))<span class="text-red-700">{{ $errors->first('crane_lifting_duties') }}</span>@endif
                                            <input type="text" name="crane_lifting_duties" id="crane_lifting_duties" autocomplete="crane_lifting_duties" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('crane_lifting_duties', $thejobsheet->crane_lifting_duties) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="rotator_make" class="block text-sm font-medium text-gray-700">Rotator Make</label>
                                            @if ($errors->has('rotator_make'))<span class="text-red-700">{{ $errors->first('rotator_make') }}</span>@endif
                                            <input type="text" name="rotator_make" id="rotator_make" autocomplete="rotator_make" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('rotator_make', $thejobsheet->rotator_make) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="rotator_model" class="block text-sm font-medium text-gray-700">Rotator Model</label>
                                            @if ($errors->has('rotator_model'))<span class="text-red-700">{{ $errors->first('rotator_model') }}</span>@endif
                                            <input type="text" name="rotator_model" id="rotator_model" autocomplete="rotator_model" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('rotator_model', $thejobsheet->rotator_model) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="rotator_serial" class="block text-sm font-medium text-gray-700">Rotator Serial</label>
                                            @if ($errors->has('rotator_serial'))<span class="text-red-700">{{ $errors->first('rotator_serial') }}</span>@endif
                                            <input type="text" name="rotator_serial" id="rotator_serial" autocomplete="rotator_serial" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('rotator_serial', $thejobsheet->rotator_serial) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="grab_make" class="block text-sm font-medium text-gray-700">Grab Make</label>
                                            @if ($errors->has('grab_make'))<span class="text-red-700">{{ $errors->first('grab_make') }}</span>@endif
                                            <input type="text" name="grab_make" id="grab_make" autocomplete="grab_make" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('grab_make', $thejobsheet->grab_make) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="grab_model" class="block text-sm font-medium text-gray-700">Grab Model</label>
                                            @if ($errors->has('grab_model'))<span class="text-red-700">{{ $errors->first('grab_model') }}</span>@endif
                                            <input type="text" name="grab_model" id="grab_model" autocomplete="grab_model" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('grab_model', $thejobsheet->grab_model) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="grab_serial" class="block text-sm font-medium text-gray-700">Grab Serial</label>
                                            @if ($errors->has('grab_serial'))<span class="text-red-700">{{ $errors->first('grab_serial') }}</span>@endif
                                            <input type="text" name="grab_serial" id="grab_serial" autocomplete="grab_serial" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('grab_serial', $thejobsheet->grab_serial) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="bucket_make" class="block text-sm font-medium text-gray-700">Bucket Make</label>
                                            @if ($errors->has('bucket_make'))<span class="text-red-700">{{ $errors->first('bucket_make') }}</span>@endif
                                            <input type="text" name="bucket_make" id="bucket_make" autocomplete="bucket_make" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('bucket_make', $thejobsheet->bucket_make) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="bucket_model" class="block text-sm font-medium text-gray-700">Bucket Model</label>
                                            @if ($errors->has('bucket_model'))<span class="text-red-700">{{ $errors->first('bucket_model') }}</span>@endif
                                            <input type="text" name="bucket_model" id="bucket_model" autocomplete="bucket_model" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('bucket_model', $thejobsheet->bucket_model) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="bucket_serial" class="block text-sm font-medium text-gray-700">Bucket Serial</label>
                                            @if ($errors->has('bucket_serial'))<span class="text-red-700">{{ $errors->first('bucket_serial') }}</span>@endif
                                            <input type="text" name="bucket_serial" id="bucket_serial" autocomplete="bucket_serial" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('bucket_serial', $thejobsheet->bucket_serial) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="load_radius" class="block text-sm font-medium text-gray-700">Load Radius</label>
                                            @if ($errors->has('load_radius'))<span class="text-red-700">{{ $errors->first('load_radius') }}</span>@endif
                                            <input type="text" name="load_radius" id="load_radius" autocomplete="load_radius" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('load_radius', $thejobsheet->load_radius) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="safe_working_load" class="block text-sm font-medium text-gray-700">Safe Working Load</label>
                                            @if ($errors->has('safe_working_load'))<span class="text-red-700">{{ $errors->first('safe_working_load') }}</span>@endif
                                            <input type="text" name="safe_working_load" id="safe_working_load" autocomplete="safe_working_load" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('safe_working_load', $thejobsheet->safe_working_load) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test_load" class="block text-sm font-medium text-gray-700">Test Load</label>
                                            @if ($errors->has('test_load'))<span class="text-red-700">{{ $errors->first('test_load') }}</span>@endif
                                            <input type="text" name="test_load" id="test_load" autocomplete="test_load" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test_load', $thejobsheet->test_load) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="overload" class="block text-sm font-medium text-gray-700">Overload</label>
                                            @if ($errors->has('overload'))<span class="text-red-700">{{ $errors->first('overload') }}</span>@endif
                                            <input type="text" name="overload" id="overload" autocomplete="overload" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('overload', $thejobsheet->overload) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test1" class="block text-sm font-medium text-gray-700">Locking Pins On Legs & Leg Operation</label>
                                                @if ($errors->has('test1'))<span class="text-red-700">{{ $errors->first('test1') }}</span>@endif
                                                <select name="test1" id="test1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test1', $thejobsheet->test1) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test1', $thejobsheet->test1) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test1_workdone" class="block text-sm font-medium text-gray-700">Locking Pins On Legs & Leg Operation - Work Done</label>
                                            @if ($errors->has('test1_workdone'))<span class="text-red-700">{{ $errors->first('test1_workdone') }}</span>@endif
                                            <input type="text" name="test1_workdone" id="test1_workdone" autocomplete="test1_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test1_workdone', $thejobsheet->test1_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test2" class="block text-sm font-medium text-gray-700">Flitch Plates Movement Under Crane</label>
                                                @if ($errors->has('test2'))<span class="text-red-700">{{ $errors->first('test2') }}</span>@endif
                                                <select name="test2" id="test2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test2', $thejobsheet->test2) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test2', $thejobsheet->test2) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test2_workdone" class="block text-sm font-medium text-gray-700">Flitch Plates Movement Under Crane - Work Done</label>
                                            @if ($errors->has('test2_workdone'))<span class="text-red-700">{{ $errors->first('test2_workdone') }}</span>@endif
                                            <input type="text" name="test2_workdone" id="test2_workdone" autocomplete="test2_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test2_workdone', $thejobsheet->test2_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test3" class="block text-sm font-medium text-gray-700">Movement To Crane Bolts</label>
                                                @if ($errors->has('test3'))<span class="text-red-700">{{ $errors->first('test3') }}</span>@endif
                                                <select name="test3" id="test3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test3', $thejobsheet->test3) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test3', $thejobsheet->test3) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test3_workdone" class="block text-sm font-medium text-gray-700">Movement To Crane Bolts - Work Done</label>
                                            @if ($errors->has('test3_workdone'))<span class="text-red-700">{{ $errors->first('test3_workdone') }}</span>@endif
                                            <input type="text" name="test3_workdone" id="test3_workdone" autocomplete="test3_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test3_workdone', $thejobsheet->test3_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test4" class="block text-sm font-medium text-gray-700">Height Warning & Overhead</label>
                                                @if ($errors->has('test4'))<span class="text-red-700">{{ $errors->first('test4') }}</span>@endif
                                                <select name="test4" id="test4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test4', $thejobsheet->test4) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test4', $thejobsheet->test4) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test4_workdone" class="block text-sm font-medium text-gray-700">Height Warning & Overhead - Work Done</label>
                                            @if ($errors->has('test4_workdone'))<span class="text-red-700">{{ $errors->first('test4_workdone') }}</span>@endif
                                            <input type="text" name="test4_workdone" id="test4_workdone" autocomplete="test4_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test4_workdone', $thejobsheet->test4_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test5" class="block text-sm font-medium text-gray-700">All Moving Points. i.e Pins</label>
                                                @if ($errors->has('test5'))<span class="text-red-700">{{ $errors->first('test5') }}</span>@endif
                                                <select name="test5" id="test5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test5', $thejobsheet->test5) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test5', $thejobsheet->test5) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test5_workdone" class="block text-sm font-medium text-gray-700">All Moving Points. i.e Pins - Work Done</label>
                                            @if ($errors->has('test5_workdone'))<span class="text-red-700">{{ $errors->first('test5_workdone') }}</span>@endif
                                            <input type="text" name="test5_workdone" id="test5_workdone" autocomplete="test5_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test5_workdone', $thejobsheet->test5_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test6" class="block text-sm font-medium text-gray-700">Movement To Column</label>
                                                @if ($errors->has('test6'))<span class="text-red-700">{{ $errors->first('test6') }}</span>@endif
                                                <select name="test6" id="test6" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test6', $thejobsheet->test6) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test6', $thejobsheet->test6) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test6_workdone" class="block text-sm font-medium text-gray-700">Movement To Column - Work Done</label>
                                            @if ($errors->has('test6_workdone'))<span class="text-red-700">{{ $errors->first('test6_workdone') }}</span>@endif
                                            <input type="text" name="test6_workdone" id="test6_workdone" autocomplete="test6_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test6_workdone', $thejobsheet->test6_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test7" class="block text-sm font-medium text-gray-700">Nylon Slides On Tele Ext</label>
                                                @if ($errors->has('test7'))<span class="text-red-700">{{ $errors->first('test7') }}</span>@endif
                                                <select name="test7" id="test7" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test7', $thejobsheet->test7) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test7', $thejobsheet->test7) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test7_workdone" class="block text-sm font-medium text-gray-700">Nylon Slides On Tele Ext - Work Done</label>
                                            @if ($errors->has('test7_workdone'))<span class="text-red-700">{{ $errors->first('test7_workdone') }}</span>@endif
                                            <input type="text" name="test7_workdone" id="test7_workdone" autocomplete="test7_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test7_workdone', $thejobsheet->test7_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test8" class="block text-sm font-medium text-gray-700">Any Cracks Or Defects On Crane</label>
                                                @if ($errors->has('test8'))<span class="text-red-700">{{ $errors->first('test8') }}</span>@endif
                                                <select name="test8" id="test8" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test8', $thejobsheet->test8) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test8', $thejobsheet->test8) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test8_workdone" class="block text-sm font-medium text-gray-700">Any Cracks Or Defects On Crane - Work Done</label>
                                            @if ($errors->has('test8_workdone'))<span class="text-red-700">{{ $errors->first('test8_workdone') }}</span>@endif
                                            <input type="text" name="test8_workdone" id="test8_workdone" autocomplete="test8_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test8_workdone', $thejobsheet->test8_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test9" class="block text-sm font-medium text-gray-700">Movement To Valve Block Levers & Teleflex</label>
                                                @if ($errors->has('test9'))<span class="text-red-700">{{ $errors->first('test9') }}</span>@endif
                                                <select name="test9" id="test9" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test9', $thejobsheet->test9) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test9', $thejobsheet->test9) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test9_workdone" class="block text-sm font-medium text-gray-700">Movement To Valve Block Levers & Teleflex - Work Done</label>
                                            @if ($errors->has('test9_workdone'))<span class="text-red-700">{{ $errors->first('test9_workdone') }}</span>@endif
                                            <input type="text" name="test9_workdone" id="test9_workdone" autocomplete="test9_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test9_workdone', $thejobsheet->test9_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test10" class="block text-sm font-medium text-gray-700">Control Box Operation & Illumination</label>
                                                @if ($errors->has('test10'))<span class="text-red-700">{{ $errors->first('test10') }}</span>@endif
                                                <select name="test10" id="test10" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test10', $thejobsheet->test10) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test10', $thejobsheet->test10) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test10_workdone" class="block text-sm font-medium text-gray-700">Control Box Operation & Illumination - Work Done</label>
                                            @if ($errors->has('test10_workdone'))<span class="text-red-700">{{ $errors->first('test10_workdone') }}</span>@endif
                                            <input type="text" name="test10_workdone" id="test10_workdone" autocomplete="test10_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test10_workdone', $thejobsheet->test10_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test11" class="block text-sm font-medium text-gray-700">Any Leaks</label>
                                                @if ($errors->has('test11'))<span class="text-red-700">{{ $errors->first('test11') }}</span>@endif
                                                <select name="test11" id="test11" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test11', $thejobsheet->test11) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test11', $thejobsheet->test11) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test11_workdone" class="block text-sm font-medium text-gray-700">Any Leaks - Work Done</label>
                                            @if ($errors->has('test11_workdone'))<span class="text-red-700">{{ $errors->first('test11_workdone') }}</span>@endif
                                            <input type="text" name="test11_workdone" id="test11_workdone" autocomplete="test11_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test11_workdone', $thejobsheet->test11_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test12" class="block text-sm font-medium text-gray-700">Any Pipes Worn To Excess</label>
                                                @if ($errors->has('test12'))<span class="text-red-700">{{ $errors->first('test12') }}</span>@endif
                                                <select name="test12" id="test12" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test12', $thejobsheet->test12) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test12', $thejobsheet->test12) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test12_workdone" class="block text-sm font-medium text-gray-700">Any Pipes Worn To Excess - Work Done</label>
                                            @if ($errors->has('test12_workdone'))<span class="text-red-700">{{ $errors->first('test12_workdone') }}</span>@endif
                                            <input type="text" name="test12_workdone" id="test12_workdone" autocomplete="test12_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test12_workdone', $thejobsheet->test12_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test13" class="block text-sm font-medium text-gray-700">Pipe Guides</label>
                                                @if ($errors->has('test13'))<span class="text-red-700">{{ $errors->first('test13') }}</span>@endif
                                                <select name="test13" id="test13" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test13', $thejobsheet->test13) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test13', $thejobsheet->test13) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test13_workdone" class="block text-sm font-medium text-gray-700">Pipe Guides - Work Done</label>
                                            @if ($errors->has('test13_workdone'))<span class="text-red-700">{{ $errors->first('test13_workdone') }}</span>@endif
                                            <input type="text" name="test13_workdone" id="test13_workdone" autocomplete="test13_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test13_workdone', $thejobsheet->test13_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test14" class="block text-sm font-medium text-gray-700">Load Test</label>
                                                @if ($errors->has('test14'))<span class="text-red-700">{{ $errors->first('test14') }}</span>@endif
                                                <select name="test14" id="test14" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test14', $thejobsheet->test14) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test14', $thejobsheet->test14) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test14_workdone" class="block text-sm font-medium text-gray-700">Load Test - Work Done</label>
                                            @if ($errors->has('test14_workdone'))<span class="text-red-700">{{ $errors->first('test14_workdone') }}</span>@endif
                                            <input type="text" name="test14_workdone" id="test14_workdone" autocomplete="test14_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test14_workdone', $thejobsheet->test14_workdone) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="test15" class="block text-sm font-medium text-gray-700">Overload Warning</label>
                                                @if ($errors->has('test15'))<span class="text-red-700">{{ $errors->first('test15') }}</span>@endif
                                                <select name="test15" id="test15" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="pass" @if (old('test15', $thejobsheet->test15) == 'pass') {{ 'selected' }} @endif>Pass</option>
                                                        <option value="fail" @if (old('test15', $thejobsheet->test15) == 'fail') {{ 'selected' }} @endif>Fail</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="test15_workdone" class="block text-sm font-medium text-gray-700">Overload Warning - Work Done</label>
                                            @if ($errors->has('test15_workdone'))<span class="text-red-700">{{ $errors->first('test15_workdone') }}</span>@endif
                                            <input type="text" name="test15_workdone" id="test15_workdone" autocomplete="test15_workdone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('test15_workdone', $thejobsheet->test15_workdone) }}">
                                            </div>



                                            <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                            <label for="date_tested" class="block text-sm font-medium text-gray-700">Date Last Tested</label>
                                            @if ($errors->has('date_tested'))<span class="text-red-700">{{ $errors->first('date_tested') }}</span>@endif
                                            <input type="text" name="date_tested" id="date_tested" autocomplete="date_tested" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('date_tested', $thejobsheet->date_tested) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="advisory" class="block text-sm font-medium text-gray-700">Advisory</label>
                                            @if ($errors->has('advisory'))<span class="text-red-700">{{ $errors->first('advisory') }}</span>@endif
                                            <input type="text" name="advisory" id="advisory" autocomplete="advisory" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('advisory', $thejobsheet->advisory) }}">
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
        var date_input=$('input[name="date_tested"]'); 
        var options={
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
        })

     </script>
</x-app-layout>
