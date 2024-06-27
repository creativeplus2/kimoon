@extends('FrontEnd.main.master-front-end')

@section('title', __('News'))

@section('content')
@foreach ($text['blocks'] as $block)
@include('FrontEnd.main.'.$block['type'], ['text'=> $block['data']] )
@endforeach



@endsection