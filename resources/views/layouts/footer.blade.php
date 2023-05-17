<footer class="border-top">
    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-12">
                <div class="small text-center text-muted fst-italic">{{ $contactData->title ?? '' }}</div>
            </div>
        </div>
        <br />

        <div class="row gx-4 gx-lg-5 text-center">
            <div class="col-md-4">
                <span>
                    <i class="fas fa-map-marked-alt mb-2 align-middle me-2"></i>
                    {{ $contactData->adress ?? '' }}
                </span>
            </div>

            <div class="col-md-4">
                <span>
                    <i class="fas fa-envelope mb-2 align-middle me-2"></i>
                    {{ $contactData->email ?? '' }}
                </span>
            </div>

            <div class="col-md-4">
                <span>
                    <i class="fas fa-mobile-alt mb-2 align-middle me-2"></i>
                    {{ $contactData->phone ?? '' }}
                </span>
            </div>
        </div>



    </div>
    </div>
</footer>
