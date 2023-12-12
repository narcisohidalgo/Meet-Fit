@include('includes.header')
<div class="misre mt-5">
    <br><br><br>
    <h1><strong>Actividades Registradas</strong></h1>
</div>

<table class="styled-table">
    <thead>
        <tr>
            <th>Hora</th>
            <th>Dia</th>
            <th>Actividad</th>
            <th>Lugar</th>
    </thead>

    @isset($actividades)

        @foreach ($actividades as $actividad)
            <td>{{ $actividad->demandada->hora }}</td>
            <td>{{ $actividad->demandada->dia }}</td>
            <td>{{ $actividad->demandada->actividad->nombre }}</td>
            <td>{{ $actividad->demandada->lugar->nombre }}</td>

            </tr>
        @endforeach
    @endisset

</table>

@include('includes.footer')
