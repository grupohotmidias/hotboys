<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="ti-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('modelo.index') }}">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Modelos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cena.index') }}">
                <i class="ti-video-camera menu-icon"></i>
                <span class="menu-title">Cenas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('noticia.index') }}">
                <i class="ti-comment-alt menu-icon"></i>
                <span class="menu-title">Noticias</span>
            </a>
        </li>
        <div class="dropdown-divider"></div>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">
                <i class="ti-settings menu-icon"></i>
                <span class="menu-title">Configuração</span>
            </a>
        </li>
    </ul>
</nav>
