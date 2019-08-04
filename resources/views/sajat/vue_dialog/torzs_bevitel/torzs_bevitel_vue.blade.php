@extends('layouts.app')


@section('content')
@include('sajat.marhaadatok_display.menu_marha_hatter')

  <div id="app">
<flash message=""></flash>
            <marhatorzsbevitelitem route="{{route('marha_display')}}" home="{{route('home')}}"></marhatorzsbevitelitem>
        </div>
@endsection

@section('fomenu')
@include('sajat.munkasztalfomenu')
@endsection

@section('hatter')
@include('sajat.menu_marha.menu_marha')
@endsection
