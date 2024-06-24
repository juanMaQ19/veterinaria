@extends('layouts.app')

@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="page__heading"></h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">   
                        <div class="row">
                            <div class="col-md-4 col-xl-4">
                                <!DOCTYPE html>
                                <html lang='en'>
                                    <head>
                                        <meta charset='utf-8' />
                                        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js'></script>
                                        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                var calendarEl = document.getElementById('calendar');
                                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                                    initialView: 'dayGridMonth'
                                                    
                                                });
                                                calendar.render();
                                            });
                                        </script>
                                    </head>
                                    <body>
                                        <div id='calendar'></div>
                                    </body>
                                </html>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
