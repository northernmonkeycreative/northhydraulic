<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Manage') }} {{$theuser->name}}
                </h2>

                <span class="sm:ml-3">
                    <a href="{{ route('users') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                        Back To Users
                    </a>

                    {{-- <a href="{{ route('users.delete', $theuser) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Delete User
                    </a> --}}
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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">User Information</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                Manage User Information Here.
                                </p>
                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow-sm overflow-hidden sm:rounded-md">
                                    <form action="{{ route('users.update', $theuser->id) }}" class="form-horizontal" role="form" method="POST">
                                        @csrf
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                                @if ($errors->has('name'))<span class="text-red-700">{{ $errors->first('name') }}</span>@endif
                                                <input type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('name', $theuser->name) }}">
                                                </div>
                                
                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                                @if ($errors->has('email'))<span class="text-red-700">{{ $errors->first('email') }}</span>@endif
                                                <input type="text" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('email', $theuser->email) }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6">
                                                <label for="password" class="block text-sm font-medium text-gray-700">Update User Password</label>
                                                @if ($errors->has('password'))<span class="text-red-700">{{ $errors->first('password') }}</span>@endif
                                                <input type="password" name="password" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('password') }}">
                                                </div>
                                
                                                <div class="col-span-6 sm:col-span-3">
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="is_admin" name="is_admin" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" @if(old('is_admin', $theuser->is_admin) == 1) checked @endif>
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="candidates" class="font-medium text-gray-700">Is This An Admin?</label>
                                                            <p class="text-gray-500">If Checked, this user will be an Admin, otherwise they will be an Engineer.</p>
                                                        </div>
                                                    </div>

                                                </div>

  

                                                <div class="col-span-6 sm:col-span-6">
                                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                                    @if ($errors->has('phone'))<span class="text-red-700">{{ $errors->first('phone') }}</span>@endif
                                                    <input type="text" name="phone" id="phone" autocomplete="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('phone', $theuser->phone) }}">
                                                </div>
                                                
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label for="device_id" class="block text-sm font-medium text-gray-700">Device Serial Number</label>
                                                    @if ($errors->has('device_id'))<span class="text-red-700">{{ $errors->first('device_id') }}</span>@endif
                                                    <input type="text" name="device_id" id="device_id" autocomplete="device_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('device_id', $theuser->device_id) }}">
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
    