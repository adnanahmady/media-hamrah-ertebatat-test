@extends('layouts.app')

@section('title', 'Corrency')

@section('content')
    <convert-app></convert-app>
    <currency-list :data="{{ json_encode($data) }}"></currency-list>
@endsection
