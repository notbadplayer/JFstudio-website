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
                <i class="fas fa-table me-2"></i>{{ $articleData->name ? 'Edycja wpisu' : 'Dodawanie nowego wpisu'}}
                    @if($articleData->id)
                    <span class="float-end">
                        <form class="m-0" method="post" action="{{ route('admin.deleteSubsite') }}" onsubmit='return confirm("Czy na pewno chcesz usunąć?")'>
                            @csrf
                            <input type="hidden" name="subsiteId" value="{{ $articleData->id }}">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> <span class="d-none d-sm-inline">Usuń podstronę<span></button>
                        </form>
                    </span>
                    @endif
            </div>
            <div class="card-body">

                <form class="m-0" method="post" action="{{ route('admin.saveSubsite') }}">
                    @csrf
                    <input type="hidden" name="subsiteId" value="{{ $articleData->id ? $articleData->id : 'add'}}">

                    <div class="form-row">
                        <div class="col-auto">
                            <div class="mb-3">
                                <label for="articleTitle" class="form-label">Tytuł wpisu: </label>
                                <input type="text" class="form-control @error('articleTitle')validation-error @enderror"
                                name="articleTitle" id="articleTitle" aria-describedby="articleTitle"
                                value="{{ old('subsiteName', $articleData->name ?? '' )}}">
                                <div id="articleTitle" class="form-text">Podaj tytuł wpisu.</div>
                              </div>
                        </div>

                        <div class="col-auto">
                            <div class="mb-3">
                                <label for="articleContent" class="form-label">Treść: </label>
                                <textarea rows="10" class="form-control @error('articleContent')validation-error @enderror"
                                name="articleContent" id="articleContent"
                                value="{{ old('subsiteName', $articleData->name ?? '' )}}"></textarea>
                              </div>
                        </div>


                        <div class="row mb-3">

                            <div class="col-12 col-sm-6 col-md-4 mb-2">
                                <label for="subsiteVisible" class="form-label">Opublikowany:</label>
                                    <div>
                                        <input class="form-check-input" type="radio" name="subsiteVisibility"
                                        id="subsiteVisible" value=1 {{ $articleData->visible == true ? 'checked' : '' }}>

                                        <label class="form-check-label me-3" for="subsiteVisible">Tak</label>

                                        <input class="form-check-input" type="radio" name="subsiteVisibility"
                                        id="subsiteInisible" value=0 {{ $articleData->visible == false ? 'checked' : '' }}>

                                        <label class="form-check-label" for="subsiteInisible">Nie</label>

                                    </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mb-2">
                                        <label for="articleDateFrom" class="form-label">Data publikacji od: </label>
                                        <input type="date" class="form-control @error('articleDateFrom')validation-error @enderror"
                                        name="articleDateFrom" id="articleDateFrom" aria-describedby="articleDateFrom"
                                        value="{{ $data }}">
                                        <div id="articleDateFrom" class="form-text">Od kiedy wpis ma być widoczny?</div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 mb-2">
                                        <label for="articleSubsite" class="form-label">Przypisanie do sekcji: </label>
                                        <select class="form-select form-select-md mb-1" id="articleSubsite" name="articleSubsite" aria-describedby="articleSubsite">
                                            @foreach($subsites as $subsite)
                                            <option value="{{ $subsite->name }}">{{ $subsite->name }} </option>
                                            @endforeach
                                        </select>
                                        <div id="articleSubsite" class="form-text">Przypisz wpis do podstrony</div>

                            </div>

                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">{{ $articleData->name ? 'Zatwierdź zmiany' : 'Dodaj wpis'}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
