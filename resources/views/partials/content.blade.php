<article @php post_class() @endphp>


    <a href="{{ get_permalink() }}">
      <div class="card grow">
        <img src="{{ get_the_post_thumbnail_url() }}" alt="" class="card-img-top" />
        <div class="card-body">
          <h4 class="card-title">
            <a href="{{ get_permalink() }}">{{ get_the_title() }}</a>
          </h4>
          <p class="card-text">
            @php the_excerpt() @endphp
          </p>
        </div>
      </div>
    </a>


</article>
<br>
