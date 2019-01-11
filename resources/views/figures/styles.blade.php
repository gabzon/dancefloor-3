@php
$styles = Figure::list_of_styles()
@endphp

@foreach ($styles as $s)
  <a  class="nav-link"
      id="v-pills-{{$s->name}}-tab"
      data-toggle="pill"
      href="#v-pills-{{$s->name}}"
      role="tab"
      aria-controls="v-pills-{{$s->name}}"
      aria-selected="true">{{$s->name}}
  </a>
@endforeach
