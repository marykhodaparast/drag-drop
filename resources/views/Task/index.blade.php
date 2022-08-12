@extends('layouts.app')

@section('css')

<style>
    body {
        margin: 0px;
        font-family: Calibri, "Lucida Grande", sans-serif;
        background-color: #eee;
    }

    h1 {
        margin: 0px auto;
        max-width: 570px;
        padding: 10px 10px 10px 20px;
        text-shadow: 1px 1px 0px #bbe;
        font-size: 18pt;
    }

    h2 {
        margin: 0px 0px 15px 0px;
        font-size: 16pt;
    }

    li {
        font-size: 14pt;
    }

    p {
        margin: 0px 0px 20px 0px;
        font-size: 14pt;
    }

    .source {
        width: 360px;
        height: 60px;
        margin: auto;
    }

    .source div {
        cursor: pointer;
    }

    div.whileDragging {
        background-image: none;
        background-color: black;
        color: white;
    }

    div.not {
        background-image: none;
        background-color: #eef;
        cursor: inherit;
    }

    div.pendingDrop {
        opacity: 0.5;
    }

    .drop {
        width: 360px;
        height: 120px;
        overflow: auto;
        margin: auto;
        margin-top: 25px;
        margin-bottom: 25px;
        background-color: #888;
        border: solid 1px #333;
        box-shadow: 2px 2px 2px #666;
        -webkit-box-shadow: 2px 2px 2px #666;
        text-align: center;
        font-size: 24pt;
        font-weight: bold;
    }

    .highlight {
        background-color: #dd8;
    }

    ul#list {
        padding: 0px;
    }

    ul#list li {
        list-style-type: none;
        padding: 10px;
        background-color: #ffe6f9;
        text-align: center;
        width: 50%;
        font-weight: bold;
        cursor: pointer;
        margin: auto;
    }

</style>
@endsection
@section('content')

<div class="container">
    <ul id="list">
        @foreach($tasks as $task)
        <li class="mt-3" data-id="{{ $task->id }}">
            <p>#{{ $task->priority }}</p>
            <p class="pt-4">{{ $task->name }}</p>
            {{-- <div data-id="{{ $task->id }}" style="/*display:none*/">dd</div> --}}
            {{-- <div class="btn-group" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-warning" href="{{ route('tasks.edit', $task->id)}}">Edit</a>
            <form method="POST" action="{{route('tasks.destroy', $task->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger border-delete">Delete</button>
            </form>
</div> --}}
</li>
{{-- <div class="btn-group" role="group" aria-label="Basic example">
    <a type="button" class="btn btn-warning" href="{{ route('tasks.edit', $task->id)}}">Edit</a>
<form method="POST" action="{{route('tasks.destroy', $task->id) }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger border-delete">Delete</button>
</form>
</div> --}}

@endforeach
</ul>
{{-- <p id="msg"></p> --}}

</div>

@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="{{ asset('js/jquery.drag-drop.plugin.js')}}"></script>
<script>
    var currentOrder = ["A", "B", "C", "D", "E"];

    $(function() {
        var $srcElement;
        var srcIndex, dstIndex;

        $("#list>li").dragdrop({
            makeClone: true
            , sourceHide: true
            , dragClass: "shadow"
            , canDrag: function($src, event) {
                //console.log($src.data('id'));
                $srcElement = $src;
                srcIndex = $srcElement.index();
                dstIndex = srcIndex;
                return $src;
            }
            , canDrop: function($dst) {
                if ($dst.is("li")) {
                    console.log($srcElement.data('id'));
                    $.ajax({
                        type: 'get'
                        , url: "/"
                        , data: {
                            "id": 8,
                        }
                        , success: function(response) {

                        }
                        , error: function(response) {
                            alert(errResponse);
                        }
                    });

                    dstIndex = $dst.index();
                    if (srcIndex < dstIndex)
                        $srcElement.insertAfter($dst);
                    else
                        $srcElement.insertBefore($dst);
                }
                return true;
            }
            , didDrop: function($src, $dst) {
                // Must have empty function in order to NOT move anything.
                // Everything that needs to be done has been done in canDrop.

                if (srcIndex != dstIndex) {
                    var value = currentOrder[srcIndex];
                    currentOrder.splice(srcIndex, 1);
                    currentOrder.splice(dstIndex, 0, value);
                    //$("#msg").text("New order of items:" + currentOrder.join(", "));
                }
            }
        });
    });

</script>

@endsection
