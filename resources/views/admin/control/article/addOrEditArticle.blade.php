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
                <i class="fas fa-table me-2"></i>{{ $articleData->title ? 'Edycja wpisu' : 'Dodawanie nowego wpisu'}}
                    @if($articleData->id)
                    <span class="float-end">
                        <form class="m-0" method="post" action="{{ route('admin.deleteArticle') }}" onsubmit='return confirm("Czy na pewno chcesz usunąć?")'>
                            @csrf
                            <input type="hidden" name="articleId" value="{{ $articleData->id }}">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> <span class="d-none d-sm-inline">Usuń wpis<span></button>
                        </form>
                    </span>
                    @endif
            </div>
            <div class="card-body">

                <form class="m-0" method="post" action="{{ route('admin.saveArticle') }}">
                    @csrf
                    <input type="hidden" name="articleId" value="{{ $articleData->id ? $articleData->id : 'add'}}">

                    <div class="form-row">
                        <div class="col-auto">
                            <div class="mb-3">
                                <label for="articleTitle" class="form-label">Tytuł wpisu: </label>
                                <input type="text" class="form-control @error('articleTitle')validation-error @enderror"
                                name="articleTitle" id="articleTitle" aria-describedby="articleTitle"
                                value="{{ old('articleTitle', $articleData->title ?? '' )}}">
                                <div id="articleTitle" class="form-text">Podaj tytuł wpisu.</div>
                              </div>
                        </div>

                        <div class="col-auto">
                            <div class="mb-3">
                                <label for="articleContent" class="form-label">Treść: </label>
                                <textarea rows="20" class="form-control @error('articleContent')validation-error @enderror"
                                name="articleContent" id="articleContent">{{old('articleContent', $articleData->content ?? '' )}}</textarea>
                              </div>
                        </div>


                        <div class="row mb-3">

                            <div class="col-12 col-sm-6 col-md-4 mb-2">
                                <label for="articleVisible" class="form-label">Opublikowany:</label>
                                    <div>
                                        <input class="form-check-input" type="radio" name="articleVisibility"
                                        id="articleVisible" value=1 {{ $articleData->published == true ? 'checked' : '' }}>

                                        <label class="form-check-label me-3" for="articleVisible">Tak</label>

                                        <input class="form-check-input" type="radio" name="articleVisibility"
                                        id="articleInvisible" value=0 {{ $articleData->published == false ? 'checked' : '' }}>

                                        <label class="form-check-label" for="articleInvisible">Nie</label>

                                    </div>
                            </div>
                            {{-- <div class="col-12 col-sm-6 col-md-4 mb-2">
                                        <label for="articleDateFrom" class="form-label">Zaplanuj publikację: </label>
                                        <input type="date" class="form-control @error('articleDateFrom')validation-error @enderror"
                                        name="articleDateFrom" id="articleDateFrom" aria-describedby="articleDateFrom"
                                        value="{{old('articleDateFrom', $articleData->publishDate ?? $data )}}">
                                        <div id="articleDateFrom" class="form-text">Od kiedy wpis ma być widoczny?</div>
                            </div> --}}

                            <div class="col-12 col-sm-6 col-md-4 mb-2">
                                        <label for="articleSubsite" class="form-label">Przypisanie do sekcji: </label>
                                        <select class="form-select form-select-md mb-1" id="articleSubsite" name="articleSubsite" aria-describedby="articleSubsite">
                                            @foreach($subsites as $subsite)
                                            <option value="{{ $subsite->id }}"
                                                @if($articleData->subsite)
                                                    @if($subsite->name == $articleData->subsite->name)
                                                    selected
                                                    @endif
                                                @endif
                                                >{{ $subsite->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div id="articleSubsite" class="form-text">Przypisz wpis do podstrony</div>
                            </div>

                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">{{ $articleData->title ? 'Zatwierdź zmiany' : 'Dodaj wpis'}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'articleContent', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    </script>


@endsection
