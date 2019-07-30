<?php

// https://wordpress.stackexchange.com/questions/152033/how-to-add-an-admin-notice-upon-post-save-update
// possible hooks: transition_post_status, save_post, publish_post
// https://wordpress.stackexchange.com/questions/178183/should-i-use-add-actionpublish-post-or-add-filterpublish-post

// List of websites with figures
// http://www.salsaisgood.com
// https://salsayo.com
// Levels basic, beginner, intermediate, advanced, expert, master

require 'figure_data.php';
//require 'notifications.php';

add_action( 'transition_post_status', 'saved_figure', 10, 3 );
add_action( 'admin_notices', 'admin_notice_success');

function saved_figure ( $new_status, $old_status, $post) {
  if ($post->post_type == "figure") {
    $credentials = App::appbase_64encode_key();
    $post_id = $post->ID;

    $appbase_id = get_post_meta($post_id, 'df_figure_appbase_id', true);
    error_log('appbase_id= ' . $appbase_id);

    if ($appbase_id == "") {
      error_log('I am creating new a figure');
      $appbase_url = "https://scalr.api.appbase.io/df_figures/_doc/";
    } else {
      $appbase_url = "https://scalr.api.appbase.io/df_figures/_doc/" . $appbase_id;
      error_log('I am updating the figure id: '. $appbase_id . " url: " . $appbase_url);
    }

    if ($new_status == "publish") {
      $curl = curl_init();

      $post_data = figure_data($post_id, $post);

      $jsonObj = json_encode($post_data);
      curl_setopt_array($curl, array(
        CURLOPT_URL => $appbase_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $jsonObj,
        CURLOPT_HTTPHEADER => array(
          "Authorization: Basic $credentials",
          "Content-Type: application/json"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);

      if ($err) {
        $error = new WP_Error($code, $msg);
        error_log('Houston we have a problem');
      } else {
        $json = json_decode($response, true);
        error_log('json_id: '.$json['_id']);
        if ($appbase_id == "") {
          update_post_meta( $post_id, 'df_figure_appbase_id', $json['_id'] );
        }
        wp_mail( 'gab.zambrano@gmail.com', 'YESS', 'inserted' );
        add_filter( 'redirect_post_location', 'add_notice_query_var' , 10, 2 );
      }

    }

    if ($new_status == 'trash') {
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $appbase_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "DELETE",
        CURLOPT_HTTPHEADER => array(
          "Authorization: Basic $credentials",
          "Content-Type: application/json"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
    }

  }
}

function add_notice_query_var( $location, $post_id ) {
  remove_filter( 'redirect_post_location', 'add_notice_query_var', 99 );
  return add_query_arg( array( 'action' => 'edit', 'message'=> 1 ), $location );
}

function admin_notice_success() {
  if ( ! isset( $_GET['message'] ) ) {
    return;
  }
  $screen = get_current_screen();
  if ($screen->base == "post" && $screen->post_type == "figure") {
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
