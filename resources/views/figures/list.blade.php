<div class="row">
  @if ($figures->have_posts())
    @while ($figures->have_posts())
      @php($query->the_post())
      <div class="col-3">
        <div class="card">
          <img src="{{ get_the_post_thumbnail_url(get_the_ID(),'full') }}" class="card-img-top" alt="">
          <div class="card-body">
            <h6 class="card-title">{{get_the_title()}}</h6>
          </div>
        </div>
      </div>
    @endwhile
    @php(wp_reset_postdata())
  @endif
</div>
