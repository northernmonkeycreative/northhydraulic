<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Job Number: {{$thejob->id}}
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
    
        <!-- Alerts -->
        @include('layouts.partials.alerts.alerts')

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">   
                        <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6 flex justify-between">
                                <span>
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Job Information
                                    </h3>
                                    <p class="mt-1 max-w-2xl text-xs text-gray-500">
                                        @if($thejob->status != 'unassinged')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase"> <a href="{{url("/engineers/{$thejob->engineer_id}")}}">Assigned To {{$thejob->engineer_name}} </a></span>
                                        @endif

                                            @if($thejob->status == 'ongoing')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-yellow-900 uppercase">Status: Ongoing</span>
                                            @endif
                                            @if($thejob->status == 'complete')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">Status: Complete</span>
                                            @endif
                                            @if($thejob->status == 'furtheraction')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-red-800 uppercase">Status: Further Action</span>
                                            @endif
                                            @if($thejob->status == 'invoice')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 text-white uppercase">Status: Invoice Job</span>
                                            @endif
                                            @if($thejob->status == 'unassinged')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white-500 border border-gray-50 text-gray-500 uppercase">Status: Un-Assigned</span>
                                            @endif
                                            @if($thejob->status == 'Invoiced')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white-500 border border-gray-50 text-gray-500 uppercase">Status: Invoiced</span>
                                            @endif
                                        </p>
                                </span>
                                <div class="inline-flex items-center">
                              
                                <span class="px-2">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                                                <div>Change Job Status</div>
                    
                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>
                    
                                        <x-slot name="content">
                                            <x-dropdown-link onclick="document.getElementById('ongoing-entity-{{ $thejob->id }}').submit();return false;">
                                                <span >{{ __('Ongoing') }}</span> 
                                            </x-dropdown-link>
                    
                                            <x-dropdown-link onclick="document.getElementById('furtheraction-entity-{{ $thejob->id }}').submit();return false;">
                                                {{ __('Further Action') }}
                                            </x-dropdown-link>

                                            <x-dropdown-link onclick="document.getElementById('complete-entity-{{ $thejob->id }}').submit();return false;">
                                                {{ __('Complete') }}
                                            </x-dropdown-link>

                                            <x-dropdown-link onclick="document.getElementById('invoice-entity-{{ $thejob->id }}').submit();return false;">
                                                {{ __('Invoice') }}
                                            </x-dropdown-link>

                                            <x-dropdown-link onclick="document.getElementById('paid-entity-{{ $thejob->id }}').submit();return false;">
                                                {{ __('Invoiced') }}
                                            </x-dropdown-link>
                                            
                                        </x-slot>
                                    </x-dropdown>
                                </span>
                                <span class="pl-2">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                                                    <div>Assign To Engineer</div>
                        
                                                    <div class="ml-1">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </x-slot>
                        
                                            <x-slot name="content">
                                                @foreach($engineers as $engineer)
                                                <x-dropdown-link onclick="document.getElementById('newengineer-entity-{{$engineer->id}}').submit();return false;">
                                                    <span >{{$engineer->name}}</span> 
                                                </x-dropdown-link>
                                                <form id="newengineer-entity-{{ $engineer->id }}" action="{{ route('jobs.updateengineer', $thejob->id) }}" method="POST">
                                                    <input type="hidden" name="engineerid" value="{{$engineer->id}}">
                                                    <input type="hidden" name="engineername" value="{{$engineer->name}}">
                                                    <input type="hidden" name="_method" value="POST">
                                                    @csrf
                                                </form>
                                                @endforeach
                                            </x-slot>
                                        </x-dropdown>
                                        
                                    </span>


                                    

                               







                                <span>
                                    <span class="sm:ml-3">
                                        <a href="{{ route('jobs.edit', $thejob->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                            Edit This Job
                                        </a>
                                    </span> 
                                </span>
                           
                            </div>
                                
                            </div>
                                <div class="border-t border-gray-200">
                                  <dl>
                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                      <dt class="text-sm font-medium text-gray-500">
                                        Department
                                      </dt>
                                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejob->department}}
                                      </dd>
                                    </div>
                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                      <dt class="text-sm font-medium text-gray-500">
                                            Company Name
                                        
                                      </dt>
                                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <a href="{{url("/clients/{$thejob->customer_id}")}}">{{$thejob->customer_name}}</a>
                                      </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                      <dt class="text-sm font-medium text-gray-500">
                                        Job Start Date
                                      </dt>
                                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                         {{-- {{date('d-m-Y', strtotime($thejob->start))}} --}}
                                        <span class="mt-1 font-bold text-gray-900 sm:mt-0 sm:col-span-2">{{date('d-m-Y', strtotime($thejob->start_date))}}</span> 
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-green-800">{{ \Carbon\Carbon::parse($thejob->start_date)->diffForHumans() }}</span>
                                      </dd>
                                    </div>

                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                          Job Start Time
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                           {{-- {{date('d-m-Y', strtotime($thejob->start))}} --}}
                                          <span class="mt-1 font-bold text-gray-900 sm:mt-0 sm:col-span-2">{{$thejob->start_time}}</span> 
                                        </dd>
                                      </div>

                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Site Address
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$thejob->site_address}}
                                        </dd>
                                    </div>


                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Site Contact
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$thejob->site_contact}}
                                        </dd>
                                    </div>


                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                      <dt class="text-sm font-medium text-gray-500">
                                        Vehicle
                                      </dt>
                                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejob->vehicle}}
                                      </dd>
                                    </div>
                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Vehicle Registration
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$thejob->reg}}
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Purchase Order Nuber
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$thejob->purchase_order_number}}
                                        </dd>
                                    </div>
                                    
                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                      <dt class="text-sm font-medium text-gray-500">
                                        Details
                                      </dt>
                                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$thejob->details}}
                                      </dd>
                                    </div>

                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Internal Notes
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{$thejob->internal_notes}} 
                                            </dd>
                                        </div>

                                        @if($thejob->status == 'invoice' || $thejob->status == 'Invoiced')
                                        <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Invoice Number
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{$thejob->invoice_number}}
                                            </dd>
                                        </div>
                                        @endif

                                        
                                     

                                    <hr>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                      <dt class="text-sm font-medium text-gray-500">
                                        Job Sheets
                                      </dt>
                                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                          <!-- Engineer Control Sheets -->
                                          @if($engineercontrolsheets->count() >= 1)
                                            @forelse($engineercontrolsheets as $engineercontrolsheet)
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0 truncate">
                                                    Engineer Control Sheet - Job Number {{$engineercontrolsheet->job_id}}
                                                    </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                <a href="{{ route('engineercontrolsheet.show', $engineercontrolsheet->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                    View Job Sheet
                                                </a>
                                                </div>
                                            </li>
                                            @empty
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        No Engineer Control Sheets Added To This Job
                                                    </div>
                                            </li>
                                            @endforelse
                                          @endif
                                          <!-- Lift Test Certificates -->
                                          <!-- Tail Lift Certificates -->
                                          @if($lifttestcertificates->count() >= 1)
                                            @forelse($lifttestcertificates as $lifttestcertificate)
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0 truncate">
                                                    Tail Lift Certificate - Job Number {{$lifttestcertificate->job_id}}
                                                    {{-- Lift Test Certificate - Job Number {{$lifttestcertificate->job_id}} --}}
                                                    </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                <a href="{{ route('lifttestcertificatesheet.show', $lifttestcertificate->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                    View Job Sheet
                                                </a>
                                                </div>
                                            </li>
                                            @empty
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        No Tail Lift Sheets Added To This Job
                                                    </div>
                                            </li>
                                            @endforelse
                                          @endif

                                          <!-- Winch Test Certificates -->
                                          @if($winchtestcertificates->count() >= 1)
                                            @forelse($winchtestcertificates as $winchtestcertificate)
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0 truncate">
                                                    Winch Test Certificate - Job Number {{$winchtestcertificate->job_id}}
                                                    </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                <a href="{{ route('winchtestcertificatesheet.show', $winchtestcertificate->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                    View Job Sheet
                                                </a>
                                                </div>
                                            </li>
                                            @empty
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        No Winch Test Sheets Added To This Job
                                                    </div>
                                            </li>
                                            @endforelse
                                          @endif

                                          <!-- Lift Various Test Certificates -->
                                          <!-- Miscellaneous Test Certificates -->
                                          @if($liftvarioustestcertificates->count() >= 1)
                                            @forelse($liftvarioustestcertificates as $liftvarioustestcertificate)
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0 truncate">
                                                        Miscellaneous Test Certificate - Job Number {{$liftvarioustestcertificate->job_id}}
                                                        {{-- Lift/Various Test Certificate - Job Number {{$liftvarioustestcertificate->job_id}} --}}
                                                    </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                <a href="{{ route('liftingvarioustestcertificatesheet.show', $liftvarioustestcertificate->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                    View Job Sheet
                                                </a>
                                                </div>
                                            </li>
                                            @empty
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    No Miscellaneous Test Sheets Added To This Job
                                                </div>
                                            </li>
                                            @endforelse
                                          @endif


                                          <!-- Thourough Inspection Sheets -->
                                          <!-- Access Platform Sheets -->
                                          @if($thouroughinspections->count() >= 1)
                                            @forelse($thouroughinspections as $thouroughinspection)
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0 truncate">
                                                        Access Platform - Job Number {{$thouroughinspection->job_id}}
                                                    {{-- Thourough Inspection - Job Number {{$thouroughinspection->job_id}} --}}
                                                    </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                <a href="{{ route('thouroughinspectionsheet.show', $thouroughinspection->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                    View Job Sheet
                                                </a>
                                                </div>
                                            </li>
                                            @empty
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    No Access Platform Sheets Added To This Job
                                                </div>
                                            </li>
                                            @endforelse
                                          @endif

                                          <!-- Crane Test Certificates -->
                                          @if($cranetestcertificates->count() >= 1)
                                            @forelse($cranetestcertificates as $cranetestcertificate)
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0 truncate">
                                                    Crane Test Certificate - Job Number {{$cranetestcertificate->job_id}}
                                                    </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                <a href="{{ route('cranetestcertificatesheet.show', $cranetestcertificate->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                    View Job Sheet
                                                </a>
                                                </div>
                                            </li>
                                            @empty
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        No Crane Test Sheets Added To This Job
                                                    </div>
                                            </li>
                                            @endforelse
                                          @endif
                                          
                                        </ul>
                                      </dd>
                                    </div>

                                    <!-- Images -->
                                    <hr>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        images
                                    </div>

                                  </dl>
                                </div>
                              </div>     
                </div>
            </div>     

        {{-- Hidden forms to use for status changer above --}}
        <form id="ongoing-entity-{{ $thejob->id }}" action="{{ route('jobs.status', $thejob->id) }}" method="POST">
            <input type="hidden" name="ongoing" value="ongoing">
            <input type="hidden" name="_method" value="POST">
            @csrf
        </form>
        <form id="furtheraction-entity-{{ $thejob->id }}" action="{{ route('jobs.status', $thejob->id) }}" method="POST">
            <input type="hidden" name="furtheraction" value="furtheraction">
            <input type="hidden" name="_method" value="POST">
            @csrf
        </form>
        <form id="complete-entity-{{ $thejob->id }}" action="{{ route('jobs.status', $thejob->id) }}" method="POST">
            <input type="hidden" name="complete" value="complete">
            <input type="hidden" name="_method" value="POST">
            @csrf
        </form>
        <form id="invoice-entity-{{ $thejob->id }}" action="{{ route('jobs.status', $thejob->id) }}" method="POST">
            <input type="hidden" name="invoice" value="invoice">
            <input type="hidden" name="_method" value="POST">
            @csrf
        </form>
        <form id="paid-entity-{{ $thejob->id }}" action="{{ route('jobs.status', $thejob->id) }}" method="POST">
            <input type="hidden" name="paid" value="paid">
            <input type="hidden" name="_method" value="POST">
            @csrf
        </form>
    </x-app-layout>
    