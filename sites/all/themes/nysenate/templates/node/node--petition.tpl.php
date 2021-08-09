<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
ctools_include('ajax');
ctools_include('modal');
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($page): ?>
    <header class="c-petition--head">
      <h1 class="nys-title"><?php print $title; ?></h1>
      <?php if (isset($content['field_senator'])): ?>
        <p class="c-news--author">
          SEN. <?php print $content['field_senator']['#object']->field_senator
          [LANGUAGE_NONE][0]['entity']->title; ?>
        </p>
      <?php elseif (isset($content['field_article_author'])): ?>
        <p class="c-news--author">
          <?php print $content['field_article_author'][0]['#markup']; ?>
        </p>
      <?php endif; ?>
      <?php if (!empty($field_date)): ?>
        <p class="c-news--pub-date">
          <?php print render($content['field_date'][0]['#markup']); ?>
        </p>
      <?php endif; ?>

      <?php if (isset($content['field_issues'])): ?>
        <ul class="nys-associated-topics">
          <?php
          $issues_single_or_plural = count
          ($content['field_issues']['#items']) > 1 ? 'ISSUES: ' : 'ISSUE: ';
          print $issues_single_or_plural;
          ?>
          <?php for ($i = 0; $i < count($content['field_issues']['#items']); $i++) : ?>
            <li><?php print render($content['field_issues'][$i]); ?></li>
          <?php endfor; ?>
        </ul>
      <?php endif; ?>

      <?php if (isset($content['field_subheading'])): ?>
        <div
          class="nys-subtitle-title"><?php print $content['field_subheading'][0]['#markup']; ?></div>
      <?php endif; ?>
    </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>


  <?php if (isset($node->field_image_main[LANGUAGE_NONE])) : ?>
    <div class="c-block c-block--img">
      <?php if (isset($field_image_main[0]['uri'])) print render($content['field_image_main']); ?>
      <?php if (!empty($node->field_image_main[LANGUAGE_NONE][0]['title'])): ?>
        <p class="c-img--caption">
          <?php print $node->field_image_main[LANGUAGE_NONE][0]['title']; ?>
        </p>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <section class="c-news--body">

    <?php if (isset($content['body'])) : ?>
      <div class="c-block">
        <?php print render($content['body']); ?>
      </div>
    <?php endif; ?>

    <?php $sign_petition_link = flag_create_link('sign_petition', $node->nid); ?>

    <?php if ($logged_in && !empty($sign_petition_link)): ?>
      <div class="c-block">
        <span
          class="c-btn--cta c-btn--cta__sign"><?php print $sign_petition_link; ?></span>
        <p class="petition-small-text">Click once to sign the petition.</p>
      </div>
    <?php else: ?>
      <div class="c-block">
        <?php if (isset($content['petition_form'])): ?>
          <div class="petition-form">
            <?php print render($content['petition_form']); ?>
          </div>
        <?php else: ?>
          <span class="c-btn--cta c-btn--cta__sign">
            <span class="flag-wrapper flag-sign-petition">
              <?php print ctools_modal_text_button(t('sign this petition'), 'registration/nojs/login', t('sign this petition'), 'ctools-modal-login-modal flag unflag-action flag-link-toggle flag-processed'); ?>
            </span>
          </span>
        <?php endif; ?>
        <p class="petition-small-text"><?php print $content['petition_login_link']; ?></p>
      </div>
    <?php endif; ?>

  </section>

  <?php if (!empty($social_buttons)): ?>
    <section>
    <?php print $social_buttons; ?>
    </section>
  <?php endif; ?>

</article>
