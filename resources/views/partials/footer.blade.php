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
                <a class="btn-social btn-facebook" target="_blank" href="{{ $social['facebook'] }}">
                    <i class="fab fa-facebook-f"></i>
                </a>
              @endif
              @if ( $social['google_plus'] )
                <a class="btn-social btn-google-plus" target="_blank" href="{{ $social['google_plus'] }}">
                    <i class="fab fa-google-plus"></i>
                </a>
              @endif
              @if ( $social['twitter'] )
                <a class="btn-social btn-twitter" target="_blank" href="{{ $social['twitter'] }}">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
              @endif
              @if ( $social['youtube'] )
                <a class="btn-social btn-youtube" target="_blank" href="{{ $social['youtube'] }}">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                </a>
              @endif
              @if ( $social['instagram'] )
                <a class="btn-social btn-instagram" target="_blank" href="{{ $social['instagram'] }}">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
              @endif
              @if ( $social['snapchat'] )
                <a class="btn-social btn-snapchat" target="_blank" href="{{ $social['snapchat'] }}">
                    <i class="fab fa-snapchat" style="color:black;" aria-hidden="true"></i>
                </a>
              @endif
              @if ( $social['vimeo'] )
                <a class="btn-social btn-vimeo" target="_blank" href="{{ $social['vimeo'] }}">
                    <i class="fab fa-vimeo" aria-hidden="true"></i>
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
