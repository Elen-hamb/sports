@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! $sport->name !!} - Competitions</div>

                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($sport->competitions as $competition)
                                <li class="list-group-item">
                                    <span class="label label-default label-pill pull-xs-right">{!! count($competition->games) !!}</span>
                                    <a href="{!! url('competition/'.$competition->id) !!}">{!! $competition->name !!}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
