<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Manage Engineers') }}
                </h2>
                
            
                <a href="{{ route('users.new') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Engineer
                </a>
            
            </div>
            
        </x-slot>
    
   
        @include('layouts.partials.alerts.alerts')
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow-sm overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Phone
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Role
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    
                                </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($engineers as $engineer)
                              <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <div class="ml-0">
                                      <div class="text-sm font-medium text-gray-900">
                                            {{$engineer->name}}
                                      </div>
                                      <div class="text-sm text-gray-500">
                                            <a href="mailto:{{$engineer->email}}" title="Send Email To {{$engineer->name}}">{{$engineer->email}}</a>
                                      </div>

                                    </div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-left px-6 py-4 inline-flex text-sm text-gray-500">{{$engineer->phone}}</span>
                                </td>
    
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($engineer->trashed())
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>    
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($engineer->isAdmin())
                                        Admin
                                    @else
                                        Engineer
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <!-- Revoke Access -->
                                    @if(!$engineer->isAdmin())
                                        @if($engineer->trashed())
                                        <button class="inline-flex bg-red-300 hover:bg-red-400 text-white-800 font-bold py-2 px-4 rounded inline-flex items-center" onclick="if(confirm('Restore Users Access?')){document.getElementById('restore-entity-{{ $engineer->id }}').submit();return false;}">
                                            <span>Restore Access</span>
                                        </button>
                                        <form id="restore-entity-{{ $engineer->id }}" action="{{ route('engineers.restore', $engineer->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="PATCH">
                                            @csrf
                                        </form>
                                        @else
                                        <button class="inline-flex bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" onclick="if(confirm('Revoke Users Access?')){document.getElementById('delete-entity-{{ $engineer->id }}').submit();return false;}">
                                            <span>Revoke Access</span>
                                        </button>
                                        <form id="delete-entity-{{ $engineer->id }}" action="{{ route('users.destroy', $engineer) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>
                                        @endif
                                    @endif   
                                </td>
                                <td>
                                    @if(!$engineer->trashed())
                                        <a href="{{ route('engineers.show', $engineer->id) }}"  class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <!-- Heroicon name: solid/link -->
                                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500"xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            View
                                        </a>
                                    @endif
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </x-app-layout>
    