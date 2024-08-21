<nav class="navbar navbar-dark navbar-expand-lg bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#">Todolist</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tasks') || Request::is('tasks/*') ? 'active' : '' }}"
                        href="/tasks">Daftar Tugas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('history') ? 'active' : '' }}" href="/history">Riwayat Tugas</a>
                </li>
            </ul>
        </div>
        <form action="/logout" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-primary" type="submit">Keluar</button>
        </form>
    </div>
</nav>
