<x-main>
    <div class="container">
        <div class="row w-50 m-auto">
            <h1 class="mb-2 text-center mt-4">Login</h1>
            <form method="POST" accept="/login">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 my-3 text-center">
                    <a href="{{ route('google-auth') }}" class="text-custom-orange fw-bold">
                        <div class="google-btn">
                            <div class="google-icon-wrapper">
                                <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                            </div>
                            <p class="btn-text"><b>Sign in with google</b></p>
                        </div>
                    </a>
                </div>
                <div class="col-12 mt-3 text-center">
                    <button type="submit" class="btn btn-dark fw-bold text-center">Login</button>
                </div>
            </form>
        </div>
    </div>
</x-main>