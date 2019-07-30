@php
$levels = Course::get_levels($post->ID);
$days = Course::get_days($post->ID);
$dow = Course::days_of_week();
$dancefloor_options = get_option('dancefloor_settings');
$classroom = Course::get_classroom($post->ID);
@endphp


<table class="table f6">
  {{-- Levels -----------------------------------------------------------------}}
  @if ($levels)
    <tr>
      <td width="43%"><strong><?= __('Level','sage'); ?> <i lang="en" class="text-muted">(Level)</i> :</strong></td>
      <td width="57%">
        @for ($i=0; $i < count($levels); $i++)
          @if ($i == count($levels)-1)
            {{ $levels[$i]->name }}
          @else
            {{ $levels[$i]->name . ', ' }}
          @endif
        @endfor
      </td>
    </tr>
  @endif


  {{-- Day of the week -------------------------------------------------------}}
  @if ($dow)
    <tr>
      <td><strong><?= __('Day', 'sage'); ?> <i class="text-muted i" lang="en">(Day)</i> : </strong></td>
      <td>
        @foreach ($days as $d)
          <span class="ttc"><?= __($dow[$d],'sage'); ?></span><br>
        @endforeach
      </td>
    </tr>
  @endif


  {{-- Levels -----------------------------------------------------------------}}
  @if (get_post_meta($post->ID,'course_start_time', true))
    <tr>
      <td><strong><?= __('Time','sage'); ?> <i class="text-muted" lang="en">(Time)</i> :</strong></td>
      <td>{{ get_post_meta($post->ID,'course_start_time', true) . ' - ' . get_post_meta($post->ID,'course_end_time', true) }}</td>
    </tr>
  @endif


  {{-- Period -----------------------------------------------------------------}}
  <tr>
    <td><strong><?= __('Period','sage'); ?> <i class="text-muted" lang="en">(Period)</i> :</strong></td>
    @if ( get_post_meta($post->ID,'course_start_date', true) == get_post_meta($post->ID,'course_end_date', true) )
      <td>{{ get_post_meta($post->ID,'course_start_date', true) }}</td>
    @else
      <td>{{ get_post_meta($post->ID,'course_start_date', true) . ' - ' . get_post_meta($post->ID,'course_end_date', true) }}</td>
    @endif
  </tr>


  {{-- Levels -----------------------------------------------------------------}}
  @if (get_post_meta($post->ID,'course_required_level',true))
    <tr>
      <td><strong><?= __('Required level', 'sage')?> <i class="text-muted i" lang="en">(Required level)</i> :</strong></td>
      <td>{{ get_post_meta($post->ID,'course_required_level',true) }}</td>
    </tr>
  @endif

  {{-- Professors --}}
  @if ( get_post_meta($post->ID,'course_teacher', true) )
    <tr>
      <td><strong><?= __('Teacher(s)','sage'); ?> <i class="text-muted i" lang="en">(Teachers)</i> :</strong></td>
      <td>
        <?php if (get_post_meta($post->ID,'course_teacher', true)): ?>
          <?= get_post_meta($post->ID,'course_teacher', true); ?>
        <?php else: ?>
          <?php _e('Not available','sage'); ?>
        <?php endif; ?>
      </td>
    </tr>
  @endif


  @php($price = App::prices($post->ID))
  <tr>
    <td><strong><?= __('Price','sage'); ?> <i class="text-muted">(Price)</i> :</strong></td>
    @if (!$price['multi_price'])
      <td>
        {{ $price['currency'] . ' ' . $price['regular_price'] }}
        @if ( $price['reduced_price'] )
          / {{ $price['currency'] . ' ' . $price['reduced_price'] }}
        @endif
      </td>
    @else
      <td><?= __('Dès','sage') . ' ' .  $price['currency'] . ' ' . $price['regular_price'];?></td>
    @endif
  </tr>
  @if (count($classroom) > 0)
    <tr>
      <td><strong><?= __('Place','sage'); ?> <i lang="en" class="text-muted">(Place)</i>:</strong></td>
      <td>
        <strong>{{ $classroom[0]->name }}</strong>
        <br>
        {{ get_term_meta( $classroom[0]->term_id, 'classroom_address', true ) }}
        <br>
        {{ get_term_meta( $classroom[0]->term_id, 'classroom_postal_code', true ) }},
        {{ get_term_meta( $classroom[0]->term_id, 'classroom_ville', true ) }}
      </td>
    </tr>
  @endif
  @if ( $dancefloor_options['df_display_inscription_button'] == 'yes' )
    <tr>
      <td colspan="2" style="padding:0.75rem 0;">
        <a class="f5 no-underline dark-red bg-animate hover-bg-dark-red hover-white inline-flex items-center pa3 ba border-box w-100" href="#inscription">
          <i class="far fa-edit"></i>&nbsp; Inscription &nbsp;<i lang="en"> (Registration)</i>
        </a>
        <div class="mv2"></div>
        <?php //the_favorites_button($post->ID); ?>
      </td>
    </tr>
  @endif
</table>
