@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <h1 class="panel-heading">All cards</h1>
                    <div class="panel-body">
                        <ul class="list-group">
                        @foreach($cards as $card)
                            <li class="list-group-item">
                                <a href= {{ "cards/".$card->id }}>{{  $card->title  }}</a>
                                <a style="color: red;padding: 5px"  class="glyphicon glyphicon-remove pull-right" href="/cards/{{$card->id}}/delete"></a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>

               {{--@if(Auth::user()->isAdmin())--}}
                <h2>Add new card</h2>
                <form method="post" action="/cards/add">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="title" class="form-control" required>{{ old('body') }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add card</button>
                    </div>
                </form>
                {{--@endif--}}

            </div>
        </div>
    </div>
@endsection