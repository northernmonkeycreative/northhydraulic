<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Engineer Control Sheet: {{$thejobsheet->id}}
                </h2>
                <span class="sm:ml-3">
                    <a href="{{ route('jobs.show', $thejobsheet->job_id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                        Back To Job
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
                                        Job Sheet Information
                                    </h3>
                                    <p class="mt-1 max-w-2xl text-xs text-gray-500">
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
                                    </p>
                                </span>
                                <div class="inline-flex items-center">

                                <span>
                                    <span class="sm:ml-3">
                                        <a href="{{ route('engineercontrolsheet.exportpdf', $thejobsheet->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white bg-gray-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                              </svg>
                                            Save As PDF
                                        </a>
                                    </span> 
                                </span>
                                <span>
                                    <span class="sm:ml-3">
                                        <a href="{{ route('controlsheet.edit', $thejobsheet->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                            Edit This Job Sheet
                                        </a>
                                    </span> 
                                </span>
                            </div>
                                
                            </div>
                                <div class="border-t border-gray-200">
                                  <dl>
                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                      <dt class="text-sm font-medium text-gray-500">
                                        Job Number
                                      </dt>
                                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejob->id}}
                                      </dd>
                                    </div>
                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                      <dt class="text-sm font-medium text-gray-500">
                                            Start Date
                                        
                                      </dt>
                                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <span class="mt-1 font-bold text-gray-900 sm:mt-0 sm:col-span-2">{{date('d-m-Y', strtotime($thejob->start))}}</span> 
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-green-800">{{ \Carbon\Carbon::parse($thejob->start)->diffForHumans() }}</span>
                                      </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                      <dt class="text-sm font-medium text-gray-500">
                                        Engineer
                                      </dt>
                                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$thejob->engineer_name}}
                                      </dd>
                                    </div>
                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                      <dt class="text-sm font-medium text-gray-500">
                                        Customer
                                      </dt>
                                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <a href="{{url("/clients/{$theclient->id}")}}">{{$theclient->company_name}}</a>
                                      </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Customer Address
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$theclient->site_address}}
                                        </dd>
                                    </div>
                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Vehicle Reg
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$thejob->reg}}
                                        </dd>
                                    </div>

                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Vehicle Description
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$thejob->vehicle}}
                                        </dd>
                                    </div>
                                    
                                    <div class=" px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                      <dt class="text-sm font-medium text-gray-500">
                                        Action Taken
                                      </dt>
                                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$thejobsheet->action_taken}}
                                      </dd>
                                    </div>

                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Parts Used
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->parts_used}}
                                        </dd>
                                    </div>

                                    <div class=" px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Further Action
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->further_action}}
                                        </dd>
                                    </div>

                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Customer Signatures
                                        </dt>
                                        <img id="" src="{{$customersignature}}" width="auto">
                                       
                                        

                                        
                                    
                                    </div>

                                    <div class=" px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Customer Signature Date
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->customer_signature_date}}
                                        </dd>
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
    </x-app-layout>
    