@extends('html')


@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-push-2">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-heading">{{$event->title}}</h3>
                </div>
                <div class="panel-body">
                    <div class="description">
                        <p><strong>Описание:</strong></p>
                        {{$event->description}}
                    </div>
                </div>

                {{--<div id="map"></div>--}}
                <gmap-map
                        :center="{{ json_encode([ 'lat' => $event->lat, 'lng' => $event->long ]) }}"
                        :zoom="6"
                        style="width: 100%; height: 300px">
                    <gmap-marker
                            :position="{{ json_encode([ 'lat' => $event->lat, 'lng' => $event->long ]) }}"
                            :clickable="true"
                            :draggable="false"
                            @click="center={{ json_encode([ 'lat' => $event->lat, 'lng' => $event->long ]) }}"
                    ></gmap-marker>
                </gmap-map>

                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <td><strong>Дата начала:</strong></td>
                            <td>{{$event->start_date}}</td>
                        </tr>
                        <tr>
                            <td><strong>Дата окончания:</strong></td>
                            <td>{{$event->end_date}}</td>
                        </tr>
                        <tr>
                            <td><strong>Адрес:</strong></td>
                            <td>{{$event->address}}</td>
                        </tr>
                        <tr>
                            <td><strong>Создатель:</strong></td>
                            <td>{{$event->user->name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection


@section('footer-script')
    <script>

    </script>
@endsection


@section('header-styles')
    <style>
        /*#map {
            height: 400px;
            width: 100%;
        }*/
    </style>
@endsection