<div class="container mb-4">
    <div class="row">

        <div class="col-12">
            @if($user)
            <h2>Edit User<i class="fa-solid fa-user"></i></h2>
            @else
            <h2>Add User <i class="fa-solid fa-user"></i></h2>
            @endif
        </div>

        <div class="col-12">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

        </div>

        <div class="col-12">
            <button class="btn btn-sm btn-dark" wire:click="newUser"><i class="fa-solid fa-plus"></i> NewUser</button>
        </div>

        <form wire:submit.prevent="createUser">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" wire:model="name" class="form-control" id="name">
                @error('name') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" wire:model="email" class="form-control" id="email">
                @error('email') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" wire:model="password" class="form-control" id="password">
                @error('password') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-dark mt-2">Save</button>
        </form>
    </div>
</div>