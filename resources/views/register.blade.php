@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="my-4 text-center">Registrasi Dulu Brooo</h1>
            <form method="POST" action="/registrasi">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        id="name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation')
                        is-invalid
                    @enderror"
                        id="password_confirmation">
                    @error('password_confirmation')
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
