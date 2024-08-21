@extends('layouts.main')

@section('content')
    <h1 class="text-center my-4">Perbarui Tugas</h1>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="/tasks/{{ $task['id'] }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Tugas</label>
                    <input type="text"
                        class="form-control @error('title')
                    is-invalid
                @enderror"
                        id="title" name="title" value="{{ old('title') ? old('title') : $task['title'] }}"
                        aria-describedby="validationTitle" autofocus>
                    @error('title')
                        <div id="validationTitle" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Tugas</label>
                    <textarea class="form-control @error('description')
                    is-invalid
                @enderror"
                        id="description" name="description" rows="3">{{ old('description') ? old('description') : $task['description'] }}</textarea>
                    @error('description')
                        <div id="validationTitle" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Tanggal Deadline</label>
                    <input type="datetime-local"
                        class="form-control @error('deadline')
                is-invalid
                @enderror"
                        name="deadline" value="{{ old('deadline') ? old('deadline') : $task['deadline'] }}" id="title">
                    @error('deadline')
                        <div id="validationTitle" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Tugas</label>
                    <input name="image"
                        class="form-control @error('image')
                    is-invalid
                    @enderror"
                        type="file" accept="image/*" onchange="previewImage(this)" id="gambar">
                    @error('image')
                        <div id="validationTitle" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <img src="{{ $task['image'] ? asset('storage/' . $task['image']) : '' }}" id="imagePreview"
                        width="200" class="rounded mx-auto {{ $task['image'] ? 'd-block' : 'd-none' }}"
                        alt="Preview Gambar">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
