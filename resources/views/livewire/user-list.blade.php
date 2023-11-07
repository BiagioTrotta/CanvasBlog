<div>
    <h2>List Users <i class="fa-solid fa-users"></i></h2>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class=" table-group-divider">
                @foreach ($utenti as $user)
                <tr>
                    <td><i class="fa-solid fa-user"></i> {{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button class="btn btn-sm btn-dark fa" wire:click="editUser({{$user->id}})"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-sm btn-danger fa" wire:click="deleteUser({{$user->id}})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $utenti->links() }}
</div>