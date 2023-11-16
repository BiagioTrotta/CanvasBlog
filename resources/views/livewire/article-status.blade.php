<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Authors</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->description }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td style="width: 10rem;">
                    @if($article->is_accepted)
                       <div class="text-success fw-bold">Accepted</div>
                    @elseif($article->is_accepted === null)
                       <div class="text-warning fw-bold">Under Review</div>
                    @else
                       <div class="text-danger fw-bold">Not Accepted</div>
                    @endif
                    </td>
                    <td>
                        <!-- Bottone per Accettare l'articolo -->
                        <button class="bg bg-success text-light" wire:click="toggleStatus({{ $article->id }}, true)">
                            Accept
                        </button>

                        <!-- Bottone per Revisionare l'articolo -->
                        <button class="bg bg-warning text-light" wire:click="toggleStatus({{ $article->id }}, null)">
                            Revision
                        </button>
                        
                        <!-- Bottone per Rifiutare l'articolo -->
                        <button class="bg bg-danger text-light" wire:click="toggleStatus({{ $article->id }}, false)">
                            Reject
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
