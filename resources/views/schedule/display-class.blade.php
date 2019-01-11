@php
  $classroom = Course::get_classroom($key);
  $style = Course::get_style($key);
  $color_bar = Course::get_color_bar($classroom,$style);
@endphp


<a href="<?= esc_url(get_permalink($key)); ?>" class="course black hover-dark-gray">  
  <div class="course-link pl2 grow hover-bg-near-white" style="border-left: 5px solid {{ $color_bar }};">
    <span class="course-time"><?= get_post_meta($key,'course_start_time',true); ?> - <?= get_post_meta($key,'course_end_time',true); ?></span><br>
    <strong class="primary-color"><?= get_post_meta($key, 'course_title',true); ?></strong><br>
    @if (get_post_meta($key,'course_level',true))
      <span class="secondary-color">
        <?= __('Level','sage') ?>: {{ _e(get_post_meta($key,'course_level',true),'sage') }}
        @if (get_post_meta($key,'course_level_number',true))
          ({{_e('Level','sage')}} {{get_post_meta($key,'course_level_number',true)}})
        @endif
      </span><br>
    @endif
    <span class="course-teacher"><?= __('Teacher(s)','sage'); ?> <i lang="en" class="text-muted">(Teachers)</i> : {{ get_post_meta($key,'course_teacher',true) }}</span>
    <br>
    {{-- @if ($room)
      <span class="course-time">Lieu <i lang="en" class="text-muted">(Place)</i> : {{ get_the_title($room) }}</span>
    @endif --}}
    @if (count($classroom) > 0)
      <span class="course-time"><?= __('Place','sage'); ?> <i lang="en" class="text-muted">(Place)</i> : {{ $classroom[0]->name }}</span>
    @endif
  </div>
</a>
<br>
