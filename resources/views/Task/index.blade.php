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
        padding-bottom: 100%;
    }

    .col-lg-2,
    .col-md-3,
    .col-xs-6 {
        margin-top: 30px !important;
    }

</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach($tasks as $task)
        <div class="col-lg-2 col-md-3 col-xs-6 text-center">
            <div class="box">
                <p>{{ $task->name }}</p>
            </div>

        </div>

        @endforeach
        
    </div>
</div>



@endsection
