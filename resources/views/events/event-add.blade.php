@extends('html')


@section('content')

    <form action="{{route('event-save')}}" method="post" id="location-form">
        <div class="row">
            <div class="col-sm-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-heading">Добавление нового события</h4>
                    </div>

                    <div class="panel-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Название события</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Введите название">
                            <span class="error">{{$errors->first('title')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Введите адрес">
                            <span class="error">{{$errors->first('address')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Дата начала</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Выберите дату">
                            <span class="error">{{$errors->first('start_date')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Дата окончания</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Выберите дату">
                            <span class="error">{{$errors->first('end_date')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea type="text" name="description" id="description" class="form-control" placeholder="Введите название"></textarea>
                            <span class="error">{{$errors->first('description')}}</span>
                        </div>
                        <button class="btn btn-primary">
                            <i class="fa fa-save"></i> Добавить
                        </button>
                    </div>
                </div>

            </div>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-heading">Отметить нахождение</h4>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <span class="error">{{$errors->first('lat')}}</span>
                            <span class="error">{{$errors->first('long')}}</span>
                            <event-location></event-location>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


@section('footer-script')
    <script>

    </script>
@endsection


@section('header-styles')
    <style>

    </style>
@endsection