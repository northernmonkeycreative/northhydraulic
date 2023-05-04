<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Add New Holiday') }} 
                </h2>

                <span class="sm:ml-3">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                        Back To Dashboard
                    </a>
                </span>   
            </div>
            
        </x-slot>

    
        @include('layouts.partials.alerts.alerts')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">   
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Holiday Information</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                Create a new holiday to display a car in the calendar. This will help you visually manage when to schedule jobs as you can position holiday cards where needed.
                                </p>
                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow-sm overflow-hidden sm:rounded-md">
                                    <form action="{{ route('holiday.store') }}" class="form-horizontal" role="form" method="POST">
                                        @csrf
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                                @if ($errors->has('title'))<span class="text-red-700">{{ $errors->first('title') }}</span>@endif
                                                <input type="text" name="title" id="title" autocomplete="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('title') }}">
                                                </div>
                                                
                                
                                                <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                                <label for="start_date" class="block text-sm font-medium text-gray-700">Holiday Start Date</label>
                                                @if ($errors->has('start_date'))<span class="text-red-700">{{ $errors->first('start_date') }}</span>@endif
                                                <input type="text" name="start_date" id="start_date" autocomplete="start_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('start_date') }}" required>
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 date" id="timepicker">
                                                <label for="start_time" class="block text-sm font-medium text-gray-700">Holiday Start Time</label>
                                                @if ($errors->has('start_time'))<span class="text-red-700">{{ $errors->first('start_time') }}</span>@endif
                                                <input type="text" name="start_time" id="start_time" autocomplete="start_time" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('start_time') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                                <label for="end_date" class="block text-sm font-medium text-gray-700">Holiday End Date</label>
                                                @if ($errors->has('end_date'))<span class="text-red-700">{{ $errors->first('end_date') }}</span>@endif
                                                <input type="text" name="end_date" id="end_date" autocomplete="end_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('end_date') }}" required>
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 date" id="timepicker2">
                                                <label for="end_time" class="block text-sm font-medium text-gray-700">Holiday End Time</label>
                                                @if ($errors->has('end_time'))<span class="text-red-700">{{ $errors->first('end_time') }}</span>@endif
                                                <input type="text" name="end_time" id="end_time" autocomplete="end_time" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('end_time') }}">
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





        <!-- Modal -->
        <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
            <form class="form-horizontal" role="form" method="POST" id="ajax-client-form">
            @csrf 
            @method('POST')   
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="clientModalLabel">Add New Client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                                    
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                                                @if ($errors->has('company_name'))<span class="text-red-700">{{ $errors->first('company_name') }}</span>@endif
                                                <input type="text" name="company_name" id="company_name" autocomplete="company_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('company_name') }}">
                                                </div>
                                
                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="contact_name" class="block text-sm font-medium text-gray-700">Contact Name</label>
                                                @if ($errors->has('contact_name'))<span class="text-red-700">{{ $errors->first('contact_name') }}</span>@endif
                                                <input type="text" name="contact_name" id="contact_name" autocomplete="contact_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('contact_name') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                                                @if ($errors->has('contact_number'))<span class="text-red-700">{{ $errors->first('contact_number') }}</span>@endif
                                                <input type="text" name="contact_number" id="contact_number" autocomplete="contact_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('contact_number') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email</label>
                                                @if ($errors->has('contact_email'))<span class="text-red-700">{{ $errors->first('contact_email') }}</span>@endif
                                                <input type="text" name="contact_email" id="contact_email" autocomplete="contact_email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('contact_email') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name</label>
                                                @if ($errors->has('site_name'))<span class="text-red-700">{{ $errors->first('site_name') }}</span>@endif
                                                <input type="text" name="site_name" id="site_name" autocomplete="site_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('site_name') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="site_address" class="block text-sm font-medium text-gray-700">Site Address</label>
                                                @if ($errors->has('site_address'))<span class="text-red-700">{{ $errors->first('site_address') }}</span>@endif
                                                <input type="text" name="site_address" id="site_address" autocomplete="site_address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('site_address') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="postcode" class="block text-sm font-medium text-gray-700">Postcode</label>
                                                @if ($errors->has('postcode'))<span class="text-red-700">{{ $errors->first('postcode') }}</span>@endif
                                                <input type="text" name="postcode" id="postcode" autocomplete="postcode" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('postcode') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="company_notes" class="block text-sm font-medium text-gray-700">Company Notes</label>
                                                @if ($errors->has('company_notes'))<span class="text-red-700">{{ $errors->first('company_notes') }}</span>@endif
                                                <textarea name="company_notes" id="company_notes" autocomplete="company_notes" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('company_notes') }}</textarea>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                              
                                    
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="submit" class="btn btn-primary">Save Client</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

       
           <script>
$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#submit").on('click', function(e){

    $('#submit').html('Please Wait...');
    $("#submit"). attr("disabled", true);
    $.ajax({
        url: "{{route('clients.store')}}",
        type: "POST",
        data: $('#ajax-client-form').serialize(),
            success: function( response ) {
                $('#submit').html('Save Client');
                $("#submit"). attr("disabled", false);
                document.getElementById("ajax-client-form").reset(); 
                location.reload();
            }
   });
});
  
</script>
           








        <script type="text/javascript">
            // $(function () {
            //     $('#datepicker').datepicker();
            // });

            $(document).ready(function(){
                //start date
                var start_date=$('input[name="start_date"]'); 
                var options={
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,
                    autoclose: true,
                };
                start_date.datepicker(options);

                //end date
                var end_date=$('input[name="end_date"]'); 
                var options={
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,
                    autoclose: true,
                };
                end_date.datepicker(options);
            })

            // start time
            var start_time=$('input[name="start_time"]'); 

            var timeoptions={
                timeFormat: 'H:i',
                minTime: '6:00'
                };
                start_time.timepicker(timeoptions);
            // end time
            var end_time=$('input[name="end_time"]'); 

            var timeoptions={
                timeFormat: 'H:i',
                minTime: '6:00'
                };
                end_time.timepicker(timeoptions);


         </script>
    </x-app-layout>
    