@extends('layout')

@section('content')

<input type="checkbox" id="sidebar__toggle" checked>
<nav class="sidebar">
    <div class="sidebar__header">
        <h3 class="brand">
            <span><i class="fas fa-toolbox"></i></span>
            <span>Admin Panel</span>
        </h3>
        <label for="sidebar__toggle"><i class="fas fa-bars"></i></label>
    </div>

    <div class="sidebar__menu">
        <ul>
            <li>
                <a href=""><span></span><span></span></a>
            </li>
            <li>
                <a href="/dashboard">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/add">
                    <i class="fas fa-users"></i>
                    <span>Agregar Usuario</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-tasks"></i>
                    <span>Tareas</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-file"></i>
                    <span>Archivos</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-project-diagram"></i>
                    <span>Proyectos</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-address-book"></i>
                    <span>Contactos</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}">
                    <i class="fas fa-cog"></i>
                    <span>Modificar Cuenta</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

</nav>


<section class="main__content">
    <header>
        <div class="search__wrapper">
            <i class="fas fa-search"></i>
            <input type="search" placeholder="Search">
        </div>
    </header>
    <main>

        <section class="users">

            <h3 class="users__title">Lista de Usuarios</h3>
            <div class="filter">
                <span>Filtrar:</span>
                <a href="/dashboard/name" class="button__filter">Nombre</a>
                <a href="/pdf" class="button__info">Exportar a PDF</a>
            </div>

            <div class="table__responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Actualizar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($users)
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href={{  '/dashboard/update/' . $user->id }} class="button__warning">
                                    <i class="fas fa-check"></i>
                                </a>
                            </td>
                            <td><a href={{ '/dashboard/delete/' . $user->id }} class="button__danger">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                {{ $users->links('vendor.pagination.simple-default') }}
            </div>

        </section>

    </main>
</section>

@endsection