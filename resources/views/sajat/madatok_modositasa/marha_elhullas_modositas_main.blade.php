@extends('layouts.app')

@section('content')
@include('sajat.madatok_modositasa.marha_elhullas_modositas_create')
@endsection

@section('fomenu')
@include('sajat.munkasztalfomenu')
@endsection

@section('hatter')
@include('sajat.marhaadatok.bevitelhatter')
@endsection