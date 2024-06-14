@extends('FrontEnd.main.master-front-end')

@section('title', __('News'))

@section('content')
@foreach ($text as $block)
@include('FrontEnd.main.'.$block['block'], ['text'=> $block['content']] )
@endforeach


@endsection