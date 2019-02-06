{{--
  Template Name: Test Template
--}}
@extends('layouts.form')

@section('content')
    <form method="post">
        @if($names)
            Guys -
            @foreach($names as $name)
                {{ $name }},
            @endforeach
            - top!
        @endif
        <input type="hidden" name="post" value="1">
        <input type="submit" class="btn-second" value="Update">
    </form>
@endsection