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
                    <th class="d-none d-sm-table-cell">Opublikowany</th>
                    <th class="d-none d-sm-table-cell">Widoczny od:</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($articles ?? [] as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->subsite->name }}</td>
                        <td class="d-none d-sm-table-cell">
                            @if($article->published)
                                <i class="fas fa-check-circle green"></i>
                            @else
                                <i class="fas fa-window-close red"></i>
                            @endif
                        </td>
                        <td class="d-none d-sm-table-cell">{{ $article->publishDate }}</td>
                        <td>
                            <a href="{{ route('admin.addOrEditArticleForm',
                            ['articleId' => $article->id]
                                )}}" class="black">
                                <i class="fas fa-edit"></i><span class="d-none d-md-inline ms-1">Edytuj<span>
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
