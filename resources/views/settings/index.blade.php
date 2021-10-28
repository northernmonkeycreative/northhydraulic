<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('System Settings') }}
                </h2> 
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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">System Settings</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                Manage System Settings and Company Information Here.
                                </p>
                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                    @if($settings)
                                    <form action="{{ route('settings.update', $settings->id) }}" class="form-horizontal" role="form" method="POST">
                                            @csrf
                                            <div class="px-4 py-5 bg-white sm:p-6">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 sm:col-span-6">
                                                        <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                                                        @if ($errors->has('company_name'))<span class="text-red-700">{{ $errors->first('company_name') }}</span>@endif
                                                        <input type="text" name="company_name" id="company_name" autocomplete="company_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('company_name', $settings->company_name) }}">
                                                    </div>
                                    
                                                    <div class="col-span-6 sm:col-span-6">
                                                        <label for="company_email" class="block text-sm font-medium text-gray-700">Company Email</label>
                                                        @if ($errors->has('company_email'))<span class="text-red-700">{{ $errors->first('company_email') }}</span>@endif
                                                        <input type="text" name="company_email" id="company_email" autocomplete="company_email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('company_email', $settings->company_email) }}">
                                                    </div>
    
                                                    <div class="col-span-6 sm:col-span-6">
                                                        <label for="company_phone" class="block text-sm font-medium text-gray-700">Company Phone</label>
                                                        @if ($errors->has('company_phone'))<span class="text-red-700">{{ $errors->first('company_phone') }}</span>@endif
                                                        <input type="text" name="company_phone" id="company_phone" autocomplete="company_phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('company_phone', $settings->company_phone) }}">
                                                    </div>
    
                                                    <div class="col-span-6 sm:col-span-6">
                                                        <label for="company_address" class="block text-sm font-medium text-gray-700">Company Address</label>
                                                        @if ($errors->has('company_address'))<span class="text-red-700">{{ $errors->first('company_address') }}</span>@endif
                                                        <input type="text" name="company_address" id="company_address" autocomplete="company_address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('company_address', $settings->company_address) }}">
                                                    </div>
    
                                                    <div class="col-span-6 sm:col-span-6">
                                                        <label for="company_postcode" class="block text-sm font-medium text-gray-700">Company Postcode</label>
                                                        @if ($errors->has('company_postcode'))<span class="text-red-700">{{ $errors->first('company_postcode') }}</span>@endif
                                                        <input type="text" name="company_postcode" id="company_postcode" autocomplete="company_postcode" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('company_postcode', $settings->company_postcode) }}">
                                                    </div>
    
                                                </div>
                                            </div>
                                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Save
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>       
            </div>
        </div>
    </x-app-layout>
    