<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-5">
                <livewire:create-article />
            </div>
            <div class="col-lg-7">
                <livewire:article-list />
            </div>
        </div>
    </div>
</x-main>