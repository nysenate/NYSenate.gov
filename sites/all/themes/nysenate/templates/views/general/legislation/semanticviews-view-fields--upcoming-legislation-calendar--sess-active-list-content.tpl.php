<?php
$cal_no_array = explode(", ", $fields['field_ol_bill_cal_number']->content);
?>
<div class="c-update-block">
  <div class="l-panel-col l-panel-col--lft">
    <h4 class="c-listing--bill-num"><?php echo $fields['title']->content; ?></h4>
    <a href="#" class="c-committee-link"></a>
    <div class="c-listing--related-issues"><?php echo $fields['field_issues']->content; ?></div>
  </div><!-- .l-panel-col -->
  <div class="l-panel-col l-panel-col--ctr">
    <p class="c-press-release--descript"><?php echo $fields['field_ol_name']->content; ?></p>
    <?php
     if (isset($fields['field_ol_sponsor']->content)):
       echo $fields['field_ol_sponsor']->content;
       if (isset($fields['field_ol_add_sponsors']->content)):
         echo "<br />" . $fields['field_ol_add_sponsors']->content;
       endif;
     elseif ($fields['field_ol_sponsor_name']->content): ?>
      <br/>
      <label>Sponsor: <?php echo $fields['field_ol_sponsor_name']->content; ?></label>
    <?php endif; ?>
  </div><!-- .l-panel-col -->
  <div class="l-right-actions">
    <?php if (!isset($row->aye_count) || ((isset($row->aye_count)) && ($row->vote_year != date('Y')) && ($row->bill_in_current_session))): ?>
      <p class="c-calendar--num">
        <span class="c-calendar--num-mark">cal no. </span><?php if (isset($cal_no_array[$fields['counter']->content])) echo $cal_no_array[$fields['counter']->content]; ?>
      </p>
    <?php else: ?>
      <div class="vote-container">
        <div class="aye">
          <div
            class="vote-count"><?php echo empty($row->aye_count) ? '0' : $row->aye_count; ?></div>
          <div class="vote-label">Aye</div>
        </div>
        <div class="nay">
          <div
            class="vote-count"><?php echo empty($row->nay_count) ? '0' : $row->nay_count; ?></div>
          <div class="vote-label">Nay</div>
        </div>
      </div>
      <div class="vote-meta">
        <div class="meta-row">
          <div
            class="meta-count"><?php echo empty($row->absent_count) ? '0' : $row->absent_count; ?></div>
          <div class="meta-label">absent</div>
        </div>
        <div class="meta-row">
          <div
            class="meta-count"><?php echo empty($row->excused_count) ? '0' : $row->excused_count; ?></div>
          <div class="meta-label">excused</div>
        </div>
        <div class="meta-row">
          <div
            class="meta-count"><?php echo empty($row->abstained_count) ? '0' : $row->abstained_count; ?></div>
          <div class="meta-label">abstained</div>
        </div>
      </div>
      <div class="vote-meta">
        <div class="meta-row">
          <div class="meta-comm-referral">
            <label><?php echo $row->current_status; ?>
              :</label>
            <?php echo $row->status_date; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
