{{--
Template Name: Team
--}}

@extends('layouts.app')

@php
$dancefloor_options = get_option('dancefloor_settings');
$team_section = $dancefloor_options['team_group'];
@endphp

@section('content')

  @while (have_posts()) @php(the_post())
    {{-- @include('partials.page-header') --}}
    {{-- @include('partials.content-page') --}}
  @endwhile

  @foreach ($team_section as $s)
    <h1 >{{ $s['team_section_title'] }}</h1>
    @php( $indice = 100 )
    @php( $i = 0 )

    <div class="row">

      @foreach ($s['team_member'] as $t)

        <div class="col-12 co-sm-6 col-md-4 col-lg-3">
          <?php $user = get_user_by('login',$t); ?>
          <a href="{{get_author_posts_url( $user->ID )}}">
            @include('profile.members');
          </a>
        </div>
      @endforeach

    </div>
    <br>
    <br>
  @endforeach

  <br>
  <br>
@endsection
