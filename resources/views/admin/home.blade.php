@extends('admin.main')
@section('content')

<div class="row mt-3 gy-5">

    <div class="col-12 col-md-5">
        <div class="card border-left-primary shadow-sm py-2 h-100 text-center bg-light mb-3">
            <div class="card-body d-flex justify-content-center">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-cubes fa-2x text-gray-300"></i>
                    </div>
                    <div class="col me-2">
                        <a class="link-secondary text-xs font-weight-bold text-uppercase" href="{{ route('admin.subsites') }}">Ustaw podstrony</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-5">
        <div class="card border-left-primary shadow-sm py-2 h-100 text-center bg-light mb-3">
            <div class="card-body d-flex justify-content-center">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                    <div class="col me-2">
                        <a class="link-secondary text-xs font-weight-bold text-uppercase" href="{{ route('admin.articles') }}">Zarządzaj wpisami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-5">
        <div class="card border-left-primary shadow-sm py-2 h-100 text-center bg-light mb-3">
            <div class="card-body d-flex justify-content-center">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="far fa-file fa-2x text-gray-300"></i>
                    </div>
                    <div class="col me-2">
                        <a class="link-secondary text-xs font-weight-bold text-uppercase" href="{{ route('admin.files') }}">Lista plików</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-5">
        <div class="card border-left-primary shadow-sm py-2 h-100 text-center bg-light mb-3">
            <div class="card-body d-flex justify-content-center">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                    <div class="col me-2">
                        <a class="link-secondary text-xs font-weight-bold text-uppercase" href="{{ route('admin.users') }}">Lista użytkowników</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection


