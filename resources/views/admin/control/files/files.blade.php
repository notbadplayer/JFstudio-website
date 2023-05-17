@extends('admin.main')

@section('content')

<div class="card mb-3">
    <div class="card-header"><i class="fas fa-table me-2"></i>Lista opublikowanych plików</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Lp</th>
                    <th>Nazwa</th>
                    <th class="d-none d-md-table-cell">Adres do pliku</th>
                    <th class="d-none d-md-table-cell">Rozmiar (KB)</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($files ?? [] as $file)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $file['basename']}}</td>
                        <td class="d-none d-md-table-cell"><a target="_blank" rel="noopener noreferrer" href="{{ asset('files/'.$file['basename']);}}">{{ asset('files/'.$file['basename']);}}</a></td>
                        <td class="d-none d-md-table-cell">{{ $file['size'] ?? '' }}</td>
                        <td>
                            <form class="m-0" method="post" action="{{ route('admin.deleteFile') }}" onsubmit='return confirm("Czy na pewno chcesz usunąć?")'>
                                @csrf
                                <input type="hidden" name="fileName" value="{{ $file['basename'] }}">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> <span class="d-none d-sm-inline">Usuń plik<span></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
