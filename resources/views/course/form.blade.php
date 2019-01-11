@php( $theme_options = get_option('dancefloor_settings') )
@if ( get_post_meta($post->ID,'course_type', true) == 'workshop')
  {{-- <section id="inscription">
    <div class="ui form">
      @if (is_plugin_active ('gravityforms/gravityforms.php'))
        @php( $form_id = get_post_meta($post->ID,'course_form',true) )
        @if ($form_id)
          @php
          gravity_form($form_id, false, false, false, '', true, 12);
          @endphp
        @else
          @php
          gravity_form(23, false, false, false, '', true, 12);
          @endphp
        @endif
      @endif
    </div>
    <br>
    <br>
    @if ($bank_details)
      <a href="{{ esc_url($bank_details) }}" class="f5 no-underline dark-red bg-animate hover-bg-dark-red hover-white inline-flex items-center pv2 ph3 ba border-box tc"><i class="credit card alternative icon"></i> {{ _e('Bank details','sage') }}</a>
    @endif
  </section> --}}
@else
  <section id="inscription">
    {{-- @php( $page = get_page_by_title( $form_title ) ) --}}
    @php( $page = get_page_by_title( 'formulaire' ) )
    @php( $content = apply_filters('the_content', $page->post_content) )
    @php
    echo $content;
    //gravity_form(50, false, false, false, '', true, 12);
    @endphp
    <br>
    <hr>
  </section>
@endif




{{--
//previous version
@php( $page = get_page_by_title( $form_title ) )
@php( $content = apply_filters('the_content', $page->post_content) )
@php
echo $content;
gravity_form(50, false, false, false, '', true, 12);
@endphp
<br>
<hr> --}}
