{{--
Template Name: Workshops
--}}

@extends('layouts.app')

@php
// WP_Query arguments
$args = array(
  'post_type'  => array( 'course' ),
  'meta_value' => 'workshop',
);

// The Query
$workshops = new WP_Query( $args );
@endphp

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @if ($workshops->have_posts())
      <div class="row">
        @while ($workshops->have_posts())
          <div class="col-lg-4 col-md-4 col-sm-6">
            <?php
            $workshops->the_post();
            $thumb_id = get_post_thumbnail_id();
            ?>
            <div class="card grow pointer mb2">
              @if ($thumb_id)
                @php( $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true) )
                <a type="button" href="@php(the_permalink())">
                  <img class="card-img-top img-fluid " src="{{ $thumb_url_array[0] }}" alt="Card image cap" />
                </a>
              @else
                <img class="card-img-top card-img img-fluid " src="http://localhost/dancefloor/web/app/uploads/2016/03/1598771_1686453341589092_3132456213276382726_o.jpg" alt="Card image cap"/>
              @endif
              <div class="card-body">
                <h4 class="card-title">{!! the_title() !!}</h4>
                {{-- <p class="card-text text-muted">
                  @php( $cats = wp_get_post_categories(get_the_ID()))
                  @foreach ($cats as $key => $value)
                    <span class="badge badge-danger">{{ get_cat_name($value) }}</span>
                  @endforeach
                </p> --}}
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Date:</strong> {{ get_post_meta(get_the_ID(),'course_start_date', true) }}</li>
                  <li class="list-group-item"><strong>Heure:</strong> {{ get_post_meta(get_the_ID(),'course_start_time', true) }} - {{ get_post_meta(get_the_ID(),'course_end_time', true) }}</li>
                  <li class="list-group-item"><strong>Lieu:</strong>
                    <?php
                      $classroom = get_the_terms(get_the_ID(),'classroom');
                      echo $classroom[0]->name
                    ?>
                  </li>
                </ul>
              </div>
              <div class="card-footer tc f3">
                @php( $price = App::prices(get_the_ID()) )
                @if ($price['multi_price'])
                  <strong>{{ __('Dès','sage') . ' ' . $price['currency'] . ' ' . $price['regular_price'] }}</strong>
                @else
                  <strong>{{ $price['currency'] . ' ' . $price['regular_price'] }}</strong>
                @endif
              </div>
            </div>
          </div>
        @endwhile
      </div>
      <br>
    @endif
    @php( wp_reset_postdata() )
    {{-- @include('partials.content-page') --}}
  @endwhile
@endsection
