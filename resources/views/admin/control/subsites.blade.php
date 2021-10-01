@extends('admin.main')

@section('content')

<div class="card mb-3">
    <div class="card-header"><i class="fas fa-table me-2"></i>Podstrony</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Lp</th>
                    <th>Nazwa</th>
                    <th>Widoczność</th>
                    <th>Kolejność</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subsites ?? [] as $subsite)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $subsite->name }}</td>
                        <td>
                            @if($subsite->visible)
                                <i class="fas fa-check-circle"></i>
                            @else
                                <i class="fas fa-window-close"></i>
                            @endif
                        </td>
                        <td>{{ $subsite->order }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<a href="{{ route('admin.addSubsite') }}" class="btn btn-primary mb-1">Dodaj podstronę</a>

@endsection
