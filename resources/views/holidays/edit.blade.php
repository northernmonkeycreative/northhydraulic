<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Update Holiday') }} - {{$theholiday->title}}
                </h2>

                <div>
                <span class="sm:ml-3">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                        Back To Dashboard
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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Holiday Information</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                Edit the Holiday Information Here.
                                </p>
                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow-sm overflow-hidden sm:rounded-md">
                                    <form action="{{ route('holiday.update', $theholiday) }}" class="form-horizontal" role="form" method="POST">
                                        @csrf
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                                @if ($errors->has('title'))<span class="text-red-700">{{ $errors->first('title') }}</span>@endif
                                                <input type="text" name="title" id="title" autocomplete="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('title', $theholiday->title) }}">
                                                </div>

                                              
                                
                                                <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                                <label for="start_date" class="block text-sm font-medium text-gray-700">Holiday Start Date</label>
                                                @if ($errors->has('start_date'))<span class="text-red-700">{{ $errors->first('start_date') }}</span>@endif
                                                <input type="text" name="start_date" id="start_date" autocomplete="start_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('start_date', $theholiday->start_date) }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                                <label for="start_time" class="block text-sm font-medium text-gray-700">Holiday Start Time</label>
                                                @if ($errors->has('start_time'))<span class="text-red-700">{{ $errors->first('start_time') }}</span>@endif
                                                <input type="text" name="start_time" id="start" autocomplete="start_time" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('start_time', $theholiday->start_time) }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                                <label for="end_date" class="block text-sm font-medium text-gray-700">Holiday End Date</label>
                                                @if ($errors->has('end_date'))<span class="text-red-700">{{ $errors->first('end_date') }}</span>@endif
                                                <input type="text" name="end_date" id="end_date" autocomplete="end_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('end_date') }}  {{ old('start_time', $theholiday->end_date) }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 date" id="timepicker">
                                                <label for="end_time" class="block text-sm font-medium text-gray-700">Holiday End Time</label>
                                                @if ($errors->has('end_time'))<span class="text-red-700">{{ $errors->first('end_time') }}</span>@endif
                                                <input type="text" name="end_time" id="end_time" autocomplete="end_time" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('end_time') }} {{ old('start_time', $theholiday->end_time) }}">
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
            var date_input=$('input[name="start_date"]'); 
            var options={
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
            })


            var time_input=$('input[name="start_time"]'); 

            var timeoptions={
                timeFormat: 'H:i',
                minTime: '6:00'
                };
            time_input.timepicker(timeoptions);




            $(document).ready(function(){
            var end_date=$('input[name="end_date"]'); 
            var options={
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                autoclose: true,
            };
            end_date.datepicker(options);
            })


            var end_time=$('input[name="end_time"]'); 

            var timeoptions={
                timeFormat: 'H:i',
                minTime: '6:00'
                };
                end_time.timepicker(timeoptions);

         </script>
    </x-app-layout>
    