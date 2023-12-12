<!--if user->id in $actividad->participantes:
boton unido
else:
boton unirse
-->


@include('includes.header')

<script>
    // Obtener la alerta
    $(document).ready(function() {
        var alerta = document.getElementById("alerta");

        // Configurar el temporizador para ocultar la alerta después de 2 segundos
        setTimeout(function() {
            alerta.style.display = "none";
        }, 2500);
    }, );
</script>
<div class="misre mt-5">
    <br><br>
    <h1><strong>Actividades Disponibles</strong></h1>
</div>
@if (session()->has('success'))
    <div id="alerta" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form class="formulario" action="{{ route('filtro') }}" method="POST">
    @csrf

    <div class="mb-3">
    <label for="dia" class="form-label">Día:</label>
    <input type="date" name="dia" id="dia" class="form-control">
</div>


<div class="mb-3">
    <label for="actividad_nombre" class="form-label">Nombre de la Actividad:</label>
    <select name="actividad_nombre" id="actividad_nombre" class="form-select">
        <option value="">Selecciona una actividad</option>
        @foreach ($actividades as $actividad)
            <option value="{{ $actividad->id }}">{{ $actividad->nombre }}</option>
        @endforeach
    </select>
</div>


<div class="mb-3">
    <label for="provincia_nombre" class="form-label">Provincia</label>
    <select name="provincia_nombre" id="provincia_nombre" class="form-select">
        <option value="">Selecciona una provincia</option>
        @foreach ($provincias as $provincia)
            <option value="{{ $provincia->nombre }}">{{ $provincia->nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-btn mt-3 ">
    <button class="btn btn-primary" type="submit">Filtrar</button>
</div>


</form>


<table class="styled-table">
    <thead>
        <tr>
            <th>Hora</th>
            <th>Dia</th>
            <th>Actividad</th>
            <th>Provincia</th>
            <th>Lugar</th>      
            <th>Participantes</th>
        </tr>
    </thead>

    @isset($todasactividades)

        @foreach ($todasactividades as $actividad)
        <tr>
            <td>{{ $actividad->hora }}</td>
            <td>{{ $actividad->dia }}</td>
            <td>{{ $actividad->actividad->nombre }}</td>
            <td>{{ $actividad->lugar->municipio->provincia->nombre }}</td>
            <td>{{ $actividad->lugar->nombre }}</td>
         

            <td><button class="btn btn-primary btn-ver-participantes" data-actividad-id="{{ $actividad->id }}">Ver</button>
            </td>

            <!-- Modal -->
            <div class="modal fade" id="modalParticipantes" tabindex="-1" role="dialog"
                aria-labelledby="modalParticipantesLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalParticipantesLabel">Participantes de la Actividad</h5>
                        </div>
                        <div class="modal-body" id="modalParticipantesContent">
                            <!-- Contenido dinámico de participantes se cargará aquí -->
                        </div>
                    </div>
                </div>
            </div>

            @if (Auth::check())
                @if ($actividad->unido == false)
                    <td><a class="btn btn-secondary btn-md" href="unirse/id={{ $actividad->id }}">Unirse</a></td>
                @else
                    <td><a class="btn btn-success">Unido</a></td>
                @endif
            @else
                <td><a class="btn btn-secondary btn-md" href="register">Unirse</a></td>
            @endif


            </tr>
        @endforeach
    @endisset
</table>

<!--

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var buttons = document.querySelectorAll('.btn-ver-participantes');

        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                var actividadId = button.getAttribute('data-actividad-id');

                fetch('/obtener-participantes/' + actividadId)
                    .then(response => response.json())
                    .then(data => {
                        var modalBody = document.getElementById(
                        'modalParticipantesContent');
                        modalBody.innerHTML = '<ul>' + data.participantes.join(
                            '</li><li>') + '</li></ul>';
                        $('#modalParticipantes').modal('show');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    });
</script>

-->


<!-- SEGUNDO SCRIPT PARA CERRAR EL POPUP  -->


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var buttons = document.querySelectorAll('.btn-ver-participantes');

        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                var actividadId = button.getAttribute('data-actividad-id');

                fetch('/obtener-participantes/' + actividadId)
                    .then(response => response.json())
                    .then(data => {
                        var modalBody = document.getElementById(
                        'modalParticipantesContent');
                        modalBody.innerHTML = '<li>' + data.participantes.join(
                            '</li><li>') + '</li>';
                        $('#modalParticipantes').modal('show');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });

        // Cerrar el modal al presionar el botón "Cerrar"
        $('#modalParticipantes').on('hidden.bs.modal', function() {
            $(this).find('.modal-body').html(''); // Limpiar el contenido al cerrar el modal
        });
    });
</script>





@include('includes.footer')
