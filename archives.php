<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2><?php the_title(); ?></h2>
		<div class="info clearfix">
			<span class="date"><?php the_modified_date(); ?></span>
			<?php edit_post_link(__('Edit', 'inove'), '<span class="editpost">', '</span>'); ?>
			<?php if(comments_open()) : ?>
				<span class="addcomment"><a href="#respond"><?php _e('Leave a comment', 'inove'); ?></a></span>
				<span class="comments"><a href="#comments"><?php _e('Go to comments', 'inove'); ?></a></span>
			<?php endif; ?>
		</div>
		<div class="content">
			<?php
				if(function_exists('wp_easyarchives')) {
					wp_easyarchives();
				} else {
					echo '<ul>';
					wp_get_archives('type=monthly&show_post_count=1');
					echo '</ul>';
				}
			?>
		</div>
	</div>

	<?php comments_template('', true); ?>

<?php else : ?>
	<div class="errorbox">
		<?php _e('Sorry, no posts matched your criteria.', 'inove'); ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
