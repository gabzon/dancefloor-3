{{--
Template Name: Videos Template
--}}


<style media="screen">
* { box-sizing: border-box; }

/* ---- isotope ---- */

/* clear fix */
.grid:after {
  content: '';
  display: block;
  clear: both;
}

/* ---- .element-item ---- */

.element-item {
  position: relative;
  float: left;
  width: 350px;
  padding: 10px 10px 10px 0;
  margin-bottom: 10px;
  color: #262524;
}

.element-item > * {
  margin: 0;
  padding: 0;
}

a.btn-social, .btn-social { padding-top: 12px; }
</style>

@extends('layouts.app')
@php
// WP_Query arguments
$args = [
  'post_type' => ['df_video'],
  'posts_per_page' => -1,
  'orderby' => 'rand',
];

// The Query
$query = new WP_Query( $args );
@endphp

{{--
ids: for query
159 = Salsa Cubaine
214 = Rueda de Casino
151 = Afro Cubain
160 = Salsa Portoricaine
156 = Lady Styling
157 = Men Styling
191 = Afro House
153 = Dancehall
Salsa HipHop
219 = Urban Salsa
Evenements
161 = Shows
218 = Teaser

--}}

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    {{-- The Loop --}}
    <div id="filters">
      <button class="f5 no-underline black bg-animate hover-bg-black hover-white inline-flex items-center ph3 pv2 ba border-box is-checked" data-filter="*">show all</button>
      @php
      $terms = get_terms([
        'taxonomy' => 'category',
        'hide_empty' => true,
        'include' => [159, 214, 151, 160, 156, 157, 191, 153, 219, 161, 218]
      ]);
      @endphp

      @foreach ($terms as $t)
        <button class="f5 black hover-bg-black border-box bg-animate ba inline-flex items-center ph3 pv2 mt1 mr2 hover-white" data-filter=".{{$t->slug}}">{{$t->name}}</button>
      @endforeach
    </div>
    <br>
    @if ($query->have_posts())
      <div class="grid">
        @while( $query->have_posts() )
          @php( $query->the_post() )
          @php
          $categories = get_the_category();
          $category_string = '';
          @endphp
          @foreach ($categories as $c)
            @php( $category_string = $category_string . ' ' . $c->slug )
          @endforeach
          <div class="element-item transition metal {{$category_string}}" data-category="transition">
            <div class="card">
              @php( the_content() )
              <div class="card-body" style="margin-top:-1.2rem;">
                <h4 class="card-title">@php( the_title() )</h4>
                <p class="card-text">
                  @foreach ($categories as $c)
                    <span class="badge badge-danger">{{$c->name}}</span>
                  @endforeach
                </p>
              </div>
            </div>
          </div>
        @endwhile
      </div>
    @endif

    {{-- Restore original Post Data --}}
    @php( wp_reset_postdata() )

    {{-- @include('partials.content-page') --}}
    <br>
    <br>
  @endwhile
@endsection
