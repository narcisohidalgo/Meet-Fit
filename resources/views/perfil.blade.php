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
    <h1><strong>Actualiza Tu Perfil</strong></h1>
</div>
@if (session()->has('success'))
    <div id="alerta" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Formulario para mostrar y modificar el perfil del usuario -->

<form class="formulario"  id="form-confirmar-R" action="{{ route('perfil.modificar') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nuevo nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ $usuario->name }}" required class="form-control">
    </div>

    <div class="mb-3">
        <label for="current_password" class="form-label"> Contraseña Actual</label>
        <input type="password" id="current_password" name="current_password" required class="form-control @error('current_password') is-invalid @enderror">
        @error('current_password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

    <div class="mb-3">
        <label for="new_password" class="form-label"> Nueva Contraseña</label>
        <input type="password" id="new_password" name="new_password" class="form-control">
    </div>

    <div class="mb-3">
        <label for="new_password_confirmation" class="form-label"> Confirmar Nueva Contraseña</label>
        <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control">
    </div>

    <!--

    <div class="mb-3">
        <label for="password" class="form-label"> Contraseña</label>
        <input type="password" id="password" name="password" required class="form-control">
    </div>

    -->

    <div class="form-btn mt-5 ">
        <button id="boton" class="btn btn-primary">Guardar Cambios</button>
    </div>

</form>



@include('includes.footer')
