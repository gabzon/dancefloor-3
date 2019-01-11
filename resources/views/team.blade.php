{{--
Template Name: Team
--}}

@extends('layouts.app')

@section('content')

    @while (have_posts()) @php(the_post())
        {{-- @include('partials.page-header') --}}
        {{-- @include('partials.content-page') --}}
    @endwhile

    @include('profile.team')

    <br>
    <br>
@endsection
