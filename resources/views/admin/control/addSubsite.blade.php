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
            <div class="card-header"><i class="fas fa-table me-2"></i>{{ $subsiteData->name ? 'Edycja podstrony' : 'Dodawanie nowej podstrony'}}</div>
            <div class="card-body">

                <form class="m-0" method="post" action="{{ route('admin.addSubsite') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-auto">
                            <div class="mb-3">
                                <label for="addSubsiteName" class="form-label">Nazwa podstrony: </label>
                                <input type="text" class="form-control @error('subsiteName')validation-error @enderror"
                                name="subsiteName" id="addSubsiteName" aria-describedby="subsiteName"
                                value="{{ $subsiteData->name ?? '' }}">
                                <div id="subsiteName" class="form-text">Podaj nazwę nowej podstrony.</div>
                              </div>
                        </div>

                    <div class="form-row mb-4">
                        <label for="subsiteVisible" class="form-label">Widoczność strony:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="subsiteVisibility"
                            id="subsiteVisible" value=1 {{ $subsiteData->visible == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="subsiteVisible">
                              Widoczna
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="subsiteVisibility"
                            id="subsiteInisible" value=0 {{ $subsiteData->visible == false ? 'checked' : '' }}>
                            <label class="form-check-label" for="subsiteInisible">
                              Ukryta
                            </label>
                          </div>
                    </div>

                    <div class="form-row mb-5">
                        <label for="subsiteOrder" class="form-label">Kolejność wyświetlania:</label>
                        <select class="form-select form-select-md mb-1" id="subsiteOrder" name="subsiteOrder" aria-describedby="subsiteOrder">

                            @for($i = 1; $i <= $orderList; $i++)
                                <option value="{{ $i }}"
                                    @if($subsiteData->order)
                                        @if($i == $subsiteData->order)
                                        selected
                                        @endif
                                    @else
                                        @if($i == $orderList)
                                       selected
                                       @endif
                                  @endif>{{ $i }}</option>
                            @endfor
                        </select>
                        <div id="subsiteOrder" class="form-text">Ustal w jakiej kolejności strona ma być widoczna.</div>
                    </div>


                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">{{ $subsiteData->name ? 'Zatwierdź zmiany' : 'Dodaj podstronę'}}</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
