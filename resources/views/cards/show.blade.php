@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{$card->title}}</h2>

            <ul class="list-group">
                @foreach($card->notes as $note)
                    <li class="list-group-item">
                        {{ $note->body }}

                        @if($note->user->id==Auth::id())
                            <a style="color: red;padding: 5px"  class="glyphicon glyphicon-remove pull-right" href="/notes/{{$note->id}}/delete"></a>
                            <a style="padding: 5px" class="glyphicon glyphicon-edit pull-right" href="/notes/{{$note->id}}/edit"></a>
                        @endif
                        <a style="padding: 2px 5px" class="pull-right" href="#">{{$note->user->name}}</a>
                    </li>
                @endforeach
            </ul>

            <hr>

            <h2>Add new note</h2>

            <form method="post" action="/cards/{{$card->id}}/notes">

                {{ csrf_field() }}

                <div class="form-group">
                    <textarea name="body" class="form-control" required>{{ old('body') }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add note</button>
                </div>

            </form>

            @if(count($errors))
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item-danger">{{$error}}</li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
@endsection
