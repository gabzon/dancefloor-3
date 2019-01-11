{{--
Template Name: Video Grid
--}}

@php( $salsa = Video::get_videos('salsa') )
@php( $rueda = Video::get_videos('rueda-de-casino') )
@php( $afro_cubano = Video::get_videos('afro-cubano') )
@php( $rumba = Video::get_videos('rumba') )
@php( $men_styling = Video::get_videos('men-styling') )
@php( $lady_styling = Video::get_videos('lady-styling') )
@php( $bachata = Video::get_videos('bachata') )
@php( $kizomba = Video::get_videos('kizomba') )
@php( $salsa_on1 = Video::get_videos('salsa-on-1') )
@php( $salsa_on2 = Video::get_videos('salsa-on-2') )
@php( $afro_beats = Video::get_videos('afro-beats') )
@php( $dancehall = Video::get_videos('dancehall') )
@php( $urban_salsa = Video::get_videos('urban-salsa') )
@php( $pachanga = Video::get_videos('pachanga') )
@php( $tango = Video::get_videos('tango') )
@php( $mix = Video::get_videos('mix') )

@extends('layouts.app')

@section('content')
  @if ( $salsa->have_posts() )
    <a href="#salsa-videos" class="f5 no-underline dark-red bg-animate hover-bg-dark-red hover-white inline-flex items-center ph3 ma1 pv2 ba border-box">Salsa</a>
  @endif
  @if ( $tango->have_posts() )
    <a href="#tango-videos" class="f5 no-underline dark-red bg-animate hover-bg-dark-red hover-white inline-flex items-center ph3 pv2 ma1 ba border-box">Tango</a>
  @endif
  @if ( $bachata->have_posts() )
    <a href="#bachata-videos" class="f5 no-underline dark-red bg-animate hover-bg-dark-red hover-white inline-flex items-center ph3 pv2 ma1 ba border-box">Bachata</a>
  @endif
  @if ( $rueda->have_posts() )
    <a href="#rueda-videos" class="f5 no-underline dark-red bg-animate hover-bg-dark-red hover-white inline-flex items-center ph3 pv2 ma1 ba border-box">Rueda de Casino</a>
  @endif
  @if ( $mix->have_posts() )
    <a href="#mix-videos" class="f5 no-underline dark-red bg-animate hover-bg-dark-red hover-white inline-flex items-center ph3 pv2 ma1 ba border-box">Mix</a>
  @endif

  {{-- Salsa Cubana --}}
  @if ( $salsa->have_posts() )
    <section id="salsa-videos" class="pt4">
      <h1>Salsa</h1>
      <hr>
      <div class="row">
        @while ( $salsa->have_posts() )
          @php( $salsa->the_post() )
          <div class="col-12 col-xs-6 col-md-4 col-lg-4 mb3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{ get_the_content() }}" allowfullscreen></iframe>
            </div>
          </div>
        @endwhile
      </div>
    </section>
  @endif


  {{-- Tango --}}
  @if ( $tango->have_posts() )
    <section id="tango-videos" class="pt5">
      <h1>Tango</h1>
      <hr>
      <div class="row">
        @while ( $tango->have_posts() )
          @php( $tango->the_post() )
          <div class="col-12 col-xs-6 col-md-4 col-lg-4 mb3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{ get_the_content() }}" allowfullscreen></iframe>
            </div>
          </div>
        @endwhile
      </div>
    </section>
  @endif

  {{-- Bachata --}}
  @if ( $bachata->have_posts() )
    <section id="bachata-videos" class="pt5">
      <h1>Bachata</h1>
      <hr>
      <div class="row">
        @while ( $bachata->have_posts() )
          @php( $bachata->the_post() )
          <div class="col-12 col-xs-6 col-md-4 col-lg-4 mb3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{ get_the_content() }}" allowfullscreen></iframe>
            </div>
          </div>
        @endwhile
      </div>
    </section>
  @endif

  {{-- Rueda de Casino --}}
  @if ( $rueda->have_posts() )
    <section id="rueda-videos" class="pt5">
      <h1>Rueda de Casino</h1>
      <hr>
      <div class="row">
        @while ( $rueda->have_posts() )
          @php( $rueda->the_post() )
          <div class="col-12 col-xs-6 col-md-4 col-lg-4 mb3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{ get_the_content() }}" allowfullscreen></iframe>
            </div>
          </div>
        @endwhile
      </div>
    </section>
  @endif

  {{-- Tango --}}
  @if ( $mix->have_posts() )
    <section id="mix-videos" class="pt5">
      <h1>Mix</h1>
      <hr>
      <div class="row">
        @while ( $mix->have_posts() )
          @php( $mix->the_post() )
          <div class="col-12 col-xs-6 col-md-4 col-lg-4 mb3">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{ get_the_content() }}" allowfullscreen></iframe>
            </div>
          </div>
        @endwhile
      </div>
    </section>
  @endif


@endsection
