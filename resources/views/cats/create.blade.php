@extends('layouts.master')

@section('header')
    <h2>Add new cat</h2>
@endsection

@section('content')
    {!! Form::open(['url' => 'cats']) !!}
    @include('partials.form.cat')
    {!! Form::close() !!}
@endsection