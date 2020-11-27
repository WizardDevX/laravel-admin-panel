<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')

<body>
    @yield('content')
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
</body>

</html>