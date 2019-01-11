{{--
Template Name: Schedule
--}}
<style media="screen">
a.btn-social, .btn-social { padding-top: 12px; }
</style>

@extends('layouts.app')

@php
$dancefloor_options = get_option('dancefloor_settings');
$bank_details = $dancefloor_options['bank_details'];
$schedule = $dancefloor_options['schedule'];
$schedule_message = $dancefloor_options['df_schedule_message'];
@endphp

@section('content')
  @if ($schedule_message)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><?= __('Open enrollment','sage'); ?>!</strong> <br>
      @php
      echo $schedule_message
      @endphp
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  @include('schedule.info-header')
  <br>
  @include('schedule.classes-per-day')
  @while(have_posts()) @php(the_post())
    <br>
    @include('partials.content-page')
  @endwhile

@endsection

<div class="formulaire-proposition">
  <?php //$page = get_page_by_title( 'Proposition' , OBJECT, 'page'); ?>
  <?php //echo $page->post_content; ?>
</div>
