<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Add New Job') }} 
                </h2>

                <span class="sm:ml-3">
                    <a href="{{ route('jobs') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                        Back To Jobs
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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Job Information</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                Add New Job Here.
                                </p>
                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow-sm overflow-hidden sm:rounded-md">
                                    <form action="{{ route('jobs.store') }}" class="form-horizontal" role="form" method="POST">
                                        @csrf
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label for="customer_id" class="block text-sm font-medium text-gray-700">Choose Client</label>
                                                    @if ($errors->has('customer_id'))<span class="text-red-700">{{ $errors->first('customer_id') }}</span>@endif
                                                    <select name="customer_id" id="customer_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                            <option value="">Please Choose The Client</option>
                                                        @foreach($clients as $client)
                                                            <option value="{{$client->id}}">{{$client->company_name}}</option>
                                                        @endforeach
                                                    </select>

                                                    <span style="float:right;margin-top:10px;"><small><a href="Javascript:void" data-toggle="modal" data-target="#clientModal">Create New Client</a></small></span>
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                                                    @if ($errors->has('department'))<span class="text-red-700">{{ $errors->first('department') }}</span>@endif
                                                    <select name="department" id="department" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            <option value="">Please Choose The Department</option>
                                                            <option value="tradecounter">Trade Counter</option>
                                                            <option value="workshop">Workshop</option>
                                                            <option value="mobilehose">Mobile Hose</option>
                                                            <option value="mobileengineer">Mobile Engineer</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                        <label for="engineer_id" class="block text-sm font-medium text-gray-700">Choose Engineer</label>
                                                        @if ($errors->has('engineer_id'))<span class="text-red-700">{{ $errors->first('engineer_id') }}</span>@endif
                                                        <select name="engineer_id" id="engineer_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                                <option value="">Please Choose The Engineer</option>
                                                            @foreach($engineers as $engineer)
                                                                <option value="{{$engineer->id}}">{{$engineer->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                
                                                <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                                <label for="start_date" class="block text-sm font-medium text-gray-700">Job Start Date</label>
                                                @if ($errors->has('start_date'))<span class="text-red-700">{{ $errors->first('start_date') }}</span>@endif
                                                <input type="text" name="start_date" id="start_date" autocomplete="start_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('start_date') }}" required>
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 date" id="timepicker">
                                                <label for="start_time" class="block text-sm font-medium text-gray-700">Job Start Time</label>
                                                @if ($errors->has('start_time'))<span class="text-red-700">{{ $errors->first('start_time') }}</span>@endif
                                                <input type="text" name="start_time" id="start_time" autocomplete="start_time" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('start_time') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="hours" class="block text-sm font-medium text-gray-700">How Many Hours will this job take?</label>
                                                @if ($errors->has('hours'))<span class="text-red-700">{{ $errors->first('hours') }}</span>@endif
                                                <input type="number" name="hours" id="hours" autocomplete="hours" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('hours') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="site_address" class="block text-sm font-medium text-gray-700">Site Address</label>
                                                @if ($errors->has('site_address'))<span class="text-red-700">{{ $errors->first('site_address') }}</span>@endif
                                                <input type="text" name="site_address" id="site_address" autocomplete="site_address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('site_address') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="site_contact" class="block text-sm font-medium text-gray-700">Site Contact</label>
                                                @if ($errors->has('site_contact'))<span class="text-red-700">{{ $errors->first('site_contact') }}</span>@endif
                                                <input type="text" name="site_contact" id="site_contact" autocomplete="site_contact" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('site_contact') }}">
                                                </div>


                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="vehicle" class="block text-sm font-medium text-gray-700">Vehicle</label>
                                                @if ($errors->has('vehicle'))<span class="text-red-700">{{ $errors->first('vehicle') }}</span>@endif
                                                <input type="text" name="vehicle" id="vehicle" autocomplete="vehicle" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('vehicle') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="reg" class="block text-sm font-medium text-gray-700">Vehicle Registration</label>
                                                @if ($errors->has('reg'))<span class="text-red-700">{{ $errors->first('reg') }}</span>@endif
                                                <input type="text" name="reg" id="reg" autocomplete="reg" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('reg') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="purchase_order_number" class="block text-sm font-medium text-gray-700">Purchase Order Number</label>
                                                @if ($errors->has('purchase_order_number'))<span class="text-red-700">{{ $errors->first('purchase_order_number') }}</span>@endif
                                                <input type="text" name="purchase_order_number" id="purchase_order_number" autocomplete="purchase_order_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('purchase_order_number') }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="details" class="block text-sm font-medium text-gray-700">Details Of Job</label>
                                                @if ($errors->has('details'))<span class="text-red-700">{{ $errors->first('details') }}</span>@endif
                                                <textarea name="details" id="details" autocomplete="details" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('details') }}</textarea>
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="internal_notes" class="block text-sm font-medium text-gray-700">Internal Notes</label>
                                                @if ($errors->has('internal_notes'))<span class="text-red-700">{{ $errors->first('internal_notes') }}</span>@endif
                                                <textarea name="internal_notes" id="internal_notes" autocomplete="internal_notes" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('internal_notes') }}</textarea>
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
    