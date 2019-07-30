<?php

function add_notice_query_var( $location, $post_id ) {
  remove_filter( 'redirect_post_location', 'add_notice_query_var', 99 );
  return add_query_arg( array( 'action' => 'edit', 'message'=> 1 ), $location );
}

function admin_notice_success() {
  if ( ! isset( $_GET['message'] ) ) {
    return;
  }
  $screen = get_current_screen();
  if ($screen->base == "post" && $screen->post_type == "exp_client") {
    ?>
    <div class="notice notice-success is-dismissible">
      <p>
        <?php esc_html_e( 'Great, this client has been added/updated to Appbase.io!', 'sage' ); ?>
      </p>
    </div>
    <?php
  }
}

function admin_notice_error() {
  wp_die('Inside error');
  if ( ! isset( $_GET['edit'] ) ) {
    return;
  }
  ?>
  <div class="notice notice-error is-dismissible">
    <p><?php esc_html_e( 'Sorry, a problem has occurred!', 'sage' ); ?></p>
  </div>
  <?php
}
