@include('includes.header')

<br><b><br><br><br></b>



<form class="border p-5" id="form-confirmar-R" action="/reservar" method="GET">
    @csrf

    <div class="row">
    <div class="col-md-6">

    <div class="form-group mb-3">
        <label for="actividad" class="form-label"> Actividad</label>
        <select name="actividad" class="form-select">
            @foreach ($actividades as $actividad)
                <option value="{{ $actividad->id }}">{{ $actividad->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="provincia" class="form-label"> Provincia</label>
        <select name="provincia" id="provincia" class="form-select">
            @foreach ($provincias as $provincia)
                <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="municipio" class="form-label"> Municipio</label>
        <select name="municipio" id="municipio" class="form-select">
            @foreach ($municipios as $municipio)
                <option selected="Seleccione" value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6">

    <div class="form-group mb-3">
        <label for="lugar" class="form-label"> Lugar</label>
        <select name="lugar" id="lugar" class="form-select">
            @foreach ($lugares as $lugar)
                <option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="dia" class="form-label"> Dia</label>
        <input name="dia" id="dia" type="date" class="form-control">
    </div>


    <div class="mb-3">
        <label for="hora" class="form-label">Hora</label>
        <input name="hora" id="hora" type="time" class="form-control">
    </div>
</div>
</div>


    <div class="form-btn mt-5 ">
        <button id="boton" class="btn btn-primary">Crear Actividad</button>
    </div>

</form>


<script>
    $(document).ready(function () {
        $('#provincia').change(function () {
            const provinciaId = $(this).val();

            // Realizar una solicitud al servidor para obtener los municipios de la provincia seleccionada
            $.ajax({
                url: '/obtener-municipios/' + provinciaId, // Ruta en la que obtienes los municipios por id de provincia
                method: 'GET',
                success: function (data) {
                    const municipioSelector = $('#municipio');
                    municipioSelector.empty();
                    municipioSelector.append('<option value="">Seleccione Municipio</option>');

                    $.each(data, function (index, municipio) {
                        municipioSelector.append(`<option value="${municipio.id}">${municipio.nombre}</option>`);
                    });
                }
            });
        });

        $('#municipio').change(function () {
            const municipioId = $(this).val();

            // Realizar una solicitud al servidor para obtener los lugares del municipio seleccionado
            $.ajax({
                url: '/obtener-lugares/' + municipioId, // Ruta en la que obtienes los lugares por id de municipio
                method: 'GET',
                success: function (data) {
                    const lugarSelector = $('#lugar');
                    lugarSelector.empty();
                    lugarSelector.append('<option value="">Seleccione Lugar</option>');

                    $.each(data, function (index, lugar) {
                        lugarSelector.append(`<option value="${lugar.id}">${lugar.nombre}</option>`);
                    });
                }
            });
        });
    });
</script>




@include('includes.footer')


    <!-- <div class="form-group">
        <label for="hora"> Hora</label>
        <input name="hora" id="hora" type="text">
    </div>
    -->


<!--
    <div class="form-group">
        <label for="actividad"> Actividad</label>
        <select name="actividad">
            @foreach ($actividades as $actividad)
<option value="{{ $actividad->id }}">{{ $actividad->nombre }}</option>
@endforeach
        </select>
    </div>
    -->

<!--
    <div class="form-group">
        <label for="lugar"> Lugar</label>
        <select name="lugar">
            @foreach ($lugares as $lugar)
<option value="{{ $lugar->id }}">{{ $lugar->nombre }}</option>
@endforeach
        </select>
    </div>
    -->
