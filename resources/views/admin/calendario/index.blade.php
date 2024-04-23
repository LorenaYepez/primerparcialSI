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
                            <button type="button" id="buttonModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
                                Abrir modal
                              </button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalFormLabel">Crear nuevo evento</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" class="needs-validation" novalidate="" action="/admin/calendario/crearEvento">
                @csrf
                <div class="mb-3">
                  <label for="titulo" class="form-label">Título</label>
                  <input type="text" class="form-control"  name="titulo"  id="titulo" placeholder="Ingrese el título">
                </div>
                <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <textarea class="form-control"  name="descripcion"  id="descripcion" rows="3"></textarea>
                </div>
                <div class="mb-3">
                  <label for="fechaInicio" class="form-label">Fecha de inicio</label>
                  <input type="date"  name="fechainicio" class="form-control" id="fechaInicio">
                </div>
                <div class="mb-3">
                  <label for="fechaFin" class="form-label">Fecha de fin</label>
                  <input type="date"  name="fechafin"class="form-control" id="fechaFin">
                </div>

                <div class="mb-3">
                  <label for="colores" class="form-label">Colores</label>
                  <select class="form-control form-control" id="colores" name="colores" multiple>
                    <option value="#007bff">Azul</option>
                    <option value="#ffc107">Naranaja</option>
                    <option value="#00FF00">Verde</option>
                    <option value="#F8BB86">Rosa</option>
                    <option value="#CC99FF">Violeta</option>
                  </select>
                </div>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

              </form>
            </div>
          </div>
        </div>
      </div>
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
                        backgroundColor: "{{ $eventos->Color }}",
                        borderColor: "{{ $eventos->Color }}",
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
                    $('#buttonModal').click();
                    var formattedStart = start.format('YYYY-MM-DD'); // Outputs: 2024-03-31 20:00
                    $('#fechaInicio').val(formattedStart);
                    var formattedEnd = end.format('YYYY-MM-DD'); // Outputs: 2024-04-02 00:00
                    $('#fechaFin').val(formattedEnd);
                    // // Código a ejecutar cuando se selecciona un rango de fechas
                    // var title = prompt("Ingrese un título para el evento:");
                    // if (title) {
                    //     // Crear evento y agregarlo al calendario
                    //     var newEvent = {
                    //         title: title,
                    //         start: start,
                    //         end: end
                    //     };
                    //     // Render the event on the calendar
                    //     $('#myEvent2').fullCalendar('renderEvent', newEvent);
                    // }
                    // // Deseleccionar las fechas después del prompt
                    // $('#myEvent2').fullCalendar('unselect');
                }
            });
        });
    </script>
@endsection
