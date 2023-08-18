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
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reg</th>
                                            <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th> -->
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Invoice Number</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Engineeer</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            
                                            
                                            
                                            <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot class="bg-gray-50">
                                        <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job Number</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reg</th>
                                            <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th> -->
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Invoice Number</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Engineeer</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
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

                $(document).ready(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax: "{{ route('jobs.paid') }}",
        columns: [
            { data: 'id', name: 'id', "className": "py-4 py-4 font-bold" },
            { data: 'customer_name', name: 'customer_name', "className": "px-6 py-4 whitespace-nowrap text-sm text-gray-500" },
            { data: 'department', name: 'department', "className": "px-6 py-4 whitespace-nowrap text-sm text-gray-500" },
            // ... other columns

            { 
                data: null,
                className: "py-4 inline-flex items-center",
                render: function(data, type, row) {
                    return '<a href="' + row.view_url + '" title="View This Job" class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-700">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                        // ... your SVG path here
                        '</svg>' +
                        '</a>' +
                        '<a href="' + row.edit_url + '" title="Edit This Job" class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-700">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">' +
                        // ... your SVG path here
                        '</svg>' +
                        '</a>';
                }
            }
        ],
        columnDefs: [
            {
                targets: [-1], // The last column (action buttons)
                orderable: false, // Make the action buttons unsortable
            }
        ],
        stateSaveCallback: function(settings, data) {
            localStorage.setItem('DataTables_' + settings.sInstance, JSON.stringify(data))
        },
        stateLoadCallback: function(settings) {
            return JSON.parse(localStorage.getItem('DataTables_' + settings.sInstance))
        },
        "order": [[0, 'desc']]
    });
});




            })(jQuery);


            </script>

       


        
    </x-app-layout>
    