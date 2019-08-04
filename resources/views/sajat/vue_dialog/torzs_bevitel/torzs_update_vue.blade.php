@extends('layouts.app')


@section('content')
@include('sajat.marhaadatok_display.menu_marha_hatter')

  <div id="app">
<flash message=""></flash>
            <marhatorzsupdateitem route="{{route('marha_display')}}" home="{{route('home')}}" id="{{$id}}" getroute="{{route('marha_torzs_edit',$id)}}" getupdate="{{route('marha_torzs_update',$AllatokMarha,$id)}}"></marhatorzsupdateitem>
        </div>
@endsection

@section('fomenu')
@include('sajat.munkasztalfomenu')
@endsection

@section('hatter')
@include('sajat.menu_marha.menu_marha')
@endsection
