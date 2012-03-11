<?php
// required by wp-phplist, because it's not actually called within the context of wordpress 
error_reporting(E_ERROR);
require('../../../wp-blog-header.php');
$wp_phplist_slug = get_option('wp_phplist_slug');
$wp_phplist_title = get_option('wp_phplist_title');
$wp_phplist_spage = get_option('wp_phplist_spage');
$wp_phplist_phplist_path = get_option('wp_phplist_phplist_path');

if ($_GET['p'] == '' && $wp_phplist_spage) {
	// manipulate the get variables, but only if we're called without arguments
	$_GET['id'] = $wp_phplist_spage;
	$_GET['p'] = 'subscribe';
}

?>

<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php echo $wp_phplist_title; ?></h2>
			<div class="entry">
				
				<?	
// wp-phplist 2.10.9 - we buffer the output from phplist, then stick it into the $html variable		
ob_start();

require "../../../$wp_phplist_phplist_path/index.php";
$html = ob_get_clean();

// now we clean up the html.. the line below is essential for proper operation
$html = str_replace('/?p', "/$wp_phplist_slug?p", $html);

// these lines are optional - you may want to alter the html that phplist spits out, to fit the design of your blog
$html = str_replace('710', '450', $html);
$html = str_replace('708', '448', $html);

// print the modified html
echo $html;
?>
				
				
			</div>
		</div>
	<?php // wp-phplist: no point editing this - edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
