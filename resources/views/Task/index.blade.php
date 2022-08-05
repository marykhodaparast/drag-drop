@extends('layouts.app')

@section('css')

<style>
    body {
        background: #a5b5c5;
        background: lightblue !important;
    }

    .border-delete {
        border-top-left-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
    }

    .box {
        border-radius: 4px;
        background: #fff;
        width: 200px;
        height: 200px;

    }

</style>
@endsection
@section('content')

<div class="container">
    <div class="row">
        @foreach($tasks as $task)
        <div class="col-12 mt-3 d-flex justify-content-center">
            <div class="box text-center">
                <p>#{{ $task->priority }}</p>
                <p class="pt-4">{{ $task->name }}</p>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a type="button" class="btn btn-warning" href="{{ route('tasks.edit', $task->id)}}">Edit</a>
                    <form method="POST" action="{{route('tasks.destroy', $task->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger border-delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection
