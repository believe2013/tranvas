@extends('html')


@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>
                Будущие события
                <a href="{{route('event-add')}}" class="btn btn-success">Добавить событие</a>
            </h1>

            @foreach($upcomingEvents as $upcomingEvent)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-heading">
                            <a href="{{route('event-view', $upcomingEvent->slug)}}">{{$upcomingEvent->title}}</a>
                        </h3>
                        <small class="padding-left-10">{{$upcomingEvent->address}}</small>
                    </div>
                    <div class="panel-body">
                        <div class="meta-data margin-bottom-20">
                            <strong>Дата начала:</strong> {{$upcomingEvent->start_date}}
                            <br>
                            <strong>Дата окончания:</strong> {{$upcomingEvent->end_date}}
                            <br>
                            <strong>Создатель:</strong> {{$upcomingEvent->user->name}}
                        </div>
                        <div class="description">
                            {!! \Illuminate\Support\Str::words($upcomingEvent->description, 50, ' ...') !!}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Прошедшие события</h1>
            @if(count($pastEvents))
                @foreach($pastEvents as $pastEvent)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-heading">
                                <a href="{{route('event-view', $pastEvent->slug)}}">{{$pastEvent->title}}</a>
                            </h3>
                            <small class="padding-left-10">{{$pastEvent->address}}</small>
                        </div>
                        <div class="panel-body">
                            <div class="meta-data margin-bottom-20">
                                <strong>Дата начала:</strong> {{$pastEvent->start_date}}
                                <br>
                                <strong>Дата окончания:</strong> {{$pastEvent->end_date}}
                                <br>
                                <strong>Создатель:</strong> {{$pastEvent->user->name}}
                            </div>
                            <div class="description">
                                {!! $pastEvent->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h3>Прошедших событий нет</h3>
            @endif
        </div>
    </div>


@endsection