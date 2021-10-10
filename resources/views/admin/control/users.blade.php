@extends('admin.main')

@section('content')

<div class="card mb-3">
    <div class="card-header"><i class="fas fa-table me-2"></i>Lista użytkowników</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Lp</th>
                    <th>Nazwa</th>
                    <th>e-mail</th>
                    <th>data rejestracji</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($users ?? [] as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.changePassword',
                            ['userId' => $user->id]
                                )}}" class="black">
                                <i class="fas fa-key"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<a href="{{ route('admin.addOrEditArticleForm') }}" class="btn btn-primary mb-1">Dodaj artykuł</a>

@endsection
