@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-5 card p-4 rounded-4">
                <div class="mx-auto text-center">
                    <img
                        src="{{ asset("logo.png") }}"
                        height="50"
                        class="d-inline-block align-top"
                        alt=""
                    />
                </div>
                <p class="text-center fw-semibold">
                    Register and let's get started
                </p>
                <div>
                    <div class="card-body">
                        <form method="POST" action="{{ route("register") }}">
                            @csrf

                            <div class="row mb-3">
                                <input
                                    id="name"
                                    type="text"
                                    class="py-2 form-control @error("name")  is-invalid @enderror"
                                    name="name"
                                    value="{{ old("name") }}"
                                    placeholder="Name"
                                    required
                                    autocomplete="name"
                                    autofocus
                                />

                                @error("name")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <input
                                    id="email"
                                    type="email"
                                    class="py-2 form-control @error("email")  is-invalid @enderror"
                                    name="email"
                                    value="{{ old("email") }}"
                                    placeholder="Email Address"
                                    required
                                    autocomplete="email"
                                />

                                @error("email")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <input
                                    id="password"
                                    type="password"
                                    class="py-2 form-control @error("password")  is-invalid @enderror"
                                    name="password"
                                    required
                                    placeholder="Password"
                                    autocomplete="new-password"
                                />

                                @error("password")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <input
                                    id="password-confirm"
                                    placeholder="Confirm Password"
                                    type="password"
                                    class="py-2 form-control"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                />
                            </div>

                            <div class="row mb-0">
                                <button type="submit" class="btn btn-success">
                                    {{ __("Register") }}
                                </button>
                            </div>
                            <hr />
                            <div class="row text-center">
                                <p>
                                    Already register?
                                    <a
                                        href="{{ route("login") }}"
                                        class="fw-bold text-decoration-none text-success"
                                    >
                                        Login
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
