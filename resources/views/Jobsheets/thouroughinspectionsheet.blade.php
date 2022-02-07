<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Thourough Inspection Sheet: {{$thejobsheet->id}}
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
                                    <a href="{{ route('thouroughinspectionsheet.exportpdf', $thejob->id) }}" class="export-pdf inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white bg-gray-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                          </svg>
                                        Save As PDF
                                    </a>
                                </span> 
                            </span>

                            <span>
                                <span class="sm:ml-3">
                                    <a href="{{ route('thourough.edit', $thejobsheet->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                          Date Last Inspection
                                      
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                          <span class="mt-1 font-bold text-gray-900 sm:mt-0 sm:col-span-2">{{$thejobsheet->date_last_inspection}}</span> 
                                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-green-800">{{ \Carbon\Carbon::parse($thejobsheet->date_last_inspection)->diffForHumans() }}</span>
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
                                       Vehicle Type
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->vehicle_type}}
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Vehicle Reg
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->vehicle_reg}}
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Vehicle Mileage
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->vehicle_mileage}}
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Date Of Man
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->date_of_man}}
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Platform Make
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->platform_make}}
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Platform Model
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->platform_model}}
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Platform Serial
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->platform_serial}}
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         S.W.L
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->swl}}
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Tested At 10% O/Load
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->tested_at}}kg
                                    </dd>
                                </div>

                                    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Work Platforms
                                    </h3>
                                    </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Flooring Intact & Self Draining
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->work_platform_flooring == 'y')Yes
                                        @elseif ($thejobsheet->work_platform_flooring == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Toe Boards Intact & 150mm high
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->work_platform_toeboards == 'y')Yes
                                        @elseif ($thejobsheet->work_platform_toeboards == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Top Guard Rail Intact pin/bolts 1100mm high
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->work_platform_topguard == 'y')Yes
                                        @elseif ($thejobsheet->work_platform_topguard == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Mid Guard Rail Intact pin/bolts
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->work_platform_midguard == 'y')Yes
                                        @elseif ($thejobsheet->work_platform_midguard == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Gates In Good Order & Self Closing/Latching
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->work_platform_gates == 'y')Yes
                                        @elseif ($thejobsheet->work_platform_gates == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Cage Mounts
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->work_platform_cagemounts == 'y')Yes
                                        @elseif ($thejobsheet->work_platform_cagemounts == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                         Harness Points Secure
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->work_platform_harnesspoints == 'y')Yes
                                        @elseif ($thejobsheet->work_platform_harnesspoints == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Structure
                                    </h3>
                                    </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                            Scissor/Booms Arms Intact
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->structure_scissorbooms_arms == 'y')Yes
                                        @elseif ($thejobsheet->structure_scissorbooms_arms == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Scissor/Boom Pins & Retainer Secure
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->structure_scissorbooms_pins == 'y')Yes
                                        @elseif ($thejobsheet->structure_scissorbooms_pins == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                            Bushes Bearings Serviceable
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->structure_bushes == 'y')Yes
                                        @elseif ($thejobsheet->structure_bushes == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Zoom Wear Pads Serviceable
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->structure_zoom == 'y')Yes
                                        @elseif ($thejobsheet->structure_zoom == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                            External/Internal Structure Free From Corrosion
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->structure_corrosion == 'y')Yes
                                        @elseif ($thejobsheet->structure_corrosion == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Outriggers Operate & Free From Distortion
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->structure_outriggers == 'y')Yes
                                        @elseif ($thejobsheet->structure_outriggers == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                            Pothole Protection Secure & Operational
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->structure_pothole == 'y')Yes
                                        @elseif ($thejobsheet->structure_pothole == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Slew Ring Bearing Serviceable
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->structure_slew_ring_serviceable == 'y')Yes
                                        @elseif ($thejobsheet->structure_slew_ring_serviceable == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Slew Ring Bearing Bolts Secure
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->structure_slew_ring_bolts == 'y')Yes
                                        @elseif ($thejobsheet->structure_slew_ring_bolts == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Power Track Serviceable
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->structure_powertrack == 'y')Yes
                                        @elseif ($thejobsheet->structure_powertrack == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Operating Systems
                                </h3>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Fuel Tank Free From Leaks
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_fueltank == 'y')Yes
                                        @elseif ($thejobsheet->os_fueltank == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Control Cables
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_controlcables == 'y')Yes
                                        @elseif ($thejobsheet->os_controlcables == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Battery Secure & Terminal/Levels Serviceable
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_battery == 'y')Yes
                                        @elseif ($thejobsheet->os_battery == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Battery Charger & Lead Secure/Operational
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_battery_charger == 'y')Yes
                                        @elseif ($thejobsheet->os_battery_charger == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Pump Free from Leaks & Secure
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_pump == 'y')Yes
                                        @elseif ($thejobsheet->os_pump == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Slew Drive & Gears Correctly Adjusted
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_slew_drive == 'y')Yes
                                        @elseif ($thejobsheet->os_slew_drive == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Gear Box Oil Level
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_gearbox == 'y')Yes
                                        @elseif ($thejobsheet->os_gearbox == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>
                                
                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Hydraulic Tank Free From Oil
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_hydraulic_tank == 'y')Yes
                                        @elseif ($thejobsheet->os_hydraulic_tank == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Hydraulic Filter & Oil Serviceable
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_hydraulic_filter == 'y')Yes
                                        @elseif ($thejobsheet->os_hydraulic_filter == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Hydraulic Hoses & Pipes
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_hydraulic_hoses == 'y')Yes
                                        @elseif ($thejobsheet->os_hydraulic_hoses == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Control Cables
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_control_cables == 'y')Yes
                                        @elseif ($thejobsheet->os_control_cables == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Hydraulic Cylinders Secure & Free From Leaks
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_hydraulic_cylinders_secure == 'y')Yes
                                        @elseif ($thejobsheet->os_hydraulic_cylinders_secure == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Hydraulic Cylinders Not Distorted or Corroded
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_hydraulic_cylinders_distorted == 'y')Yes
                                        @elseif ($thejobsheet->os_hydraulic_cylinders_distorted == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Platforms Levelling/Rotation Serviceable
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_platforms_levelling == 'y')Yes
                                        @elseif ($thejobsheet->os_platforms_levelling == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Drive Travel Components Secure
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_drive_travel == 'y')Yes
                                        @elseif ($thejobsheet->os_drive_travel == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Brakes Operate To Manufacture Spec
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_brakes == 'y')Yes
                                        @elseif ($thejobsheet->os_brakes == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Tie Rods/Steering Linkage Secure
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_tie_rods == 'y')Yes
                                        @elseif ($thejobsheet->os_tie_rods == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Wheel Nuts & Tyres Secure/Serviceable
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->os_wheelnuts == 'y')Yes
                                        @elseif ($thejobsheet->os_wheelnuts == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>


                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Control Systems Hydraulic
                                    </h3>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Control Valves Manual-Functional
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_hydraulic_valves_manual == 'y')Yes
                                        @elseif ($thejobsheet->control_hydraulic_valves_manual == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                            Control Valves Electric-Functional
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_hydraulic_valves_electric == 'y')Yes
                                        @elseif ($thejobsheet->control_hydraulic_valves_electric == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Check Valves/Over Centre-Functional
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_hydraulic_check_valves == 'y')Yes
                                        @elseif ($thejobsheet->control_hydraulic_check_valves == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                            Cylinder & Drive Speed Controls-Functional
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_hydraulic_cylinder == 'y')Yes
                                        @elseif ($thejobsheet->control_hydraulic_cylinder == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Emergency Lowering Controls-Functional
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_hydraulic_emergency == 'y')Yes
                                        @elseif ($thejobsheet->control_hydraulic_emergency == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                            System Pressures
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_hydraulic_system_pressures == 'y')Yes
                                        @elseif ($thejobsheet->control_hydraulic_system_pressures == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Control Systems Electric
                                    </h3>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Ground Controls-Functional
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_electric_ground == 'y')Yes
                                        @elseif ($thejobsheet->control_electric_ground == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Platform Controls-Functional
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_electric_platform == 'y')Yes
                                        @elseif ($thejobsheet->control_electric_platform == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Emergency Lower Controls (electrical/manual)
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_electric_emergency == 'y')Yes
                                        @elseif ($thejobsheet->control_electric_emergency == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Indicator Lights/Aux Motor Function
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_electric_indicator == 'y')Yes
                                        @elseif ($thejobsheet->control_electric_indicator == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Wiring/Harness Cable
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_electric_wiring == 'y')Yes
                                        @elseif ($thejobsheet->control_electric_wiring == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Speed Controls/Foot Pedal/Dead Man Switch
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->control_electric_speed == 'y')Yes
                                        @elseif ($thejobsheet->control_electric_speed == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Safety Systems
                                    </h3>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Level Sensors & Alarms Operational
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->safety_level_sensor == 'y')Yes
                                        @elseif ($thejobsheet->safety_level_sensor == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Limit Switches, Interiors & Valves Operational
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->safety_limit_switch == 'y')Yes
                                        @elseif ($thejobsheet->safety_limit_switch == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Warning Lights/Guages Functional
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->safety_warning_lights == 'y')Yes
                                        @elseif ($thejobsheet->safety_warning_lights == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Functional Test
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->safety_functional_test == 'y')Yes
                                        @elseif ($thejobsheet->safety_functional_test == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Overload Test Required
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->safety_overload == 'y')Yes
                                        @elseif ($thejobsheet->safety_overload == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        S.W.L Test Required
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->safety_swl == 'y')Yes
                                        @elseif ($thejobsheet->safety_swl == 'n')No
                                        @else N/A
                                        @endif  
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Load Applied
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->safety_load_applied}}kg
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Additional For Trailer Mounts
                                    </h3>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Brakes/Handbrake
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->additional_brakes == 'y')Yes
                                        @elseif ($thejobsheet->additional_brakes == 'n')No
                                        @else N/A
                                        @endif
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Emergency Brake Cable Fitted
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->additional_emergency == 'y')Yes
                                        @elseif ($thejobsheet->additional_emergency == 'n')No
                                        @else N/A
                                        @endif
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Tow Hitch
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->additional_tow == 'y')Yes
                                        @elseif ($thejobsheet->additional_tow == 'n')No
                                        @else N/A
                                        @endif
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Wheel Bearings
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->additional_wheel == 'y')Yes
                                        @elseif ($thejobsheet->additional_wheel == 'n')No
                                        @else N/A
                                        @endif
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Lights & Light Board
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->additional_lights == 'y')Yes
                                        @elseif ($thejobsheet->additional_lights == 'n')No
                                        @else N/A
                                        @endif
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Decals/Labels Present & Ligible
                                    </h3>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Manufacture Plate
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->decals_manufacture == 'y')Yes
                                        @elseif ($thejobsheet->decals_manufacture == 'n')No
                                        @else N/A
                                        @endif
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Safe Working Load
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->decals_safe_load == 'y')Yes
                                        @elseif ($thejobsheet->decals_safe_load == 'n')No
                                        @else N/A
                                        @endif
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Ground Controls & Platform Instructions
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->decals_platform_instructions == 'y')Yes
                                        @elseif ($thejobsheet->decals_platform_instructions == 'n')No
                                        @else N/A
                                        @endif
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Emergency Lowering
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->decals_emergency == 'y')Yes
                                        @elseif ($thejobsheet->decals_emergency == 'n')No
                                        @else N/A
                                        @endif
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Instruction Manual
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->decals_instruction == 'y')Yes
                                        @elseif ($thejobsheet->decals_instruction == 'n')No
                                        @else N/A
                                        @endif
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Safety/Instruction Decals
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if ($thejobsheet->decals_safety == 'y')Yes
                                        @elseif ($thejobsheet->decals_safety == 'n')No
                                        @else N/A
                                        @endif
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Additional Comments Advisory
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$thejobsheet->additional_info}}
                                    </dd>
                                </div>

                                <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Engineer Signature
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <img id="" src="{{$engineersignature}}" width="auto">
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Customer Signature
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <img id="" src="{{$customersignature}}" width="auto">
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
