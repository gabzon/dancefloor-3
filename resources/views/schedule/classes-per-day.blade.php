@php $days = Course::days_of_week() @endphp
<div class="row">
  @foreach ($days as $d)
    @php( $class = Course::class($d) )
    @if ( $class->have_posts() )
      <div class="col-12 col-xs-6 col-md-6 col-lg-3">
        <h4 class="f4 pb1 ttc"><?= __($d, 'sage'); ?></h4>
          @while ( $class->have_posts() )
            @php( $class->the_post() )
            @php ( $key = get_the_ID() )
            @include('schedule.display-class')
          @endwhile
      </div>
    @endif
  @endforeach
</div>

<?php
__('Monday', 'sage');
__('Tuesday', 'sage');
__('Wednesday', 'sage');
__('Thursday', 'sage');
__('Friday', 'sage');
__('Saturday','sage');
__('Sunday','sage');
__('monday', 'sage');
__('tuesday', 'sage');
__('wednesday', 'sage');
__('thursday', 'sage');
__('friday', 'sage');
__('saturday','sage');
__('sunday','sage');
?>
