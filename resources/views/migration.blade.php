{{--
  Template Name: Migration Template
--}}
@extends('layouts.form')

@section('content')
    <form method="post">
        <input type="hidden" name="post" value="1">
        <input type="submit" class="btn-second" value="Update">
    </form>
    @endsection