<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Job Sheet') }} {{$thejobsheet->id}}
            </h2>

            <div>
                <span class="sm:ml-3">
                    <a href="{{ route('liftingvarioustestcertificatesheet.show', $thejobsheet->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                <form action="{{ route('various.update', $thejobsheet->id) }}" class="form-horizontal" role="form" method="POST">
                                    @csrf
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">


                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="vehicle" class="block text-sm font-medium text-gray-700">Certificate Number</label>
                                            @if ($errors->has('cert_no'))<span class="text-red-700">{{ $errors->first('cert_no') }}</span>@endif
                                            <input type="text" name="cert_no" id="cert_no" autocomplete="cert_no" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('cert_no', $thejobsheet->cert_no) }}">
                                            </div>

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
                                            <label for="vehicle_vin" class="block text-sm font-medium text-gray-700">Vehicle Vin No</label>
                                            @if ($errors->has('vehicle_vin'))<span class="text-red-700">{{ $errors->first('vehicle_vin') }}</span>@endif
                                            <input type="text" name="vehicle_vin" id="vehicle_vin" autocomplete="vehicle_vin" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('vehicle_vin', $thejobsheet->vehicle_vin) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="lifting_description" class="block text-sm font-medium text-gray-700">Description of Equipment</label>
                                            @if ($errors->has('lifting_description'))<span class="text-red-700">{{ $errors->first('lifting_description') }}</span>@endif
                                            <input type="text" name="lifting_description" id="lifting_description" autocomplete="lifting_description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('lifting_description', $thejobsheet->lifting_description) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="lifting_model" class="block text-sm font-medium text-gray-700">Equipment Model</label>
                                            @if ($errors->has('lifting_model'))<span class="text-red-700">{{ $errors->first('lifting_model') }}</span>@endif
                                            <input type="text" name="lifting_model" id="lifting_model" autocomplete="lifting_model" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('lifting_model', $thejobsheet->lifting_model) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="lifting_serial" class="block text-sm font-medium text-gray-700">Equipment Serial</label>
                                            @if ($errors->has('lifting_serial'))<span class="text-red-700">{{ $errors->first('lifting_serial') }}</span>@endif
                                            <input type="text" name="lifting_serial" id="crane_make" autocomplete="lifting_serial" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('lifting_serial', $thejobsheet->lifting_serial) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="lifting_year" class="block text-sm font-medium text-gray-700">Equipment Year</label>
                                            @if ($errors->has('lifting_year'))<span class="text-red-700">{{ $errors->first('lifting_year') }}</span>@endif
                                            <input type="text" name="lifting_year" id="lifting_year" autocomplete="lifting_year" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('lifting_year', $thejobsheet->lifting_year) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="lifting_safe_working_load" class="block text-sm font-medium text-gray-700">Safe Working Load</label>
                                            @if ($errors->has('lifting_safe_working_load'))<span class="text-red-700">{{ $errors->first('lifting_safe_working_load') }}</span>@endif
                                            <input type="text" name="lifting_safe_working_load" id="lifting_safe_working_load" autocomplete="lifting_safe_working_load" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('lifting_safe_working_load', $thejobsheet->lifting_safe_working_load) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="details" class="block text-sm font-medium text-gray-700">Details of Test Carried Out</label>
                                            @if ($errors->has('details'))<span class="text-red-700">{{ $errors->first('details') }}</span>@endif
                                            <input type="text" name="details" id="details" autocomplete="details" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('details', $thejobsheet->details) }}">
                                            </div>
                                            
                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="engineer_signature" class="block text-sm font-medium text-gray-700">Engineer Signed</label>
                                            @if ($errors->has('engineer_signature'))<span class="text-red-700">{{ $errors->first('engineer_signature') }}</span>@endif
                                            <input type="text" name="engineer_signature" id="engineer_signature" autocomplete="engineer_signature" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('engineer_signature', $thejobsheet->engineer_signature) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="engineer_name" class="block text-sm font-medium text-gray-700">Engineer Name</label>
                                            @if ($errors->has('engineer_name'))<span class="text-red-700">{{ $errors->first('engineer_name') }}</span>@endif
                                            <input type="text" name="engineer_name" id="engineer_name" autocomplete="engineer_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('engineer_name', $thejobsheet->engineer_name) }}">
                                            </div>

                                            

                                            <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                            <label for="date_of_exam" class="block text-sm font-medium text-gray-700">Date Tested</label>
                                            @if ($errors->has('date_of_exam'))<span class="text-red-700">{{ $errors->first('date_of_exam') }}</span>@endif
                                            <input type="text" name="date_of_exam" id="date_of_exam" autocomplete="date_of_exam" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('date_of_exam', $thejobsheet->date_of_exam) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                            <label for="date_next_exam" class="block text-sm font-medium text-gray-700">Date Next Due</label>
                                            @if ($errors->has('date_next_exam'))<span class="text-red-700">{{ $errors->first('date_next_exam') }}</span>@endif
                                            <input type="text" name="date_next_exam" id="date_next_exam" autocomplete="date_next_exam" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('date_next_exam', $thejobsheet->date_next_exam) }}">
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
        var date_of_exam=$('input[name="date_of_exam"]'); 
        var date_next_exam=$('input[name="date_next_exam"]'); 
        var options={
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true,
        };
        date_of_exam.datepicker(options);
        date_next_exam.datepicker(options);
        })

     </script>
</x-app-layout>
