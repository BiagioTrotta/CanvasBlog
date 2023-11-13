<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mt-4">
        <div class="row">
            @forelse($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->description }}</p>
                            <a href="{{route('articles.show', $article)}}" class="btn btn-primary">Leggi di più</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>Nessun articolo disponibile al momento.</p>
                </div>
            @endforelse
        </div>
    </div>

</x-main>
