<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta nombre="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>

<body>
    <div class="form__wrapper">
        <form action="/dashboard/add" class="form" method="POST">
            @csrf
            <h1 class="form__title">Agregar Usuario</h1>
            <div class="form__group">
                <input type="text" name="nombre" id="nombre" class="form__input">
                <label for="nombre" class="form__label" id="label__nombre">Nombre</label>
            </div>
            @error('nombre')
            <span class="error">{{ $message }}</span>
            @enderror
            <div class="form__group">
                <input type="email" name="correo" id="correo" class="form__input">
                <label for="correo" class="form__label" id="label__correo">Correo</label>
            </div>
            @error('correo')
            <span class="error">{{ $message }}</span>
            @enderror
            <div class="form__group">
                <input type="password" name="contraseña" id="contraseña" class="form__input">
                <label for="contraseña" class="form__label" id="label__contraseña">Contraseña</label>
            </div>
            @error('contraseña')
            <span class="error">{{ $message }}</span>
            @enderror
            <button type="submit" class="form__button">Agregar</button>
        </form>
    </div>
</body>

<script>
    const inputs = document.querySelectorAll('.form__input');

    inputs.forEach(input => {
        input.addEventListener('change', function(e) {

            if (this.value === "") {
                this.nextElementSibling.classList.remove('active');
            } else {
                this.nextElementSibling.classList.add('active');
            }
        })
    })
</script>

</html>