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
    <label for="tipo"> Tipo</label>
    <select name="tipo">
        @foreach ($actividades as $m)
            <option value="">{{ $m->tipo }}</option>
        @endforeach
    </select>
</div>



<div class="form-btn mt-5 ">
    <button id="boton" class="btn btn-primary">Crear Actividad</button>
</div>
</form>                 




@include('includes.footer')