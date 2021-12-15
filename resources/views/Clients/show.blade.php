<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Manage') }} {{$theclient->company_name}}
                </h2>

                <span class="sm:ml-3">
                    <a href="{{ route('clients') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                        Back To Clients
                    </a>
                </span>   
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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Client Jobs</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                Jobs belonging to this client.
                                </p>
                            </div>

                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 overflow-auto h-80">
                                <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                    @forelse($jobs as $job)
                                        <li class="pr-4 py-3 flex items-center justify-between text-sm">
                                            <div class="w-0 flex-1 flex items-center">
                                        
                                                <span class="ml-2 flex-1 w-0">
                                                    #{{$job->id}}
                                                </span>
                                                @if($job->status == 'ongoing')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-yellow-900 uppercase">Ongoing</span>
                                                @endif
                                                @if($job->status == 'complete')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">Complete</span>
                                                @endif
                                                @if($job->status == 'furtheraction')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-red-800 uppercase">Action</span>
                                                @endif
                                                @if($job->status == 'invoice')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 text-white uppercase">Job</span>
                                                @endif
                                                @if($job->status == 'paid')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-900 text-white uppercase">Invoiced</span>
                                                @endif
                                            </div>
                                            <div>
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 text-white uppercase ml-2">{{$job->reg}}</span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <a href="{{ route('jobs.show', $job->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                    View Job
                                                </a>
                                            </div>
                                            
                                      </li>
                                      @empty
                                      No Jobs Added for this Client
                                      @endforelse
                                    </ul>
                                  </dd>
                        </div>

                        <div class="mt-1 md:mt-0 md:col-span-2">
                                <div class="px-0 sm:px-0">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Client Information</h3>
                                        <p class="mt-1 text-sm text-gray-600">
                                        Manage Client Information Here.
                                        </p>
                                    </div>
                            <div class="shadow-sm overflow-hidden sm:rounded-md">
                                    <form action="{{ route('clients.update', $theclient->id) }}" class="form-horizontal" role="form" method="POST">
                                        @csrf
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                                                @if ($errors->has('company_name'))<span class="text-red-700">{{ $errors->first('company_name') }}</span>@endif
                                                <input type="text" name="company_name" id="company_name" autocomplete="company_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('company_name', $theclient->company_name) }}">
                                                </div>
                                                
                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="contact_name" class="block text-sm font-medium text-gray-700">Contact Name</label>
                                                @if ($errors->has('contact_name'))<span class="text-red-700">{{ $errors->first('contact_name') }}</span>@endif
                                                <input type="text" name="contact_name" id="contact_name" autocomplete="contact_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('contact_name', $theclient->contact_name) }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                        <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                                                        @if ($errors->has('contact_number'))<span class="text-red-700">{{ $errors->first('contact_number') }}</span>@endif
                                                        <input type="text" name="contact_number" id="contact_number" autocomplete="contact_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('contact_number', $theclient->contact_number) }}">
                                                        </div>
        
                                                        <div class="col-span-6 sm:col-span-6">
                                                        <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email</label>
                                                        @if ($errors->has('contact_email'))<span class="text-red-700">{{ $errors->first('contact_email') }}</span>@endif
                                                        <input type="text" name="contact_email" id="contact_email" autocomplete="contact_email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('contact_email', $theclient->contact_email) }}">
                                                        </div>
        
                                                        <div class="col-span-6 sm:col-span-6">
                                                        <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name</label>
                                                        @if ($errors->has('site_name'))<span class="text-red-700">{{ $errors->first('site_name') }}</span>@endif
                                                        <input type="text" name="site_name" id="site_name" autocomplete="site_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('site_name', $theclient->site_name) }}">
                                                        </div>
        
                                                        <div class="col-span-6 sm:col-span-6">
                                                        <label for="site_address" class="block text-sm font-medium text-gray-700">Site Address</label>
                                                        @if ($errors->has('site_address'))<span class="text-red-700">{{ $errors->first('site_address') }}</span>@endif
                                                        <input type="text" name="site_address" id="site_address" autocomplete="site_address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('site_address', $theclient->site_address) }}">
                                                        </div>
        
                                                        <div class="col-span-6 sm:col-span-6">
                                                        <label for="postcode" class="block text-sm font-medium text-gray-700">Postcode</label>
                                                        @if ($errors->has('postcode'))<span class="text-red-700">{{ $errors->first('postcode') }}</span>@endif
                                                        <input type="text" name="postcode" id="postcode" autocomplete="postcode" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('postcode', $theclient->postcode) }}">
                                                        </div>
        
                                                        <div class="col-span-6 sm:col-span-6">
                                                        <label for="company_notes" class="block text-sm font-medium text-gray-700">Company Notes</label>
                                                        @if ($errors->has('company_notes'))<span class="text-red-700">{{ $errors->first('company_notes') }}</span>@endif
                                                        <textarea name="company_notes" id="company_notes" autocomplete="company_notes" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('company_notes', $theclient->company_notes) }}</textarea>
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
    </x-app-layout>
    