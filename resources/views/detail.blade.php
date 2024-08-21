@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card mb-3">
                <img src="{{ $task['image'] ? asset('storage/' . $task['image']) : 'https://picsum.photos/200' }}"
                    width="50" class="card-img-top" alt="Detail Tugas">
                <div class="card-body">
                    <h5 class="card-title">{{ $task['title'] }}</h5>
                    <p class="card-text">{{ $task['description'] }}</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection
