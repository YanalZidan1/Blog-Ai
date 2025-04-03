<x-layout>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Get started</h1>
                            <p class="lead">
                                Start creating the best possible user experience for you customers.
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">

                                    <form method="POST" action="{{route('register')}}">
                                        @csrf

                                        {{--Name --}}
                                        <div class="mb-3">
                                            <label class="form-label">Full name</label>
                                            <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name"
                                                placeholder="Enter your name" value="{{ old('name') }}" required />
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Email --}}
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email"
                                                placeholder="Enter your email" value="{{ old('email') }}"  required/>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Password --}}
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password"
                                                placeholder="Enter password" required />
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Confirm Password --}}
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation"
                                                placeholder="Confirm Password"  required/>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Button --}}
                                        <div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Sign up</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        {{-- Button --}}
                        <div class="text-center mb-3">
                            Already have account? <a href="{{ route('login') }}">Log In</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
