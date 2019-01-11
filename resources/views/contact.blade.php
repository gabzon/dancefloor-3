{{--
Template Name: Contact
--}}

@extends('layouts.app')

@php $classroom = get_terms( 'classroom' ); @endphp

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-page')

    @if ( count($classroom) > 0)
      <div class="row">
        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
          <table class="table table-responsive table-classroom mb0" style="border-top:0; border-color:red;">
            <tr>
              <td width="5%" style="padding-bottom:0 !important; padding-top:0 !important"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a></td>
              <td width="95%" style="padding-bottom:0 !important; padding-top:0 !important"><a href="tel:{{ App::phone() }}">{{ App::phone() }}</a></td>
            </tr>
            <tr>
              <td width="5%" style="padding-bottom:0 !important; padding-top:0 !important"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></td>
              <td width="95%" style="padding-bottom:0 !important; padding-top:0 !important">
                <a href="mailto:{{ App::email() }}" target="_blank"> {{ App::email() }}</a>
              </td>
            </tr>
          </table>
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @foreach ($classroom as $key => $value)
              <?php $active = ''; ?>
              @if ( get_term_meta($value->term_id,'classroom_type',true) == "studio" )
                @if ($key == 0)
                  @php($active = 'active')
                @else
                  @php($active = '')
                @endif
                <a class="nav-link pa0 {{$active}}" id="v-pills-{{ $classroom[$key]->slug }}-tab" data-toggle="pill" href="#v-pills-{{ $classroom[$key]->slug }}" role="tab" aria-controls="v-pills-{{ $classroom[$key]->slug }}" aria-selected="true">
                  <table class="table table-responsive table-classroom mb0" style="border-top:0; border-color:red;">
                    <tr>
                      <td width="5%"><i class="fa fa-home" aria-hidden="true"></i></td>
                      <td width="95%">
                        <strong>{{ $classroom[$key]->name }}</strong><br>
                        <?= get_term_meta($classroom[$key]->term_id,'classroom_address',true); ?> ({{ get_term_meta($classroom[$key]->term_id ,'classroom_quartier',true) }})<br>
                        <?= get_term_meta($classroom[$key]->term_id,'classroom_postal_code',true) . ', ' . get_term_meta($classroom[$key]->term_id,'classroom_ville',true); ?><br>
                      </td>
                    </tr>
                  </table>
                </a>
              @endif
            @endforeach
          </div>
          <div class="mv2"></div>
        </div>
        <div class="col-12 col-sm-8 col-md-8 col-lg-8">
          <div class="tab-content" id="v-pills-tabContent">
            @foreach ($classroom as $key => $value)
              @if ( get_term_meta($value->term_id,'classroom_type',true) == "studio")
                @if ($key == 0)
                  <?php $active = 'active'; ?>
                @else
                  <?php $active = ''; ?>
                @endif
                <div class="tab-pane fade show {{$active}}" id="v-pills-{{ $classroom[$key]->slug }}" role="tabpanel" aria-labelledby="v-pills-{{ $classroom[$key]->slug }}-tab">
                  {!! get_term_meta($value->term_id,'classroom_google_map',true) !!}
                  <a href="{{ get_term_meta($classroom[$key]->term_id,'classroom_google_map_link',true) }}" target="_blank">
                    {{ __('Open on Google maps','sage') }}
                  </a>
                  <?php $shoes = get_term_meta($classroom[$key]->term_id,'classroom_require_shoes'); ?>
                  @if ($shoes[0] == 'TRUE')
                    <br>
                    <br>
                    <div class="alert alert-danger" role="alert">
                      <table>
                        <tr>
                          <td valign="top"><i class="fas fa-exclamation-circle"></i></td>
                          <td>
                            <strong> {{ _e('Attention','sage') }}</strong>
                            <br>
                            {{ __('Street shoes are not allowed in this classroom, please bring your own dancing shoes.', 'sage') }}
                          </td>
                        </tr>
                      </table>
                    </div>
                  @endif
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    @endif
  @endwhile
@endsection
