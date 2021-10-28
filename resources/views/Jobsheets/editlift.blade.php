<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Job Sheet') }} {{$thejobsheet->id}}
            </h2>

            <div>
                <span class="sm:ml-3">
                    <a href="{{ route('lifttestcertificatesheet.show', $thejobsheet->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                <form action="{{ route('lift.update', $thejob) }}" class="form-horizontal" role="form" method="POST">
                                    @csrf
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">


                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="vehicle" class="block text-sm font-medium text-gray-700">Certificate Number</label>
                                            @if ($errors->has('cert_no'))<span class="text-red-700">{{ $errors->first('cert_no') }}</span>@endif
                                            <input type="text" name="cert_no" id="cert_no" autocomplete="cert_no" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('cert_no', $thejobsheet->cert_no) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="make" class="block text-sm font-medium text-gray-700">Make</label>
                                            @if ($errors->has('make'))<span class="text-red-700">{{ $errors->first('make') }}</span>@endif
                                            <input type="text" name="make" id="make" autocomplete="make" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('make', $thejobsheet->make) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="vehicle" class="block text-sm font-medium text-gray-700">Model</label>
                                            @if ($errors->has('model'))<span class="text-red-700">{{ $errors->first('model') }}</span>@endif
                                            <input type="text" name="model" id="model" autocomplete="model" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('model', $thejobsheet->model) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="serial" class="block text-sm font-medium text-gray-700">Serial</label>
                                            @if ($errors->has('serial'))<span class="text-red-700">{{ $errors->first('serial') }}</span>@endif
                                            <input type="text" name="serial" id="serial" autocomplete="serial" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('serial', $thejobsheet->serial) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="reg" class="block text-sm font-medium text-gray-700">Registration</label>
                                            @if ($errors->has('reg'))<span class="text-red-700">{{ $errors->first('reg') }}</span>@endif
                                            <input type="text" name="reg" id="reg" autocomplete="reg" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('reg', $thejobsheet->reg) }}">
                                            </div>



                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="safe_working_load" class="block text-sm font-medium text-gray-700">Safe Working Load</label>
                                            @if ($errors->has('safe_working_load'))<span class="text-red-700">{{ $errors->first('safe_working_load') }}</span>@endif
                                            <input type="text" name="safe_working_load" id="safe_working_load" autocomplete="safe_working_load" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('safe_working_load', $thejobsheet->safe_working_load) }}">
                                            </div>


                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="overload_test_applied" class="block text-sm font-medium text-gray-700">Overload Test Applied</label>
                                                @if ($errors->has('overload_test_applied'))<span class="text-red-700">{{ $errors->first('overload_test_applied') }}</span>@endif
                                                <select name="overload_test_applied" id="overload_test_applied" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="1" @if (old('overload_test_applied', $thejobsheet->overload_test_applied) == 1) {{ 'selected' }} @endif>Yes</option>
                                                        <option value="0" @if (old('overload_test_applied', $thejobsheet->overload_test_applied) == 0) {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="reset_relief_valves" class="block text-sm font-medium text-gray-700">Reset Relief Valves</label>
                                                @if ($errors->has('reset_relief_valves'))<span class="text-red-700">{{ $errors->first('reset_relief_valves') }}</span>@endif
                                                <select name="reset_relief_valves" id="reset_relief_valves" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="1" @if (old('reset_relief_valves', $thejobsheet->reset_relief_valves) == 1) {{ 'selected' }} @endif>Yes</option>
                                                        <option value="0" @if (old('reset_relief_valves', $thejobsheet->reset_relief_valves) == 0) {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="safe_working_load_test" class="block text-sm font-medium text-gray-700">Safe Working Load Test</label>
                                            @if ($errors->has('safe_working_load_test'))<span class="text-red-700">{{ $errors->first('safe_working_load_test') }}</span>@endif
                                            <input type="text" name="safe_working_load_test" id="safe_working_load_test" autocomplete="safe_working_load_test" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('safe_working_load_test', $thejobsheet->safe_working_load_test) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="downward_creep" class="block text-sm font-medium text-gray-700">Downward Creep in 15 Mins</label>
                                            @if ($errors->has('downward_creep'))<span class="text-red-700">{{ $errors->first('downward_creep') }}</span>@endif
                                            <input type="text" name="downward_creep" id="downward_creep" autocomplete="downward_creep" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('downward_creep', $thejobsheet->downward_creep) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="check_lift_mountings" class="block text-sm font-medium text-gray-700">Check Lift and Mountings</label>
                                                @if ($errors->has('check_lift_mountings'))<span class="text-red-700">{{ $errors->first('check_lift_mountings') }}</span>@endif
                                                <select name="check_lift_mountings" id="check_lift_mountings" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="1" @if (old('check_lift_mountings', $thejobsheet->check_lift_mountings) == 1) {{ 'selected' }} @endif>Yes</option>
                                                        <option value="0" @if (old('check_lift_mountings', $thejobsheet->check_lift_mountings) == 0) {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="operation_swl_floorheight" class="block text-sm font-medium text-gray-700">Operation at SWL Floor/Height</label>
                                                @if ($errors->has('operation_swl_floorheight'))<span class="text-red-700">{{ $errors->first('operation_swl_floorheight') }}</span>@endif
                                                <select name="operation_swl_floorheight" id="operation_swl_floorheight" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="1" @if (old('operation_swl_floorheight', $thejobsheet->operation_swl_floorheight) == 1) {{ 'selected' }} @endif>Yes</option>
                                                        <option value="0" @if (old('operation_swl_floorheight', $thejobsheet->operation_swl_floorheight) == 0) {{ 'selected' }} @endif>No</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="lift_raises_in" class="block text-sm font-medium text-gray-700">Lift Raises In</label>
                                            @if ($errors->has('lift_raises_in'))<span class="text-red-700">{{ $errors->first('lift_raises_in') }}</span>@endif
                                            <input type="text" name="lift_raises_in" id="lift_raises_in" autocomplete="lift_raises_in" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('lift_raises_in', $thejobsheet->lift_raises_in) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="lift_lowers_in" class="block text-sm font-medium text-gray-700">Lift Lowers In</label>
                                            @if ($errors->has('lift_lowers_in'))<span class="text-red-700">{{ $errors->first('lift_lowers_in') }}</span>@endif
                                            <input type="text" name="lift_lowers_in" id="lift_lowers_in" autocomplete="lift_lowers_in" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('lift_lowers_in', $thejobsheet->lift_lowers_in) }}">
                                            </div>


                                            
                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="signature" class="block text-sm font-medium text-gray-700">Engineer Signed</label>
                                            @if ($errors->has('signature'))<span class="text-red-700">{{ $errors->first('signature') }}</span>@endif
                                            <input type="text" name="signature" id="signature" autocomplete="signature" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('signature', $thejobsheet->signature) }}">
                                            </div>


                                            

                                            <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                            <label for="date_tested" class="block text-sm font-medium text-gray-700">Date Tested</label>
                                            @if ($errors->has('date_tested'))<span class="text-red-700">{{ $errors->first('date_tested') }}</span>@endif
                                            <input type="text" name="date_tested" id="date_tested" autocomplete="date_tested" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('date_tested', $thejobsheet->date_tested) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                            <label for="date_next_due" class="block text-sm font-medium text-gray-700">Date Next Due</label>
                                            @if ($errors->has('date_next_due'))<span class="text-red-700">{{ $errors->first('date_next_due') }}</span>@endif
                                            <input type="text" name="date_next_due" id="date_next_due" autocomplete="date_next_due" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('date_next_due', $thejobsheet->date_next_due) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="advisory_notes" class="block text-sm font-medium text-gray-700">Advisory Notes</label>
                                            @if ($errors->has('advisory_notes'))<span class="text-red-700">{{ $errors->first('advisory_notes') }}</span>@endif
                                            <input type="text" name="advisory_notes" id="advisory_notes" autocomplete="advisory_notes" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('advisory_notes', $thejobsheet->advisory_notes) }}">
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
        var date_tested=$('input[name="date_tested"]'); 
        var date_next_due=$('input[name="date_next_due"]'); 
        var options={
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true,
        };
        date_tested.datepicker(options);
        date_next_due.datepicker(options);
        })

     </script>
</x-app-layout>
