@extends('layouts.app')

@section('content')
@include('sajat.marhaadatok_display.menu_marha_hatter')
@include('sajat.marhaadatok_display.create_marha_display')


@endsection

@section('fomenu')
@include('sajat.munkasztalfomenu')
@endsection



@section('hatter')
@include('sajat.menu_marha.menu_marha')
@endsection