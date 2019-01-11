<article @php post_class() @endphp>
  <div class="row">
    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
      <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="" class="img-fluid" style="padding-top:6px;"/>
    </div>
    <div class="col-12 col-sm-9 col-md-9 col-lg-9">
      <header class="article-title">
        <h1 style="margin:0">@php(the_title())</h1>
        <small style="color:grey">@include('partials/entry-meta')</small>
      </header>
      <div class="entry-content">
        @php(the_content())
      </div>
    </div>
  </div>
  <br>
  <br>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php(comments_template('/partials/comments.blade.php'))
</article>
