{{--
  Template Name: React
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
    <div id="react"></div>
    <div id="schedule"></div>
  @endwhile
@endsection
