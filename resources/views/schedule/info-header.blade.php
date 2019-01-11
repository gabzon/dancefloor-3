<div class="page-header">
    <div class="row">
        <div class="col"><h1>{{ get_the_title() }}</h1></div>
        <div class="col text-right">
            @if ($schedule)
                <a href="{{ esc_url( $schedule ) }}" class="f6 link grow no-underline ph3 pv2 mt3 dib bg-dark-red white hover-white" target="_blank">
                    <i class="fa fa-download" aria-hidden="true"></i> <?= __('Schedule', 'sage')?> <i lang="en">(Schedule)</i>
                </a>
            @endif
            &nbsp;
            @if ($bank_details)
                <a href="<?= esc_url($bank_details) ?>" class="f6 link grow no-underline ph3 pv2 mb2 dib bg-dark-red white hover-white" target="_blank">
                    <i class="fa fa-credit-card" aria-hidden="true"></i> <?= __('Bank details','sage'); ?> <i lang="en">(Bank details)</i>
                </a>
            @endif
        </div>
    </div>
</div>
