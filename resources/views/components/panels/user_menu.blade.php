<nav class="navbar navbar-expand-md bg-body" data-bs-theme="dark">
    <div class="container">
        <a href="/" class="navbar-brand">GOODHOME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent" 
            aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Главная</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('test') }}">Портфолио</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('renovation') }}">Ремонт</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('construction') }}">Строительство</a></li>
            </ul>
        </div>
    </div>
</nav>