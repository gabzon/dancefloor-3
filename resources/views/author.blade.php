@extends('layouts.app')

@section('content')

  <?php
  $member = get_queried_object();
  $id = $member->ID;
  $photos = get_user_meta($member->ID,'photo');
  $photo = ($photos ? $photos[0] : '');
  $job_title = get_user_meta($member->ID,'title', true);

  $first_name = $member->first_name;
  $last_name = $member->last_name;
  $nickname = $member->user_nicename;
  $email = $member->user_email;
  $facebook = get_user_meta($id,'df_facebook',true);
  $phone = get_user_meta($id,'df_phone',true);
  $twitter = get_user_meta($id,'df_twitter',true);
  $google_plus = get_user_meta($id,'df_google_plus',true);
  $instagram = get_user_meta($id,'df_instagram',true);
  $dancefloor_options = get_option('dancefloor_settings');
  $skills = get_user_meta($id,'skills');
  ?>

  <div class="row">
    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
      <?php if ($photo): ?>
        <img class="card-img-top img-fluid" src="<?= wp_get_attachment_url($photo); ?>" alt="Card image cap" />
      <?php else: ?>
        <img class="card-img-top card-img img-fluid" src="<?php echo get_avatar_url( $email, array('size'  => 512) ); ?>" alt="Card image cap"/>
      <?php endif; ?>
      <br><br>
      <h4 class="ttc" style="color:{{ get_theme_mod( 'df_color_setting_hex', '#FFFFFF' ) }}">{{  $first_name .' ' . $last_name }}</h4>
      @include('profile.social')
      <hr>
      {{$job_title}}
      <hr>
      @if (get_user_meta($id,'skills'))
        <h5><?php _e('Skills','sage'); ?></h5>
        <span class="black">
          @for ($i=0; $i < count($skills); $i++)
            @if ($i != 0)
              |
            @endif
            {{ $skills[$i] }}
          @endfor
        </span>
      @endif
      <hr>
      @if (current_user_can('administrator'))
        Registered {{$member->user_registered}}
      @endif
    </div>
    <div class="col-12 col-sm-9 col-md-9 col-lg-9">
      <?= $member->description ?>
      <br>
      <br>
      <?php echo get_user_meta( $id, 'accomplishments', true ) ?>
    </div>
  </div>
  <br>
  <br>
@endsection
