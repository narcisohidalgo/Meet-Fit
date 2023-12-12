@include('includes.header')
<br><b><br><br><br></b>
    

<form> 

<div class="form-group">
    <label for="actividad"> Actividad</label>
    <select name="actividad">
        @foreach ($actividades as $actividad)
            <option value="{{ $actividad->id }}">{{ $actividad->nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="municipio"> Municipios</label>
        @foreach ($municipios as $m)
            <h1>{{$m->nombre}}</h1>
            @foreach ($m->lugares as $lugar)
                <h2>{{$lugar->nombre}}</h2>
                @foreach ($lugar->demandadas as $demandada)
                    <h4>{{$demandada->usuario}}</h4>
                @endforeach
            @endforeach
        @endforeach
</div>



<div class="form-btn mt-5 ">
    <button id="boton" class="btn btn-primary">Crear Actividad</button>
</div>
</form>                 

@include('includes.footer')