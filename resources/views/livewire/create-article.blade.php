<div class="container mb-4">
    <div class="row">

        <div class="col-12">
            @if($article)
                <h2>Edit Article <i class="fa-solid fa-pen-to-square"></i></h2>
            @else
                <h2>Add Article <i class="fa-solid fa-pen-to-square"></i></h2>
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
            <button class="btn btn-sm btn-dark" wire:click="newArticle"><i class="fa-solid fa-plus"></i> New Article</button>
        </div>

        <form wire:submit.prevent="createArticle">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" wire:model="title" class="form-control" id="title">
                @error('title') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" wire:model="description" class="form-control" id="description">
                @error('description') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="text" wire:model="image" class="form-control" id="image">
                @error('image') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea wire:model="body" class="form-control" id="body"></textarea>
                @error('body') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-dark fw-bold mt-2">Save</button>
        </form>
    </div>
</div>
