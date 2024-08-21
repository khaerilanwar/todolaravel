@extends('layouts.main')

@section('content')
    <h1 class="text-center my-3">Daftar To Do List</h1>
    <div class="row mt-5">
        @foreach ($tasks as $task)
            <div class="col-md-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task['title'] }} </h5>
                        <p class="card-text">{{ $task['description'] }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
