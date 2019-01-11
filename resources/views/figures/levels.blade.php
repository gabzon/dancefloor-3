<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All styles</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-beginner-tab" data-toggle="pill" href="#pills-beginner" role="tab" aria-controls="pills-intermediate" aria-selected="false">Beginner</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-intermediate-tab" data-toggle="pill" href="#pills-intermediate" role="tab" aria-controls="pills-beginner" aria-selected="false">Intermediate</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-advanced-tab" data-toggle="pill" href="#pills-advanced" role="tab" aria-controls="pills-advanced" aria-selected="false">Advance</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
    @php
    $query = Figure::list_of_figures($style,'all-levels');
    $figures = $query;
    @endphp
    @include('figures.list')
  </div>
  <div class="tab-pane fade" id="pills-beginner" role="tabpanel" aria-labelledby="pills-beginner-tab">
    @php
    $query = Figure::list_of_figures($style,'beginner');
    $figures = $query;
    @endphp
    @include('figures.list')
  </div>
  <div class="tab-pane fade" id="pills-intermediate" role="tabpanel" aria-labelledby="pills-intermediate-tab">
    @php
    $query = Figure::list_of_figures($style,'intermediate');
    $figures = $query;
    @endphp
    @include('figures.list')
  </div>
  <div class="tab-pane fade" id="pills-advanced" role="tabpanel" aria-labelledby="pills-advanced-tab">
    @php
    $query = Figure::list_of_figures($style,'advanced');
    $figures = $query;
    @endphp
    @include('figures.list')
  </div>
</div>
