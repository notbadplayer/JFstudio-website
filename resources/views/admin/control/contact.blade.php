@extends('admin.main')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mt-3">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table me-2"></i>Edycja danych kontaktowych
            </div>
            <div class="card-body">

                <form class="m-0" method="post" action="{{ route('admin.contactData') }}" enctype="multipart/form-data">
                    @csrf
                            <div class="form-row">
                                <div class="col-auto">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Tytuł strony:</label>
                                        <input type="text" class="form-control"
                                        name="title" id="title"
                                        value="{{ old('title', $contactData->title ?? '' )}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-auto">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Opis na stronie głównej:</label>
                                        <input type="text" class="form-control"
                                        name="description" id="description"
                                        value="{{ old('description', $contactData->description ?? '' )}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-auto">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Obrazek:</label>
                                        <input type="file" class="form-control"
                                        name="header_image" id="header_image">
                                        @if(!is_null($contactData->header_image))
                                            <small>
                                                Obecnie wybrany plik: <a href="{{ asset('files/headers/'.$contactData->header_image)}}">{{ $contactData->header_image }}</a>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-auto">
                                    <div class="mb-3">
                                        <label for="adress" class="form-label">Adres:</label>
                                        <input type="text" class="form-control"
                                        name="adress" id="adress"
                                        value="{{ old('adress', $contactData->adress ?? '' )}}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-auto">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-mail:</label>
                                        <input type="text" class="form-control"
                                        name="email" id="email"
                                        value="{{ old('email', $contactData->email ?? '' )}}">
                                        </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-auto">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Telefon:</label>
                                        <input type="text" class="form-control"
                                        name="phone" id="phone"
                                        value="{{ old('phone', $contactData->phone ?? '' )}}">
                                        </div>
                                </div>
                            </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Zapisz zmiany</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
