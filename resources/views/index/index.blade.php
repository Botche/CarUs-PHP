@extends('layouts.app')

@section('content')
    <div class="inner">
        <div class="content">
            <header class="text-center m-4">
                <h1>{{$title}}</h1>
            </header>
            {!! $text !!}
        </div>
    </div>
@endsection