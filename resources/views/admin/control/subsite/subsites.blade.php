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
                    <th>Widoczna</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($subsites ?? [] as $subsite)
                    <tr>
                        <td>{{ $subsite->order }}</td>
                        <td>{{ $subsite->name }}</td>
                        <td>
                            @if($subsite->visible)
                                <i class="fas fa-check-circle green"></i>
                            @else
                                <i class="fas fa-window-close red"></i>
                            @endif
                        </td>
                        <td>
                            @if($subsite->editable)
                            <a href="{{ route('admin.addOrEditSubsiteForm',
                            ['subsiteId' => $subsite->id]
                                )}}" class="black">
                                <i class="fas fa-edit"></i><span class="d-none d-sm-inline ms-1">Edytuj<span>
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<a href="{{ route('admin.addOrEditSubsiteForm') }}" class="btn btn-primary mb-1">Dodaj podstronę</a>

@endsection
