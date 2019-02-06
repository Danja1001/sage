{{--
Template Name: Danja
--}}
@php is_page_template('templates.page-product') @endphp
@extends('layouts.app')

@section('content')
    @while(have_posts()) @php the_post() @endphp
    {{--@include('partials.page-header')--}}
    {{--@include('product.tabs')--}}

    <pre style="margin-top:500px"><?php print_r($main_block);?></pre>
    @endwhile
@endsection

