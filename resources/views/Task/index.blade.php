@extends('layouts.app')

@section('css')

<style>
    body {
        background: #a5b5c5;
        background: lightblue !important;
    }

    .box {
        background: #fff;
        border-radius: 4px;
        padding-bottom: 50%;
    }

    .col-lg-2,
    .col-md-3,
    .col-xs-6 {
        margin-top: 30px !important;
    }

    .pt-50 {
        padding-top: 40% !important;
    }
    .border-delete{
        border-top-left-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
    }

</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach($tasks as $task)
        <div class="col-lg-2 col-md-3 col-xs-6 text-center">
            <div class="box">
                <p>#{{ $task->priority }}</p>
                <p class="pt-50">{{ $task->name }}</p>
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
