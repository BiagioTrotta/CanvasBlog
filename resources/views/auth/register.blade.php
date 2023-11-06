<x-main>
    <div class="container">
        <div class="row w-50 m-auto">
            <h1 class="mb-2 text-center h1 mt-4">Register</h1>
            <form method="POST" accept="/register">
                @csrf
                <div class="col-12 form-floating mb-3">
                    <input type="name" class="form-control" name="name" id="name" placeholder="Name">
                    <label for="name">Name</label>
                    @error('name')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    <label for="email">Email</label>
                    @error('email')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 form-floating mb-3">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                    <label for="password_confirmation">Confirm Password</label>
                    @error('password_confirmation')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mt-3 text-center">
                    <button type="submit" class="btn btn-dark fw-bold text-center">Register</button>
                </div>
            </form>
        </div>
    </div>
</x-main>