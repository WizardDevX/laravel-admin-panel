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
                <a href="#">
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
                    <span>Tasks</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-file"></i>
                    <span>Leaves</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-project-diagram"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-address-book"></i>
                    <span>Contacts</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Account</span>
                </a>
            </li>
            <li>
                <a href="#">
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

            <h3 class="users__title">Usuarios</h3>

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
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->correo }}</td>
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
                        {{ $users->links() }}
                        @endisset
                    </tbody>
                </table>
            </div>

        </section>

    </main>
</section>

@endsection