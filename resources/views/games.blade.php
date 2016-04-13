@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! $competition->name !!} - Games </div>

                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($competition->games as $game)
                                <li class="list-group-item">
                                    <span class="label label-default label-pill pull-xs-right">{!! $game->start !!}</span>
                                    {!! $game->name !!}
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
