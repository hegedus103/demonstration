@extends('layouts.app')

@section('content')
@include('sajat.marhaadatok.create_marha')
@endsection

@section('fomenu')
@include('sajat.munkasztalfomenu')
@endsection



@section('hatter')
@include('sajat.marhaadatok.bevitelhatter')
@endsection