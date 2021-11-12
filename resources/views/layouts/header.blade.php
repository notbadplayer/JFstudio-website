<!-- Masthead-->
<header class="masthead mb-5">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase">{{ $contactData->title ?? '' }}</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">{{ $contactData->description ?? '' }}</h2>
                <a class="btn btn-primary" href="#about">Przejdź do informacji</a>
            </div>
        </div>
    </div>
</header>
