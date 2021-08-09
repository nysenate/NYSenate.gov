<?php
/**
 * @file semanticviews-view-fields.tpl.php
 * Default simple view template to display all the fields as a row. The template
 * outputs a full row by looping through the $fields array, printing the field's
 * HTML element (as configured in the UI) and the class attributes. If a label
 * is specified for the field, it is printed wrapped in a <label> element with
 * the same class attributes as the field's HTML element.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output
 *     safe.
 *   - $field->element_type: The HTML element wrapping the field content and
 *     label.
 *   - $field->attributes: An array of attributes for the field wrapper.
 *   - $field->handler: The Views field handler object controlling this field.
 *     Do not use var_export to dump this object, as it can't handle the
 *     recursion.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @see template_preprocess_semanticviews_view_fields()
 * @ingroup views_templates
 * @todo Justify this template. Excluding the PHP, this template outputs angle
 * brackets, the label element, slashes and whitespace.
 */

if (isset($fields['field_image_main']->content)) {
	$field_image_main = $fields['field_image_main']->content;
} else {
	$field_image_main = '';
}

?>

<article class="c-block c-block--initiative <?php echo ($field_image_main) ? 'c-block--initiative__has-img' : '' ?> lgt-bg c-block-position--<?php echo $fields['counter']->content; ?>">
	<?php if ($field_image_main): ?>
	<a href="<?php $fields['field_link_type']->content == 'external' ? print $fields['field_external_web_page']->content : print $fields['path']->content;?>">
		<?php print $field_image_main;?>
	</a>
	<?php endif;?>
	<div class="c-initiative--content">
	  <div class="c-initiative--inner">
	    <a href="<?php $fields['field_link_type']->content == 'external' ? print $fields['field_external_web_page']->content : print $fields['path']->content;?>"><h3 class="c-initiative--title"><?php echo $fields['title']->content; ?></h3></a>
	  </div>
	</div>
	<a href="<?php $fields['field_link_type']->content == 'external' ? print $fields['field_external_web_page']->content : print $fields['path']->content;?>" class="c-block--btn icon-before__<?php echo $fields['field_call_to_action_1']->content; ?> med-bg">
		<span><?php echo $fields['field_call_to_action']->content; ?></span>
	</a>
</article>