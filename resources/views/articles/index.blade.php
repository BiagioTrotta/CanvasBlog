<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mt-4">
        <div class="row">
            @forelse($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if($article->image == null)
                        <div style="height: 270px;" class="d-flex align-items-center justify-content-center">
                             <i class="fa-regular fa-image fs-1"></i>
                        </div>
                        @else
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->description }}</p>
                            <a href="{{route('articles.show', $article)}}" class="btn btn-primary">Leggi di più</a>
                        </div>
                        <div class="card-footer">
                            <p class="card-text">Author: {{ $article->user->name }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No articles available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>

</x-main>
