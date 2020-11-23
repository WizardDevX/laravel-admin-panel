@extends('layout')

@section('content')

<nav class="sidebar">
    <div class="sidebar__header">
        <h3 class="brand">
            <span></span>
            <span>Admin Panel</span>
        </h3>
    </div>

    <div class="sidebar__menu">
        <ul>
            <li>
                <a href=""><span></span><span></span></a>
            </li>
            <li>
                <a href="#">
                    <span></span>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span></span>
                    <span>Team</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span></span>
                    <span>Tasks</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span></span>
                    <span>Leaves</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span></span>
                    <span>Projects</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span></span>
                    <span>Timesheet</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span></span>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>

</nav>


<section class="main__content">
    <header>
        <div>
            <span></span>
            <input type="search" placeholder="Search">
        </div>
        <div class="social-icons">
            <span></span>
            <span></span>
            <div></div>
        </div>
    </header>
    <main>
        <h2>Overview</h2>
        <div class="dashboard-cards">
            <div class="card__single">
                <div class="card__body">
                    <span></span>
                    <div>
                        <h5>Account Balance</h5>
                        <h4>$99,999.99</h4>
                    </div>
                </div>
                <div class="card__footer">
                    <a href="#">View All</a>
                </div>
            </div>
        </div>
        <div class="dashboard-cards">
            <div class="card__single">
                <div class="card__body">
                    <span></span>
                    <div>
                        <h5>Account Balance</h5>
                        <h4>$99,999.99</h4>
                    </div>
                </div>
                <div class="card__footer">
                    <a href="#">View All</a>
                </div>
            </div>
        </div>
        <div class="dashboard-cards">
            <div class="card__single">
                <div class="card__body">
                    <span></span>
                    <div>
                        <h5>Account Balance</h5>
                        <h4>$99,999.99</h4>
                    </div>
                </div>
                <div class="card__footer">
                    <a href="#">View All</a>
                </div>
            </div>
        </div>
    </main>
</section>


@endsection