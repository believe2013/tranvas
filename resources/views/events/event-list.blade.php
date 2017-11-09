@extends('html')


@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Будущие события</h1>

            @foreach($upcomingEvents as $upcomingEvent)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-heading">{{$upcomingEvent->title}}</h3>
                        <small>{{$upcomingEvent->address}}</small>
                    </div>
                    <div class="panel-body">
                        {{$upcomingEvent->description}}
                    </div>
                </div>
            @endforeach

        </div>
    </div>


@endsection