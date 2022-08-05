@extends('layouts.app')

@section('css')
<style>
    body {
        background: #a5b5c5;
        background: lightblue !important;
    }

</style>


@endsection
@section('content')
<div class="container">
    <div class="row">
        <form method="post" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @if(count($errors) >0 )
            @foreach($errors->all() as $error)
            <div class='alert alert-warning'>
                {{ $error }}
            </div>
            @endforeach
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control mt-3" id="name" name="name" aria-describedby="name" value="{{ $task->name }}">
            </div>
            <div class="form-group mt-3">
                <label for="priority">Priority</label>
                <input type="number" class="form-control" id="priority" name="priority" placeholder="Priority" value="{{ $task->priority }}">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Edit</button>
        </form>

    </div>
</div>

@endsection

