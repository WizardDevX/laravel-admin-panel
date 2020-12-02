<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios PDF</title>

    <style>
        .users {
            margin-top: 60px;
            background-color: #fff;
            border-radius: 7px;
        }

        .users h3 {
            color: #000;
            padding: 1rem;
        }

        .users table {
            width: 100%;
            border-collapse: collapse;
        }

        .users thead {
            background-color: #e9eaec;
        }

        th,
        td {
            text-align: center;
            font-size: .9rem;
            padding: 1rem .5rem;
            color: #000;
            border: 1px solid #000;
        }

        td {
            font-size: .8rem;
        }

        tbody tr:nth-child(2n) {
            background-color: #efefef;
        }

        .table__responsive {
            overflow-x: auto;
        }
    </style>

</head>

<body>
    <section class="users">
        <h3 class="users__title">Lista de Usuarios</h3>

        <div class="table__responsive">
            <table style="margin:auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($users)
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@lang('messages.' . $user->role)</td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>