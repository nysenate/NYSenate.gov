<div class="c-block c-block-search-result">
  <div class="l-col l-col-1-of-2">
    <div class="c-search-result--title">
      Video
    </div>
    <div class="c-search-result--topic">
    <?php print drupal_render($content['field_issues']); ?>
    </div>
  </div>
  <div class="l-col l-col-2-of-2">
  	<div class="c-search-result--descript">
    	<?php print drupal_render($content['title']); ?>
   	</div>
    <div class="c-search-result--date">
    <?php if(isset($node->field_date[LANGUAGE_NONE][0]['value']) && $node->field_date[LANGUAGE_NONE][0]['value']):?>
      <?php print drupal_render($content['field_date']); ?>
    <?php endif; ?>
    <?php if(isset($node->field_senator[LANGUAGE_NONE][0]['target_id']) && $node->field_senator[LANGUAGE_NONE][0]['target_id']):?>
        <?php print '| <span>Senator </span>' .drupal_render($content['field_senator']); ?>
    <?php endif; ?>
    <?php if(isset($node->field_author[LANGUAGE_NONE][0]['value']) && $node->field_author[LANGUAGE_NONE][0]['value']):?>
        <?php print '| <span>Author </span>' .drupal_render($content['field_senator']); ?>
    <?php endif; ?>
    <?php if($node->type == 'senator'):?>
      <?php echo drupal_render($content['field_party']); ?>
      <?php echo drupal_render($content['field_confenrence']); ?>
      <?php echo nys_utils_get_senator_district($node->nid) . '&nbsp;Senate District'; ?>
    <?php endif; ?>
    </div>
  </div>
</div>