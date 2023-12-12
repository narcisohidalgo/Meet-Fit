<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
*{
    text-align: center;
}
.d1{
    background-color: #EDF2F7;
    width: 60%;
    padding-bottom: 2rem;
}



.d2{

    align-items: center;
    background-color: white;
    width: 40%;
    margin: auto; /* Centrar el div horizontalmente */
    text-align: left; /* Alinear el texto dentro del div a la izquierda */
}


</style>
</head>
<body>
    <div class="d1">
        <h1>{{ config('app.name') }}</h1>
        <div class="d2">
            <h3><p>Hola {{ $usuario->name }},</p></H3>
                <H4><p>Te has unido correctamente a la actividad "{{ $actividad }}". ¡Esperamos que tengas una gran experiencia!</p></H4>
                <p><b>Saludos,<br>{{ config('app.name') }}</b></p>
        </div>
    </div>
</body>
</html>
