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
    <h1><strong>Participantes de la Actividad "{{ $actividad->nombre }}"</strong></h1>
    <hr />
</div>
@if (session()->has('success'))
    <div id="alerta" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<table class="table">
    <thead>
        <tr>
            <th>Participantes</th>
    </thead>
    @foreach ($participantes as $participante)
        <td>{{ $participante }}</td>
    @endforeach
    </tr>
</table>

@include('includes.footer')
