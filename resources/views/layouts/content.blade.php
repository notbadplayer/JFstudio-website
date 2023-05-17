<div class="container-fluid px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-10 col-xl-9">

            @foreach ($articles as $article)
                <!-- Post preview-->
                <div class="post-preview" style="position: relative;
                overflow-x: auto;
                width: 100%;
                max-width: 100%;">

                        <h2 class="post-title">{!! $article->title !!}</h2>
                        <div>{!! $article->content !!}</div>

                    {{-- <p class="post-meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        on September 24, 2022
                    </p> --}}
                </div>
                <!-- Divider-->
                <hr class="my-4" />
            @endforeach


        </div>
    </div>
</div>
