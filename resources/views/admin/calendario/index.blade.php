@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-title"></div>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.profile') }}"><i class="fas fa-user"></i> Editar Perfil</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#"><i class="fas fa-calendar"></i>Calendario</a> </li>
            </ul>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Calendar</h4>
                        </div>
                        <div class="card-body">
                            <div class="fc-overflow">
                                <div id="myEvent2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>

    <script>
         $(document).ready(function() {
            $("#myEvent2").fullCalendar({
                selectable: true,
                height: 'auto',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                editable: true,
                events: [

                @foreach ($Eventos as $eventos)
                    {
                        title: '{{ $eventos->Titulo }}',
                        start: '{{ $eventos->FechaInicio }}',
                        end: '{{ $eventos->FechaFin }}',
                        backgroundColor: "#ffc107",
                        borderColor: "#ffc107",
                        textColor: '#fff'
                    },
                @endforeach

                    // {
                    //     title: 'Conference',
                    //     start: '2024-04-9',
                    //     end: '2024-04-11',
                    //     backgroundColor: "#fff",
                    //     borderColor: "#fff",
                    //     textColor: '#000'
                    // },
                    // {
                    //     title: "John's Birthday",
                    //     start: '2024-04-14',
                    //     backgroundColor: "#007bff",
                    //     borderColor: "#007bff",
                    //     textColor: '#fff'
                    // },
                    // {
                    //     title: 'Reporting',
                    //     start: '2024-01-10T11:30:00',
                    //     backgroundColor: "#f56954",
                    //     borderColor: "#f56954",
                    //     textColor: '#fff'
                    // },
                    // {
                    //     title: 'Starting New Project',
                    //     start: '2024-01-11',
                    //     backgroundColor: "#ffc107",
                    //     borderColor: "#ffc107",
                    //     textColor: '#fff'
                    // },
                    // {
                    //     title: 'Social Distortion Concert',
                    //     start: '2024-01-24',
                    //     end: '2024-01-27',
                    //     backgroundColor: "#000",
                    //     borderColor: "#000",
                    //     textColor: '#fff'
                    // },
                    // {
                    //     title: 'Lunch',
                    //     start: '2018-01-24T13:15:00',
                    //     backgroundColor: "#fff",
                    //     borderColor: "#fff",
                    //     textColor: '#000',
                    // },
                    // {
                    //     title: 'Company Trip',
                    //     start: '2018-01-28',
                    //     end: '2018-01-31',
                    //     backgroundColor: "#fff",
                    //     borderColor: "#fff",
                    //     textColor: '#000',
                    // },
                ],
                select: function(start, end) {
                    console.log(start, end);
                    var formattedStart = start.format('YYYY-MM-DD'); // Outputs: 2024-03-31 20:00
                    var formattedEnd = end.format('YYYY-MM-DD'); // Outputs: 2024-04-02 00:00
                    // Código a ejecutar cuando se selecciona un rango de fechas
                    var title = prompt("Ingrese un título para el evento:");
                    if (title) {
                        // Crear evento y agregarlo al calendario
                        var newEvent = {
                            title: title,
                            start: start,
                            end: end
                        };
                        // Render the event on the calendar
                        $('#myEvent2').fullCalendar('renderEvent', newEvent);
                    }
                    // Deseleccionar las fechas después del prompt
                    $('#myEvent2').fullCalendar('unselect');
                }
            });
        });
    </script>
@endsection
