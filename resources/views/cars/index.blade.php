@extends('layouts.app')

@section('title', 'Cars Search')

@section('content')
<div class="inner">
    @if (count($results) === 0)
    <p class="display-4 text-center">Sorry, no results were found...</p>
    @endif
    
    <div class="col-m text-center mx-auto mt-4">
        <form action="/cars" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Search for cars, manufactures or models">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-secondary rounded-right">Search</button>
                </span>
            </div>
        </form>
    </div>
    <div class="cars-count mt-3">Cars ({{count($results)}})</div>
    <div class="container d-flex flex-wrap">
        @foreach ($results as $car)
        <div class="col-lg-4 col-md-6 mb-4 mt-4">
            <div class="card h-100">
                <a href="/car/{{$car->id}}"><img class="card-img-top" src={{$car->image}} alt="This is car {{$car->name}}"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="/car/{{$car->id}}">Name: {{$car->name}}</a>
                    </h4>
                    <p class="card-text">Manufacturer: {{$car->manufacturerName}}</p>
                    <p class="card-text">Model: {{$car->modelName}}</p>
                </div>
                <div class="card-footer">
                    <a href="/car/{{$car->id}}">Visit car</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection