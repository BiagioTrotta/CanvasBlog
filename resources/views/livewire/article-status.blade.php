<div>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->description }}</td>
                    <td>{{ $article->is_accepted ? 'Accepted' : 'Not Accepted' }}</td>
                    <td>
                        <button wire:click="toggleStatus({{ $article->id }})">
                            Toggle Status
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>