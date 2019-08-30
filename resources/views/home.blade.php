@extends('layouts.app')

@section('fomenu')
@include('sajat.munkasztalfomenu')
@endsection


@section('content')
@include('sajat.menu_marha.menu_marha')
@endsection

@section('hatter')
@include('sajat.asztalhatter')
@endsection
