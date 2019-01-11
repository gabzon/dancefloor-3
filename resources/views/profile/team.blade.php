@php
$dancefloor_options = get_option('dancefloor_settings');
$team_section = $dancefloor_options['team_group'];
@endphp

@foreach ($team_section as $s)
  <h1 >{{ $s['team_section_title'] }}</h1>
  @php( $indice = 100 )
  @php( $i = 0 )
  <div class="row">

    @foreach ($s['team_member'] as $t)

      <div class="col-12 co-sm-6 col-md-4 col-lg-3">
        <?php
        $user = get_user_by('login',$t);
        $photos = get_user_meta($user->ID,'photo');
        $photo = ($photos ? $photos[0] : '');
        $title = get_user_meta($user->ID,'title', true);
        display_person($indice, $user->ID, $user->user_email, $photo, $user->first_name, $user->last_name, $title, $user->description, $user->user_nicename);
        $indice++;
        ?>
      </div>
    @endforeach


  </div>
  <br>
  <br>
@endforeach
