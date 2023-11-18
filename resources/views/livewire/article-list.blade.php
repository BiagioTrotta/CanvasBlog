<div>
    <h2><i class="fa-solid fa-list"></i> List Articles</h2>
    
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($articoli as $article)
                    <tr>
                        <td><i class="fa-solid fa-file"></i> <a href="{{route('articles.show', $article)}}">{{ $article->title }}</a></td>
                        <td>{{$article->category_id ? $article->category->name : 'Not Category'}}</td>
                        <td>{{ $article->created_at->diffForHumans() }}</td>
                        <td>
                            <button class="btn btn-sm btn-dark fa" wire:click="editArticle({{ $article->id }})"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-sm btn-danger fa" wire:click="deleteArticle({{ $article->id }})"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $articoli->links() }}

</div>
