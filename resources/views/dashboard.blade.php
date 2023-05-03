<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Jobs Calendars') }}
            </h2>

            <div>
                <span class="sm:ml-3">
                    <a href="{{ route('jobs.new') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add New Job
                    </a>
                </span>  
                <span class="sm:ml-3">
                    <a href="{{ route('clients.new') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        Add New Client
                    </a>
                </span>  
            </div>

        </div>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-start align-center">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700" >
                        Jobs Calendar
                    </a>
                    <a href="{{ route('dashboard-workshop') }}" class="ml-2 px-4 py-2 border border-gray-300 rounded-md text-gray-700" >
                        Workshop Calendar
                    </a>
                </div>
            </div>
        </div>
    </div>

    
    <div class="pt-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between align-center">
                    <div>
                        <span class="px-2 mt-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-yellow-900 uppercase"><span class="font-bold pr-2">{{count($ongoing)}}</span> Ongoing</span>
                        <span class="px-2 mt-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase"><span class="font-bold pr-2">{{count($complete)}}</span> Complete</span>
                        <span class="px-2 mt-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-red-800 uppercase"><span class="font-bold pr-2">{{count($furtheraction)}}</span> Further Action</span>
                        <span class="px-2 mt-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 text-white uppercase"><span class="font-bold pr-2">{{count($invoice)}}</span> Invoice</span>
                        <span class="px-2 mt-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white-500 text-gray-500 uppercase border border-gray-300"><span class="font-bold pr-2">{{count($unassinged)}}</span> UnAssigned</span>
                        <span class="px-2 mt-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-900 text-white uppercase border border-gray-300"><span class="font-bold pr-2">{{count($Invoiced)}}</span> Invoiced</span>
                    </div>
                    <a href="{{ route('jobs') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700" >
                        Total Jobs {{count($jobs)}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-2 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <div id='full_calendar_events'></div>
                </div>
            </div>
        </div>
    </div>

    <script>
            $(document).ready(function () {
    
                var SITEURL = "{{ url('/') }}";
    
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    
                var calendar = $('#full_calendar_events').fullCalendar({
                    defaultView: 'agendaWeek',
                    // customButtons: {
                    //     myCustomButton: {
                    //     text: 'Add New Job',
                    //     click: function() {
                    //         alert('clicked the custom button!');
                    //     }
                    //     }
                    // },
                    header: {
                        left: 'prev,next, today, myCustomButton', //note no "buttons
                        center: 'title',
                        right: 'year,agendaDay,agendaWeek,month,listWeek'
                    
                    },
                    footer : {
                        left: 'prev,next, today, myCustomButton', //note no "buttons
                        center: 'title',
                        right: 'year,agendaDay,agendaWeek,month,listWeek'
                    
                    },
                    

                    editable: true,
                    events: SITEURL + "/dashboard",
                    noEventsMessage:'No Jobs To Display',
                    minTime:"06:00:00",
                    eventLimit: true,
                    allDayDefault: false,
                    allDaySlot:false,
                    eventRender: function (event, element, view) {
                        event.allDay = false;  
                        event.displayEventTime = true;  

                    },
                    eventAfterRender: function (event, element, view) {
              
                        if (event.status == 'ongoing') {
                            
                            // event.color = "#FFB347"; //Em andamento
                            element.css('background-color', 'rgba(253, 230, 138, var(--tw-bg-opacity))');
                            element.css('border-color', 'rgba(253, 230, 138, var(--tw-bg-opacity))');
                            element.css('color', '#000000');
                            element.css('padding', '0px 5px');
                            element.css('cursor', 'pointer');
                            element.css('box-shadow', '0px 0px 1px 1px #898989');
                            element.text('Job: ' + event.id + ' - ' + event.title + ' - ' + event.start_time + ' - ' + event.customer_name);
                        } 
                        if (event.status == 'complete') {
                            // event.color = "#FFB347"; //Em andamento
                            element.css('background-color', 'rgba(209, 250, 229, var(--tw-bg-opacity))');
                            element.css('border-color', 'rgba(209, 250, 229, var(--tw-bg-opacity))');
                            element.css('color', '#000000');
                            element.css('padding', '0px 5px');
                            element.css('cursor', 'pointer');
                            element.css('box-shadow', '0px 0px 4px 1px #A0A0A0');
                            element.text('Job: ' + event.id + ' - ' + event.title + ' - ' + event.start_time + ' - ' + event.customer_name);
                            
                        } 
                        if (event.status == 'furtheraction') {
                            // event.color = "#FFB347"; //Em andamento
                            element.css('background-color', 'rgba(252, 165, 165, var(--tw-bg-opacity))');
                            element.css('border-color', 'rgba(252, 165, 165, var(--tw-bg-opacity))');
                            element.css('color', '#000000');
                            element.css('padding', '0px 5px');
                            element.css('cursor', 'pointer');
                            element.css('box-shadow', '0px 0px 4px 1px #A0A0A0');
                            element.text('Job: ' + event.id + ' - ' + event.title + ' - ' + event.start_time + ' - ' + event.customer_name);
                        } 
                        if (event.status == 'invoice') {
                            // event.color = "#FFB347"; //Em andamento
                            element.css('background-color', 'rgba(107, 114, 128, var(--tw-bg-opacity))');
                            element.css('border-color', 'rgba(107, 114, 128, var(--tw-bg-opacity))');
                            element.css('color', '#ffffff');
                            element.css('padding', '0px 5px');
                            element.css('cursor', 'pointer');
                            element.css('box-shadow', '0px 0px 4px 1px #A0A0A0');
                            element.text('Job: ' + event.id + ' - ' + event.title + ' - ' + event.start_time + ' - ' + event.customer_name);
                        } 
                        if (event.status == 'unassinged') {
                            // event.color = "#FFB347"; //Em andamento
                            element.css('background-color', 'rgba(255, 255, 255, var(--tw-bg-opacity))');
                            element.css('border-color', 'rgba(107, 114, 128, var(--tw-bg-opacity))');
                            element.css('color', 'rgba(107, 114, 128)');
                            element.css('padding', '0px 5px');
                            element.css('cursor', 'pointer');
                            element.css('box-shadow', '0px 0px 4px 1px #A0A0A0');
                            element.text('Job: ' + event.id + ' - ' + event.title + ' - ' + event.start_time + ' - ' + event.customer_name);
                        } 

                        if (event.status == 'Invoiced') {
                            // event.color = "#FFB347"; //Em andamento
                            element.css('background-color', 'rgba(0, 0, 0, var(--tw-bg-opacity))');
                            element.css('border-color', 'rgba(0, 0, 0, var(--tw-bg-opacity))');
                            element.css('color', '#ffffff');
                            element.css('padding', '0px 5px');
                            element.css('cursor', 'pointer');
                            element.css('box-shadow', '0px 0px 4px 1px #A0A0A0');
                            element.text('Job: ' + event.id + ' - ' + event.title + ' - ' + event.start_time + ' - ' + event.customer_name);
                        } 
                    },
                    eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
                        var time = $.fullCalendar.formatDate(event.start, "HH:mm");
                        var date = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD");
                        // var event_end = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD");
                        
                        $.ajax({
                            url: SITEURL + '/calendar-crud-ajax',
                            data: {
                                title: event.engineer_name,
                                start: start,
                                end: start,
                                start_time: time,
                                start_date: date,
                                id: event.id,
                                description: event.customer_name,
                                type: 'edit'
                            },
                            type: "POST",
                            success: function (response) {
                              
                            }
                        });
                    },
                    // selectable: true,
                    // selectHelper: true,
                    // select: function (start) {
                    //     var engineer_name = prompt('Engineer Name:');
                    //     if (engineer_name) {
                    //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    //         var event_end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                    //         $.ajax({
                    //             url: SITEURL + "/calendar-crud-ajax",
                    //             data: {
                    //                 engineer_name: engineer_name,
                    //                 start: start,
                    //                 event_end: event_end,
                    //                 type: 'create'
                    //             },
                    //             type: "POST",
                    //             success: function (data) {
    
                    //                 calendar.fullCalendar('renderEvent', {
                    //                     id: data.id,
                    //                     title: engineer_name,
                    //                     start: start,
                    //                     end: event_end,
                    //                     allDay: allDay
                    //                 }, true);
                    //                 calendar.fullCalendar('unselect');
                    //             }
                    //         });
                    //     }
                    // },
                    // eventDrop: function (event, delta) {
                    //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    //     var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
    
                    //     $.ajax({
                    //         url: SITEURL + '/calendar-crud-ajax',
                    //         data: {
                    //             title: event.engineer_name,
                    //             start: start,
                    //             end: event_end,
                    //             id: event.id,
                    //             type: 'edit'
                    //         },
                    //         type: "POST",
                    //         success: function (response) {
                              
                    //         }
                    //     });
                    // },
                    eventClick: function (event) {
                        window.open('http://46.101.38.100/jobs/'+event.id, "_self");
                        return false;
                        
                    }
                });
            });
    

    
        </script>


</x-app-layout>
