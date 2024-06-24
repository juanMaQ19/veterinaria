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
                            <div class="col-md-12">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: {!! json_encode($events) !!},
            eventContent: function(info) {
                var content = document.createElement('div');
                content.innerHTML = '<b>' + info.event.title + '</b><br>' + 
                                    '<span class="event-info" >Paciente:</span> ' + info.event.extendedProps.paciente + '<br>' +
                                    '<span class="event-info">Medico:</span> ' + info.event.extendedProps.medico + '<br>' +
                                    '<span class="event-info">Horario:</span> ' + info.event.extendedProps.horario;
                return { domNodes: [content] };
            },
            eventClassNames: function(info) {
                if (info.event.title === 'aprobado') {
                    return ['event-approved']; // Agrega la clase 'event-approved' para eventos aprobados
                } else {
                    return ['event-pending']; // Agrega la clase 'event-pending' para eventos pendientes
                }
            }
        });
        
        calendar.render();
    });
</script>

<style>
    .event-approved {
        background-color: green; // Color para eventos aprobados
    }
    
    .event-pending {
        background-color: rgb(136, 4, 4); // Color para eventos pendientes
    }
    
    .event-info {
        font-size: 18px; // Tamaño de letra para la información del evento
    }
</style>

@endsection
