<a class="nav-link" href="{{ route('admin.mainpage') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
    Panel
</a>

<div class="sb-sidenav-menu-heading">Struktura</div>
<a class="nav-link" href="{{ route('admin.subsites') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
    Ustaw podstrony
</a>

<div class="sb-sidenav-menu-heading">Treści</div>
<a class="nav-link" href="{{ route('admin.articles') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
    Zarządzaj wpisami
</a>

<div class="sb-sidenav-menu-heading">Pliki</div>
<a class="nav-link" href="{{ route('admin.files') }}">
    <div class="sb-nav-link-icon"><i class="far fa-file"></i></div>
    Lista plików
</a>


<div class="sb-sidenav-menu-heading">Użytkownicy</div>
<a class="nav-link" href="{{ route('admin.users') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    Lista użytkowników
</a>

{{-- <div class="sb-sidenav-menu-heading">Statystyki</div>
<a class="nav-link" href="#">
    <div class="sb-nav-link-icon"><i class="fas fa-ruler-vertical"></i></div>
    Wyświetl statystyki
</a> --}}

<div class="sb-sidenav-menu-heading">Kontakt</div>
<a class="nav-link"  href="{{ route('admin.contactData') }}">
    <div class="sb-nav-link-icon"><i class="far fa-address-card"></i></div>
    Dane kontaktowe
</a>

<div class="sb-sidenav-menu-heading">Powrót</div>
<a class="nav-link" href="{{ route('mainpage') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-door-closed"></i></div>
    Wyjście z panelu
</a>


