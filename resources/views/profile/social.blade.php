@if ($email)
  <a href="mailto:<?= esc_html($email); ?>" class="btn-social">
    <span class="fa-stack fa-1x">
      <i class="fas fa-circle fa-stack-2x" style="color:#c02b32"></i>
      <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
    </span>
  </a>
@endif

@if ($phone)
  <a href="tel:<?= $phone ?>" class="btn-social ">
    <span class="fa-stack fa-1x">
      <i class="fas fa-circle fa-stack-2x" style="color:#c02b32"></i>
      <i class="fas fa-phone fa-stack-1x fa-inverse"></i>
    </span>
  </a>
@endif

@if ($facebook)
  <a href="<?= $facebook ?>" class="btn-social mh0">
    <span class="fa-stack fa-1x">
      <i class="fas fa-circle fa-stack-2x" style="color:#c02b32"></i>
      <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
    </span>
  </a>
@endif

@if ($instagram)
  <a href="<?= $instagram ?>" class="btn-social">
    <span class="fa-stack fa-1x">
      <i class="fas fa-circle fa-stack-2x" style="color:#c02b32"></i>
      <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
    </span>
  </a>
@endif

@if ($google_plus)
  <a href="<?= $google_plus ?>" class="btn-social">
    <span class="fa-stack fa-1x">
      <i class="fas fa-circle fa-stack-2x" style="color:#c02b32"></i>
      <i class="fab fa-google-plus fa-stack-1x fa-inverse"></i>
    </span>
  </a>
@endif
