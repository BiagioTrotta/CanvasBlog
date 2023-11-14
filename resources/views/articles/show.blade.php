<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

<div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center mb-4">
                <h2>{{ $article->title }}</h2>
                <p class="text-muted">{{ $article->description }}</p>
                @if($article->image == null)
                <i class="fa-regular fa-image fs-1"></i>
                @else
                <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                @endif
                <p>{{ $article->body }}</p>
                <p><strong>Accepted:</strong> {{ $article->is_accepted ? 'Yes' : 'No' }}</p>
                <a href="{{ route('articles.index') }}" class="btn btn-primary">Back to Articles</a>
            </div>
        </div>
    </div>

</x-main>
