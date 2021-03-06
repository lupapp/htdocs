<?php
/**
 *
 * comments_4.php
 *
 * The custom comments template. Used to display post or page comments and comment form.
 * 
 */
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments_4.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die('Please do not load this page directly. Thanks!');
if (!function_exists('theme_comment_4')){
	function theme_comment_4($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type) {
			case '' : ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<div id="comment-<?php comment_ID() ?>">
    <div class=" bd-comment-4 <?php echo $comment->comment_type ?>">
        <div class=" bd-layoutcontainer-21">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class=" 
 col-md-2">
    <div class="bd-layoutcolumn-47"><div class="bd-vertical-align-wrapper"><div class=" bd-commentavatar-4">
    <?php echo theme_get_avatar(array('class' => ' bd-imagestyles'), true);  ?>
</div></div></div>
</div>
	
		<div class=" 
 col-md-22">
    <div class="bd-layoutcolumn-48"><div class="bd-vertical-align-wrapper"><div class=" bd-commentmetadata-4 comment-meta commentmetadata">
    <?php printf(__('%s on ', THEME_NS), get_comment_author_link($comment->comment_ID)); ?>
    <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s at %2$s', THEME_NS), get_comment_date(), get_comment_time()); ?></a>
    <?php edit_comment_link(__('(Edit)', THEME_NS)); ?>
</div>
	
		<div class=" bd-commenttext-4 comment-body">
    <?php if ($comment->comment_approved == '0') : ?><em><?php _e('Your comment is awaiting moderation.', THEME_NS); ?></em><br /><?php endif; ?>
    <?php comment_text(); ?>
</div>
	
		<?php
if (!function_exists('theme_comment_reply_link_filter_4')) {
    function theme_comment_reply_link_filter_4($link) {
        return str_replace('class=\'', 'class=\' bd-button ', $link);
    }
}
?>
<div class=" bd-commentreply-4 reply">
<?php
    add_filter('comment_reply_link', 'theme_comment_reply_link_filter_4');
    comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
    remove_filter('comment_reply_link', 'theme_comment_reply_link_filter_4');
    ?>
</div></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
</div><?php
			break;
			case 'pingback' :
			case 'trackback' : ?>
<li class="post <?php echo $comment->comment_type ?>">
	<?php _e('Pingback:', THEME_NS); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', THEME_NS), ' ');
			break;
		}
	}
}
?>
<div class=" bd-comments-4">
	<div class="bd-container-inner">
	<?php if (post_password_required()) { ?>
		<div class=" bd-container-24 bd-tagstyles nocomments">
		<h2><?php _e('This post is password protected. Enter the password to view any comments.', THEME_NS) ?></h2>
		</div><?php
	} else {
		if (have_comments()) { ?>
			<div class=" bd-container-24 bd-tagstyles comments">
				<h2><?php printf(
						_n('One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), THEME_NS),
						number_format_i18n(get_comments_number()),
						get_the_title()
					); ?></h2>
			</div>
			<ul id="comments-list">
			<?php wp_list_comments('type=all&callback=theme_comment_4'); ?>
			</ul><?php
		}
		if (comments_open()) {
			?><?php
    if (!function_exists('theme_comment_form_defaults_filter_4')){
        function theme_comment_form_defaults_filter_4($defaults) {
            foreach(array('must_log_in', 'logged_in_as', 'comment_notes_before') as $key) {
                $defaults[$key] = str_replace('<p class="', '<label class=" bd-bootstraplabel ', $defaults[$key]);
                $defaults[$key] = str_replace('</p>', '</label>', $defaults[$key]);
            }
            $defaults['comment_notes_after'] = '<p class="form-allowed-tags">'
                . sprintf('<label class=" bd-bootstraplabel">' . __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ) . '</label>', ' <code>' . allowed_tags() . '</code>')
                . '</p>';
            return $defaults;
        }
        add_filter('comment_form_defaults', 'theme_comment_form_defaults_filter_4');
    }

    if (theme_get_option('theme_comment_use_smilies') && !function_exists('theme_comment_form_field_comment')) {
        function theme_comment_form_field_comment($form_field) {
            theme_include_lib('smiley.php');
            return theme_get_smilies_js() . '<p class="smilies">' . theme_get_smilies() . '</p>' . $form_field;
        }
        add_filter('comment_form_field_comment', 'theme_comment_form_field_comment');
    }
    ob_start();
    comment_form();
    echo str_replace(
        array(
            '<label',
            'class="comment-respond',
            '<h3',
            '</h3>',
            'type="text"',
            '<textarea',
            'type="submit"'
        ),
        array(
            '<label class=" bd-bootstraplabel"',
            'class="comment-respond  bd-commentsform-4',
            '<div class=" bd-container-25 bd-tagstyles"><h2',
            '</h2></div>',
            'type="text" class=" bd-bootstrapinput form-control"',
            '<textarea class=" bd-bootstrapinput form-control"',
            'class=" bd-button" type="submit"'
        ),
        ob_get_clean()
    );
?><?php
		}
	} ?>
	</div>
</div>