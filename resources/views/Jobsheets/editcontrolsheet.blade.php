<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Job Sheet') }} {{$thejobsheet->id}}
            </h2>

            <div>
                <span class="sm:ml-3">
                    <a href="{{ route('engineercontrolsheet.show', $thejobsheet->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                <form action="{{ route('controlsheet.update', $thejobsheet->id) }}" class="form-horizontal" role="form" method="POST">
                                    @csrf
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">


                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="action_taken" class="block text-sm font-medium text-gray-700">Action Taken</label>
                                            @if ($errors->has('action_taken'))<span class="text-red-700">{{ $errors->first('action_taken') }}</span>@endif
                                            <input type="text" name="action_taken" id="action_taken" autocomplete="action_taken" class="uppercase mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('action_taken', $thejobsheet->action_taken) }}">
                                            </div>



                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="parts_used" class="block text-sm font-medium text-gray-700">Parts Used</label>
                                            @if ($errors->has('parts_used'))<span class="text-red-700">{{ $errors->first('parts_used') }}</span>@endif
                                            <input type="text" name="parts_used" id="parts_used" autocomplete="parts_used" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('parts_used', $thejobsheet->parts_used) }}">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="further_action" class="block text-sm font-medium text-gray-700">Further Action</label>
                                            @if ($errors->has('further_action'))<span class="text-red-700">{{ $errors->first('further_action') }}</span>@endif
                                            <input type="text" name="further_action" id="further_action" autocomplete="further_action" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('further_action', $thejobsheet->further_action) }}">
                                            </div>



                                            
                                            <div class="col-span-6 sm:col-span-6">
                                            <label for="customer_signature" class="block text-sm font-medium text-gray-700">Customer Signature</label>
                                            @if ($errors->has('customer_signature'))<span class="text-red-700">{{ $errors->first('customer_signature') }}</span>@endif
                                            <input type="text" name="customer_signature" id="customer_signature" autocomplete="customer_signature" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('customer_signature', $thejobsheet->customer_signature) }}">
                                            </div>


                                            

                                            <div class="col-span-6 sm:col-span-6 date" id="datepicker">
                                            <label for="customer_signature_date" class="block text-sm font-medium text-gray-700">Customer Signature Date</label>
                                            @if ($errors->has('customer_signature_date'))<span class="text-red-700">{{ $errors->first('customer_signature_date') }}</span>@endif
                                            <input type="text" name="customer_signature_date" id="customer_signature_date" autocomplete="customer_signature_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('customer_signature_date', $thejobsheet->customer_signature_date) }}">
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
