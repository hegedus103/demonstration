@extends('layouts.app')

@section('content')
@include('sajat.madatok_modositasa.marhaadatok_modositasa_create')
@endsection

@section('fomenu')
@include('sajat.munkasztalfomenu')
@endsection

@section('hatter')
@include('sajat.marhaadatok.bevitelhatter')
@endsection