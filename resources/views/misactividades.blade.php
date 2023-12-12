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
    <h1><strong>Mis Actividades</strong></h1>
    <a class="btn btn-secondary btn-md" href="crear">Crear Nueva Actividad</a>
</div>
@if (session()->has('success'))
    <div id="alerta" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<table class="styled-table">
    <thead>
        <tr>
            <th>Hora</th>
            <th>Dia</th>
            <th>Actividad</th>
            <th>Lugar</th>
            <th>Participantes</th>
    </thead>

    @isset($misactividades)

        @foreach ($misactividades as $actividad)
            <td>{{ $actividad->hora }}</td>
            <td>{{ $actividad->dia }}</td>
            <td>{{ $actividad->actividad->nombre }}</td>
            <td>{{ $actividad->lugar->nombre }}</td>
            <td><button class="btn btn-primary btn-ver-participantes" data-actividad-id="{{ $actividad->id }}">Ver</button></td>
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

            <td><a class="btn btn-secondary btn-md" href="eliminar/id={{ $actividad->id }}">Eliminar</a></td>
            </tr>
        @endforeach
    @endisset
</table>

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
