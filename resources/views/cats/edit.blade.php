@extends('layouts.master')

@section('header')
    <h2>Edit a cat</h2>
@endsection

@section('content')
    {!! Form::model($cat, ['url' => '/cats/' . $cat->id, 'method' => 'PUT']) !!}
    @include('partials.form.cat')
    {!! Form::close() !!}
@endsection