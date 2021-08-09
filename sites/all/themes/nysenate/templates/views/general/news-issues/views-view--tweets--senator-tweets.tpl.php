<div class="c-twitter-block-container">
  <!-- <h3 class="c-container--title">The New York State Senate on Twitter</h3> -->
  <div class="l-tweets">
    <!-- <div class="l-twitter-user">
      <div class="c-twitter--logo">
        <img src="/sites/all/themes/nysenate/images/twitter_logo60x60.png" alt="" class="c-twitter-user-image" />
      </div>
      <div class="c-twitter-user--info">
        <h3 class="c-twitter-user--name">New York Senate</h3>
        <a href="https://twitter.com/nysenate" class="c-twitter-user--link">@nysenate</a>
      </div>
      <a href="https://twitter.com/intent/follow?screen_name=@nysenate" class="c-twitter-user--follow">Follow</a>
    </div> -->
    <?php if ($exposed): ?>
      <div class="view-filters">
        <?php print $exposed; ?>
      </div>
    <?php endif; ?>

    <?php if ($header): ?>
      <div class="view-header">
        <?php print $header; ?>
      </div>
    <?php endif; ?>

    <?php if ($attachment_before): ?>
      <div class="attachment attachment-before">
        <?php print $attachment_before; ?>
      </div>
    <?php endif; ?>

    <?php if ($rows): ?>
        <?php print $rows; ?>
      </div>
    <?php elseif ($empty): ?>
      <div class="view-empty">
        <?php print $empty; ?>
      </div>
    <?php endif; ?>

    <?php if ($pager): ?>
      <?php print $pager; ?>
    <?php endif; ?>

    <?php if ($attachment_after): ?>
      <div class="attachment attachment-after">
        <?php print $attachment_after; ?>
      </div>
    <?php endif; ?>

    <?php if ($more): ?>
      <?php print $more; ?>
    <?php endif; ?>

    <?php if ($footer): ?>
      <div class="view-footer">
        <?php print $footer; ?>
      </div>
    <?php endif; ?>

    <?php if ($feed_icon): ?>
      <div class="feed-icon">
        <?php print $feed_icon; ?>
      </div>
    <?php endif; ?>
  </div>
</div>