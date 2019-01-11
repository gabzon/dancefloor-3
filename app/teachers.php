<?php

function display_person($indice, $id, $email, $photo, $first_name, $last_name, $title, $description, $nickname){
  ?>
  <!-- Modal -->
  <div class="modal fade" id="myModal-<?= $indice ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><?= esc_html( $first_name ) . ' ' . esc_html( $last_name ) ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <?= $description; ?>
          <br>
          <br>
          <?php echo get_user_meta( $id, 'accomplishments', true ); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div class="card grow pointer mb4">
    <a class="card-link" data-toggle="modal" data-target="#myModal-<?= $indice; ?>">
      <?php if ($photo): ?>
        <img class="card-img-top img-fluid" src="<?= wp_get_attachment_url($photo); ?>" alt="Card image cap" />
      <?php else: ?>
        <img class="card-img-top card-img img-fluid" src="<?php echo get_avatar_url( $email, array('size'  => 512) ); ?>" alt="Card image cap"/>
      <?php endif; ?>
    </a>
    <div class="card-body text-center">
      <?php $dancefloor_options = get_option('dancefloor_settings'); ?>

        <?php if ( $dancefloor_options['df_display_team_member_name'] == 'nickname'): ?>
          <h4 class="card-title ttc"><?= esc_html( get_the_author_meta('display_name',$id) ); ?></h4>
        <?php else: ?>
          <h4 class="card-title"><?= esc_html( $first_name ); ?> <?= esc_html( $last_name ); ?></h4>
        <?php endif; ?>

      <p class="card-text text-muted"><?= esc_html($title); ?></p>
      <?php if (get_user_meta($id,'skills')): ?>
        <h5><?php _e('Skills','sage'); ?></h5>
        <span>
          <?php $skills = get_user_meta($id,'skills'); ?>
          <?php for ($i = 0; $i < count($skills); $i++) : ?>
            <?php if ($i != 0): ?>
              |
            <?php endif; ?>
            <?= $skills[$i]; ?>
          <?php endfor; ?>
        </span>
      <?php endif; ?>
    </div>


    <div class="card-footer text-center">
      <a class="btn-social btn-google-plus" href="mailto:<?= esc_html($email); ?>"><i class="fa fa-envelope"></i></a>
      <?php if (get_user_meta($id,'facebook',true)): ?>
        <a class="btn-social bg-primary" href="<?= get_user_meta($id,'facebook',true); ?>"><i class="fa fa-facebook"></i></a>
      <?php endif; ?>
      <?php if (get_user_meta($id,'phone',true)): ?>
        <a class="btn-social btn-google-plus" href="tel:<?= get_user_meta($id,'phone',true); ?>"><i class="fa fa-phone"></i></a>
      <?php endif; ?>
    </div>

  </div>

  <?php
}
