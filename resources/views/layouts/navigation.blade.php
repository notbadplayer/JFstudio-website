<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">{{ $contactData->title ?? '' }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                @foreach ($subsites as $subsite)
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="@if($subsite['id'] == 1) / @else {{route('subsite', $subsite['id'])}} @endif">{{ $subsite['name'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>



