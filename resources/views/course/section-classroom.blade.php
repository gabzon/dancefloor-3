<h3><?= __('Classroom','sage'); ?> <i class="text-muted" lang="en">(Classroom)</i></h3>

@if (count($classroom) > 0)

  <div class="row course-place">
    <div class="col-md-4">
      <table class="table table-responsive table-classroom" style="border-top:0; border-color:red;">
        <tr>
          <td width="5%"><i class="fa fa-home" aria-hidden="true"></i></td>
          <td width="95%">
            <strong>{{ $classroom[0]->name }}</strong><br>
            <?= get_term_meta($classroom[0]->term_id,'classroom_address',true); ?> ({{ get_term_meta($classroom[0]->term_id ,'classroom_quartier',true) }})<br>
            <?= get_term_meta($classroom[0]->term_id,'classroom_postal_code',true) . ', ' . get_term_meta($classroom[0]->term_id,'classroom_ville',true); ?><br>
            <a href="<?= get_term_meta($classroom[0]->term_id,'classroom_google_map_link',true); ?>" target="_blank">
              <?php _e('Open on Google maps','sage'); ?>
            </a>
          </td>
        </tr>
      </table>
      @php
      $shoes = get_term_meta($classroom[0]->term_id,'classroom_require_shoes');
      //piklist::pre($shoes);
      @endphp
      @if ($shoes[0] == 'TRUE')
        <div class="alert alert-danger" role="alert">
          <table>
            <tr>
              <td valign="top"><i class="fas fa-exclamation-circle"></i></td>
              <td>
                <strong> {{ _e('Attention','sage') }}</strong>
                <br>
                {{ __('Street shoes are not allowed in this classroom, please bring your own dancing shoes.', 'sage') }}
              </td>
            </tr>
          </table>
        </div>
      @endif
    </div>
    <div class="col-md-8 map">
      @php
      echo get_term_meta($classroom[0]->term_id,'classroom_google_map',true)
      @endphp
    </div>
  </div>
@else
  <br>
  <div class="alert alert-primary">
    {{ __('This class has no classroom yet','sage') }}
  </div>
@endif
