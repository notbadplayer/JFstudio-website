@extends('admin.main')

@section('content')

<div class="card mb-3">
    <div class="card-header"><i class="fas fa-table me-2"></i>Artykuły</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Tytuł</th>
                    <th>podstrona</th>
                    <th>Opublikowany</th>
                    <th>Widoczny od:</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles ?? [] as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->subsite->name }}</td>
                        <td>
                            @if($article->published)
                                <i class="fas fa-check-circle"></i>
                            @else
                                <i class="fas fa-window-close"></i>
                            @endif
                        </td>
                        <td>{{ $article->publishDate }}</td>
                        <td>
                            <a href="{{ route('admin.addOrEditArticleForm',
                            ['subsiteId' => $article->id]
                                )}}" class="black">
                                <i class="fas fa-edit"></i>
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
