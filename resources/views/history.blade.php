@extends('layouts.main')

@section('content')
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <h1 class="text-center my-4">Daftar Tugas yang Sudah dikerjakan</h1>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Deadline</th>
                <th scope="col">Tanggal Selesai</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($histories as $history)
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $history['title'] }}</td>
                    <td>{{ Str::limit($history['description'], 40, '...') }}</td>
                    <td>{{ Carbon::parse($history['deadline'])->translatedFormat('H:i, d F Y') }}</td>
                    <td>{{ Carbon::parse($history['updated_at'])->translatedFormat('H:i, d F Y') }}</td>
                    <td>
                        <span class="btn {{ $history['status'] ? 'btn-success' : 'btn-danger' }}">
                            {{ $history['status'] ? 'Sudah dikerjakan' : 'Belum dikerjakan' }}
                        </span>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection
