@extends('layouts.app')

@section('title', 'Cars Search')

@section('content')
<div class="inner">
    @if (count($cars) === 0)
    <p class="display-4 text-center">Sorry, no results were found...</p>
    @endif

    <div class="input-group-append row mr-4 pt-4 w-100">
        <form class="w-100" action="/cars" method="GET" style="margin-left: 10px">
            <div class="input-group">
                <input type="search" name="search" placeholder="Search for..." class="form-control">
                <select class="custom-select" name="search_by" id="searchBy">
                    <option value="year" selected>Search by year</option>
                    <option value="model">Search by model</option>
                    <option value="manufacturer">Search by manufacturer</option>
                </select>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
    <div class="cars-count mt-3">Cars ({{count($cars)}})</div>
    <div class="container d-flex flex-wrap">
        @foreach ($cars as $car)
        <div class="col-lg-4 col-md-6 mb-4 mt-4">
            <div class="card h-100">
                <a href="/car/{{$car->id}}"><img class="card-img-top" src={{$car->image}} alt="This is car {{$car->name}}"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="/car/{{$car->id}}">Name: {{$car->name}}</a>
                    </h4>
                    <p class="card-text">Manufacturer: {{$manufacturers->where('id', $car->manufacturer_id)->first()->name}}</p>
                    <p class="card-text">Model: {{$models_cars->where('id', $car->models_car_id)->first()->name}}</p>
                </div>
                <div class="card-footer">
                    <a href="/car/{{$car->id}}">Visit car</a>

                    <p class="float-right">{{$car->created_at}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection