<?php
/**
* Course endpoints.
* Tutorial : https://upnrunn.com/blog/2018/04/how-to-extend-wp-rest-api-from-your-custom-plugin-part-3/
*/
class DF_Course_Endpoint extends WP_REST_Controller {
  /**
  * Constructor.
  */
  public function __construct() {
    $this->namespace = 'df-rest-api';
    $this->rest_base = 'course';
    $this->post_type = 'course';
  }
  /**
  * Register the component routes.
  */
  public function register_routes() {
    register_rest_route(
      $this->namespace,
      $this->rest_base,
      [[
        'methods'             => WP_REST_Server::READABLE,
        'callback'            => array( $this, 'get_items' ),
        'permission_callback' => array( $this, 'get_items_permissions_check' ),
        'args'                => $this->get_collection_params(),
        ]]
      );
    }

    /**
    * Retrieve Course.
    */
    public function get_items( $request ) {
      $args = array(
        'post_type'      => $this->post_type,
        'posts_per_page' => $request['per_page'],
        'page'           => $request['page'],
        'meta_query' => array(
          array(
            'key'     => 'course_type',
            'value'   => 'class',
          ),
        ),
      );
      $courses = get_posts( $args );
      $data = array();
      if ( empty( $courses ) ) {
        return null;
      }
      if ( $courses ) {
        foreach ( $courses as $course ) :
          $itemdata = $this->prepare_item_for_response( $course, $request );
          $data[] = $this->prepare_response_for_collection( $itemdata );
        endforeach;
      }
      $data = rest_ensure_response( $data );
      return $data;
    }
    /**
    * Check if a given request has access to restaurant items.
    */
    public function get_items_permissions_check( $request ) {
      return true;
    }
    /**
    * Get the query params for collections
    */
    public function get_collection_params() {
      return array(
        'page'     => array(
          'description'       => 'Current page of the collection.',
          'type'              => 'integer',
          'default'           => 1,
          'sanitize_callback' => 'absint',
        ),
        'per_page' => array(
          'description'       => 'Maximum number of items to be returned in result set.',
          'type'              => 'integer',
          'default'           => 100,
          'sanitize_callback' => 'absint',
        ),
      );
    }

    /**
    * Prepares course data for return as an object.
    */
    public function prepare_item_for_response( $course, $request ) {

      $classroom = wp_get_post_terms( $course->ID, 'classroom', array("fields" => "names"));

      // echo $course->course_end_date;
      //
      // $date_array = getdate();
      //
      // $today =  $date_array['mday'] . "/" . $date_array['mon'] . "/" . $date_array['year'];
      //
      // echo $today . '<br>';

      $data = array(
        'id'                => $course->ID,
        'title'             => $course->post_title,
        'link'              => get_the_permalink( $course->ID ),
        'official_title'    => $course->course_title,
        'start_date'        => $course->course_start_date,
        'end_date'          => $course->course_end_date,
        'start_time'        => $course->course_start_time,
        'end_time'          => $course->course_end_time,
        'teacher'           => $course->course_teacher,
        'type'              => $course->course_type,
        'required_level'    => $course->course_required_level,
        'alert_message'     => $course->course_attention_message,
        'full_price'        => $course->course_full_price,
        'reduced_price'     => $course->course_reduced_price,
        'multiprice'        => $course->course_multiprice,

        'categories'        => wp_get_post_terms( $course->ID, 'category', array("fields" => "names")),
        'tags'              => wp_get_post_terms( $course->ID, 'post_tag', array("fields" => "names")),
        'style'             => wp_get_post_terms( $course->ID, 'style', array("fields" => "names")),
        'level'             => wp_get_post_terms( $course->ID, 'level', array("fields" => "names")),
        'day'               => wp_get_post_terms( $course->ID, 'day_of_week', array("fields" => "names")),
        'classroom'         => wp_get_post_terms( $course->ID, 'classroom', array("fields" => "names")),

        'location'          => $classroom,
        'content'           => $course->post_content,
      );
      return $data;
    }
  }
