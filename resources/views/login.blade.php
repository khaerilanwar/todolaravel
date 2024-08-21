@extends('layouts.main')

@section('content')
    @error('login')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror

    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="my-4 text-center">Login Broo</h1>
            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email')
                        is-invalid
                    @enderror"
                        id="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" name="password"
                        class="form-control @error('password')
                        is-invalid
                    @enderror"
                        id="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
@endsection
