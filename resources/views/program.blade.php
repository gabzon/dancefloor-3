{{--
Template Name: Program
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    <div class="row">
      <div class="col-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          @include('figures.styles')
        </div>
      </div>
      <div class="col-10">
        <div class="tab-content" id="v-pills-tabContent">
          @php($styles = Figure::list_of_styles())
          @foreach ($styles as $s)
            <div class="tab-pane fade" id="v-pills-{{$s->name}}" role="tabpanel" aria-labelledby="v-pills-{{$s->name}}-tab">
              @php($style = $s->slug)
              @include('figures.levels')
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div id="figure"></div>
    @include('partials.content-page')
  @endwhile
  <br>
  <br>
@endsection
