{{--
Template Name: Home page
--}}
@extends('layouts.fullwidth')

@php( $query = Home::get_wall_posts() )

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="home-content" style="margin-top:-40px;">
      @include('partials.content-page')
    </div>

    <div class="container">
      @if (App::display_news_title() === 'yes')
        <br>
        <hr>
        <h1 class="tc pv2"><?= __('News','sage') ?> <i lang="en">(News)</i></h1>
      @endif
      {{-- <div class="pv3"></div>
      <h1 class="landing-title"><span style="color:#BF2E36">DANCE</span>FLOOR</h1>
      <h2 style="margin:0; letter-spacing:0.1px;" class="tc white ttu bg-black f3">école & Compagnie de danse à Genève</h2>
      <div class="pv4"></div> --}}
      <div class="row pt4" id="landing-grid">
        @if ($query->have_posts())
          @while ($query->have_posts()) @php(($query->the_post()))
            <div class="col-md-4 mb3 tc">
              @php( $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ) )
              <a href="{{ the_permalink() }}">
                <img src="{{ $image[0] }}" class="img-fluid grow"/>
                {{-- <div class="title" style="text-transform:uppercase; margin-left:-15px;" >
                  <span class="pv1 ph2 bg-black">@php(the_title())</span>
                </div> --}}
              </a>
            </div>
          @endwhile
        @else
          @php( _e('There are no post','sage') )
        @endif
        @php( wp_reset_postdata() )
      </div>
    </div>
  @endwhile
  <br>
  <div class="container">
    <hr>
    <h1 class="tc pv2"><?= __('Schedule','sage'); ?> <i class="text-muted i f3" lang="en">(Schedule)</i></h1>
    @include('schedule.classes-per-day')
    <br>
  </div>
@endsection
