@extends('app')

@section('content')

    <h2>
           {{$articles->title}}
    </h2>
    
<article>
    {{$articles->body}}
    
</article>


@stop