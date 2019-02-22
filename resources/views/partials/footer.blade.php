<br>
<footer class="content-info bg-black text-white">
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 centering">
        <a href="<?= esc_url(home_url('/')); ?>">
          @if (App::site_logo())
            <img src="{{ App::site_logo() }}" alt="Dancefloor logo" class="img-fluid" width="200"/>
          @else
            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/dancefloor-logo-white.svg" alt="Dancefloor logo" class="img-fluid" width="150"/>
          @endif
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 social-links text-center">
        <br>
        @php( $social = App::social())
        @if ( $social['facebook'] )
          <a href="<?= $social['facebook'] ?>" class="btn-social mh0">
            <span class="fa-stack fa-lg">
              <i class="fas fa-circle fa-stack-2x" style="color:#3b5998"></i>
              <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
            </span>
          </a>
        @endif

        @if ( $social['google_plus'] )
          <a href="<?= $social['google_plus'] ?>" class="btn-social">
            <span class="fa-stack fa-lg">
              <i class="fas fa-circle fa-stack-2x" style="color:#c02b32"></i>
              <i class="fab fa-google-plus fa-stack-1x fa-inverse"></i>
            </span>
          </a>
        @endif

        @if ( $social['twitter'] )
          <a href="<?= $social['twitter'] ?>" class="btn-social">
            <span class="fa-stack fa-lg">
              <i class="fas fa-circle fa-stack-2x" style="color:#55acee"></i>
              <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
            </span>
          </a>
        @endif

        @if ( $social['youtube'] )
          <a href="<?= $social['youtube'] ?>" class="btn-social">
            <span class="fa-stack fa-lg">
              <i class="fas fa-circle fa-stack-2x" style="color:#e52d27"></i>
              <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
            </span>
          </a>
        @endif
        @if ( $social['instagram'] )
          <a href="<?= $social['instagram'] ?>" class="btn-social">
            <span class="fa-stack fa-lg">
              <i class="fas fa-circle fa-stack-2x" style="color:#3f729b"></i>
              <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
            </span>
          </a>
        @endif
        @if ( $social['snapchat'] )
          <a href="<?= $social['snapchat'] ?>" class="btn-social">
            <span class="fa-stack fa-lg">
              <i class="fas fa-circle fa-stack-2x" style="color:#fffc00"></i>
              <i class="fab fa-snapchat fa-stack-1x fa-inverse"></i>
            </span>
          </a>
        @endif
        @if ( $social['vimeo'] )
          <a href="<?= $social['vimeo'] ?>" class="btn-social">
            <span class="fa-stack fa-lg">
              <i class="fas fa-circle fa-stack-2x" style="color:#1ab7ea"></i>
              <i class="fab fa-vimeo fa-stack-1x fa-inverse"></i>
            </span>
          </a>
        @endif
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 centering contact">
        <h6 style="padding-top:10px"><a href="mailto:{{ App::email() }}" target="_blank" class="email white link hover-gray"><i class="fa fa-envelope" aria-hidden="true"></i> {{ App::email() }}</a></h6>
        <h6><a href="tel:{{ App::phone() }}" class="phone white link hover-gray"><i class="fa fa-phone" aria-hidden="true"></i>  {{ App::phone() }}</a></h6>
        <div class="fb-like" data-href="{{ $social['facebook'] }}" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
      </div>
    </div>
    <br>
    @php(dynamic_sidebar('sidebar-footer'))
    <br>
  </div>
</footer>
