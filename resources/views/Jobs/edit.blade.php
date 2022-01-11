<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Update Job') }} {{$thejob->id}}
                </h2>

                <div>
                        <span class="sm:ml-3">
                                <a href="{{ route('jobs.show', $thejob) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                      </svg>
                                    Back To Job
                                </a>
                            </span>  
                            
                            <span class="sm:ml-3">
                                <a href="{{ route('jobs') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                                    </svg>
                                    Back To All Jobs
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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Job Information</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                Edit the Job Information Here.
                                </p>
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

         </script>
    </x-app-layout>
    