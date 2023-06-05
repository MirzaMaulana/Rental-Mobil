@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 card p-4 rounded-4">
                <div class="mx-auto text-center">
                    <img
                        src="{{ asset("logo.png") }}"
                        height="50"
                        class="d-inline-block align-top"
                        alt=""
                    />
                </div>
                <div>
                    @if(session()->has("error"))
                        <div
                            class="alert alert-danger absolute alert-dismissible fade show container"
                            role="alert"
                        >
                            {{ session("error") }}
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close"
                            ></button>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route("login") }}">
                            @csrf

                            <div class="row mb-3">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control @error("email")  is-invalid @enderror py-2"
                                    name="email"
                                    value="{{ old("email") }}"
                                    placeholder="Email Address"
                                    required
                                    autocomplete="email"
                                    autofocus
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
                                    class="form-control @error("password")  is-invalid @enderror py-2"
                                    name="password"
                                    required
                                    placeholder="Password"
                                    autocomplete="current-password"
                                />

                                @error("password")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <div class="">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="remember"
                                            id="remember"
                                            {{ old("remember") ? "checked" : "" }}
                                        />

                                        <label
                                            class="form-check-label"
                                            for="remember"
                                        >
                                            {{ __("Remember Me") }}
                                        </label>
                                    </div>
                                </div>
                                <div class="" style="margin-top: -8px">
                                    @if(Route::has("password.request"))
                                        <a
                                            class="btn btn-link text-decoration-none"
                                            href="{{ route("password.request") }}"
                                        >
                                            {{ __("Forgot Your Password?") }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <button type="submit" class="btn btn-success">
                                    {{ __("Login") }}
                                </button>
                            </div>
                            <hr />
                            <div class="row text-center">
                                <p>
                                    Don't have an account?
                                    <a
                                        href="{{ route("register") }}"
                                        class="fw-bold text-decoration-none text-success"
                                    >
                                        Register Here.
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
