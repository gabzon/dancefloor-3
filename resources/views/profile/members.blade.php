<?php
$id = $user->ID;
$email = $user->user_email;
$photos = get_user_meta($user->ID,'photo');
$photo = ($photos ? $photos[0] : '');
$first_name = $user->first_name;
$last_name = $user->last_name;
$description = $user->description;
$title = get_user_meta($user->ID,'title', true);
$nickname = $user->user_nicename;
$facebook = get_user_meta($id,'df_facebook',true);
$phone = get_user_meta($id,'df_phone',true);
$twitter = get_user_meta($id,'df_twitter',true);
$google_plus = get_user_meta($id,'df_google_plus',true);
$instagram = get_user_meta($id,'df_instagram',true);
$dancefloor_options = get_option('dancefloor_settings');
$skills = get_user_meta($id,'skills');
?>

{{-- @include('profile.modal-member') --}}

<div class="card grow pointer mb4">

  <?php if ($photo): ?>
    <img class="card-img-top img-fluid" src="<?= wp_get_attachment_url($photo); ?>" alt="Card image cap" />
  <?php else: ?>
    <img class="card-img-top card-img img-fluid" src="<?php echo get_avatar_url( $email, array('size'  => 512) ); ?>" alt="Card image cap"/>
  <?php endif; ?>

  <div class="card-body text-center">

    <?php if ( $dancefloor_options['df_display_team_member_name'] == 'nickname'): ?>
      <h4 class="card-title ttc black"><?= esc_html( get_the_author_meta('display_name',$id) ); ?></h4>
    <?php else: ?>
      <h4 class="card-title black"><?= esc_html( $first_name ); ?> <?= esc_html( $last_name ); ?></h4>
    <?php endif; ?>

    <p class="card-text text-muted"><?= esc_html($title); ?></p>
    @if (get_user_meta($id,'skills'))
      <h5 class="black"><?php _e('Skills','sage'); ?></h5>
      <span class="black">
        @for ($i=0; $i < count($skills); $i++)
          @if ($i != 0)
            |
          @endif
          {{ $skills[$i] }}
        @endfor
      </span>
    @endif

  </div>

  <div class="tc">
    @include('profile.social')
  </div>

</div>
