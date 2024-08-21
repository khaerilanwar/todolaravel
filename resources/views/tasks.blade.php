@extends('layouts.main')

@section('content')
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <h1 class="text-center my-3">Daftar Tugas Yang Harus Dikerjakan!</h1>

    <a href="/tasks/tambah" class="btn btn-primary">Tambah Tugas</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Deadline</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $task['title'] }}</td>
                    <td>{{ Str::limit($task['description'], 40, '...') }}</td>
                    <td>{{ Carbon::parse($task['deadline'])->translatedFormat('H:i, d F Y') }}</td>
                    <td class="d-flex gap-2">
                        <a href="/tasks/{{ $task['id'] }}" class="btn btn-primary">Detail</a>
                        <a href="/tasks/update/{{ $task['id'] }}" class="btn btn-warning">Update</a>
                        <form action="/tasks/{{ $task['id'] }}" method="post">
                            @method('patch')
                            @csrf
                            <button type="submit" class="btn btn-info">Selesai?</button>
                        </form>
                        <form action="/tasks/{{ $task['id'] }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection
