{{--
Template Name: Team
--}}

@extends('layouts.app')

@section('content')

    @while (have_posts()) @php(the_post())
        {{-- @include('partials.page-header') --}}
        {{-- @include('partials.content-page') --}}
    @endwhile

    @include('partials.team')

    <br>
    <br>
@endsection
