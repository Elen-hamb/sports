@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(Session::has('status'))
            <div class="alert alert-success">
                {!! Session::get('status') !!}
            </div>
        @endif
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Sports</div>

                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($sports as $sport)
                            <li class="list-group-item">
                                <span class="label label-default label-pill pull-xs-right">{!! count($sport->competitions) !!}</span>
                                <a href="{!! url('sport/'.$sport->id) !!}">{!! $sport->name !!}</a>
                            </li>
                        @endforeach

                    </ul>
            </div>
        </div>
    </div>
</div>
@endsection
