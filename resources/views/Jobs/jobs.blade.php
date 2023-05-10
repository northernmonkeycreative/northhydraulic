<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Manage Jobs') }}
                </h2>
    
                <div>
                        <a href="{{ route('jobs.export') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        Export To CSV File
                        </a>
                  
                        <a href="{{ route('jobs.new') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add New Job
                        </a>
                    
                </div>
        
            </div>
            
        </x-slot>
    
        <!-- Alerts -->
        @include('layouts.partials.alerts.alerts')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <div class="pb-2">
                        <a href="{{ route('jobs') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 @if(request()->routeIs('jobs'))bg-gray-100 @else bg-white @endif hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                        Active
                        </a>
                        <a href="{{ route('jobs.paid') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 @if(request()->routeIs('jobs.paid'))bg-gray-100 @else bg-white @endif hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                            Invoiced
                        </a>
                    </div>
                    
                <div class="flex flex-col bg-white">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow-sm overflow-hidden border-b border-gray-200 sm:rounded-lg">

                          <div class=" p-4">
                                <table class="table table-hover min-w-full divide-y divide-gray-200" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job Number</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vehicle Reg</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Engineer</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th>
                                            @if (request()->is('jobs/paid'))
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Invoice Number</th>
                                            @endif
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job Number</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vehicle Reg</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Engineer</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th>
                                            @if (request()->is('jobs/paid'))
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Invoice Number</th>
                                            @endif
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($jobs as $job)
                                        <tr class="py-4">
                                            <td class="py-4 py-4 font-bold">{{$job->id}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$job->customer_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><strong>{{$job->reg }}</strong></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$job->department }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{date('d-m-Y', strtotime($job->start))}} @if($job->start_time)(<strong><small>{{$job->start_time}}</small></strong>)@endif</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$job->engineer_name}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                @if($job->status == 'ongoing')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-yellow-900 uppercase">Job Ongoing</span>
                                                @endif
                                                @if($job->status == 'complete')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">Job Complete</span>
                                                @endif
                                                @if($job->status == 'furtheraction')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-red-800 uppercase">Further Action</span>
                                                @endif
                                                @if($job->status == 'invoice')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 text-white uppercase">Invoice Job</span>
                                                @endif
                                                @if($job->status == 'unassinged')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white-500 text-gray-500 uppercase border border-gray-300">Un-Assigned Job</span>
                                                @endif
                                                @if($job->status == 'Invoiced')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white-500 text-gray-500 uppercase border border-gray-300">Invoiced</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="py-4">
                                                    <span>
                                                        @if($job->internal_notes != "")
                                                            <span class="note{{$job->id}} px-2 py-2 text-sm font-medium text-green-700">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                                                                </svg>
                                                            </span>
                                                        @endif
                                                        @if($job->internal_notes == "")
                                                        <a href="{{ route('jobs.edit', $job->id) }}" id="addInternalNote{{$job->id}}" title="Add Internal Note">
                                                        <!-- <a href="{{ route('jobs.show', $job->id) }}"  title="Add Internal Note"> -->
                                                            <span class="px-2 py-2 text-sm font-medium text-gray-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </span>
                                                        </a>

                                                        
                                                       

                                                        

                                                        @endif
                                                    </span>
                                                    <span class="internalnotes{{$job->id}} absolute bg-white p-4 shadow-sm">
                                                        {{$job->internal_notes}}
                                                    </span>

                                                    <script>

                                                        $(".internalnotes{{$job->id}}").css("display", "none");

                                                        $("#addInternalNote{{$job->id}}").click(function(e){
                                                            // e.preventDefault();
                                                            console.log("The button was clicked.");
                                                        }); 

                                                        $(".note{{$job->id}}").mouseenter(function(){
                                                            $(".internalnotes{{$job->id}}").css("display", "block");
                                                        }); 

                                                        $(".note{{$job->id}}").mouseleave(function(){
                                                            $(".internalnotes{{$job->id}}").css("display", "none");
                                                        }); 
                                                        
                                                        </script>
                               
                                                </span>
                                            </td>
                                            @if (request()->is('jobs/paid'))
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$job->invoice_number}}</td>
                                            @endif
                                            <td class="py-4 inline-flex items-center">
                                                <a href="{{ route('jobs.show', $job->id) }}"  title="View This Job" class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    
                                                </a>

                                                <a href="{{ route('jobs.edit', $job->id) }}"  title="Edit This Job" class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>

                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td class="py-4 py-4 font-bold">
                                                    <strong>No Records</strong><br>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- {{ $jobs->links() }} --}}
            </div>
        </div>



        <script>

            (function($) {
                "use strict";

                // Call the dataTables jQuery plugin
                $(document).ready(function() {
                    $('#dataTable').DataTable({
                        stateSave: true, //statesave to help keep pagination state
                        stateDuration:-1,
                        responsive: true,
            processing: true,
            serverSide: true,
            ajax: $.fn.dataTable.pipeline({
               
                pages: 20 // number of pages
            }),
                        stateSaveCallback: function(settings,data) {
                            localStorage.setItem( 'DataTables_' + settings.sInstance, JSON.stringify(data) )
                        },
                        stateLoadCallback: function(settings) {
                            return JSON.parse( localStorage.getItem( 'DataTables_' + settings.sInstance ) )
                        },
                        "order": [[ 0, 'desc' ]]
                    });

                    console.log('databatble is loaded')





                    


                });



            })(jQuery);


            </script>
     

       


        
    </x-app-layout>
    