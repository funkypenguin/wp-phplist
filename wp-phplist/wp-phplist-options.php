<?php
/*
Author: David Young
Author URI: http://www.funkypenguin.co.za
Description: Administrative options for WP-PHPList

This file is the configuration options for the WP-PHPList plugin
(http://www.funkypenguin.co.za/wp-phplist)

It should be placed within your wp-content/plugins/wp-phplist directory
*/

load_plugin_textdomain('wpcf'); // NLS
$location = get_option('siteurl') . '/wp-admin/admin.php?page=wp-phplist/wp-phplist-options.php'; // Form Action URI

/*Lets add some default options if they don't exist*/

if(get_option('wp_phplist_slug') == '') {
	add_option('wp_phplist_slug', 'wp-phplist.php');
}

if(get_option('wp_phplist_spage') == '') {
	add_option('wp_phplist_spage', '1');
}
if(get_option('wp_phplist_title') == '') {
	add_option('wp_phplist_title', 'Our Newsletters');
}
if(get_option('wp_phplist_phplist_path') == '') {
	add_option('wp_phplist_phplist_path', 'lists');
}
/*check form submission and update options*/
if ('process' == $_POST['stage'])
{
update_option('wp_phplist_slug', $_POST['wp_phplist_slug']);
update_option('wp_phplist_spage', $_POST['wp_phplist_spage']);
update_option('wp_phplist_title', $_POST['wp_phplist_title']);
update_option('wp_phplist_phplist_path', $_POST['wp_phplist_phplist_path']);
}

/*Get options for form fields*/
$wp_phplist_slug = get_option('wp_phplist_slug');
$wp_phplist_spage = get_option('wp_phplist_spage');
$wp_phplist_title = get_option('wp_phplist_title');
$wp_phplist_phplist_path = get_option('wp_phplist_phplist_path');
?>

<div class="wrap"> 
  <h2><?php _e('WP-PHPList Options', 'wpcf') ?></h2> 
  <form name="form1" method="post" action="<?php echo $location ?>&amp;updated=true">
	<input type="hidden" name="stage" value="process" />
    <table width="100%" cellspacing="2" cellpadding="5" class="form-table"> 
      <tr valign="top"> 
        <th scope="row"><?php _e('PHPList public pages slug:') ?></th> 
        <td><input id="inputid" name="wp_phplist_slug" type="text" id="wp_phplist_slug" value="<?php echo $wp_phplist_slug; ?>" size="50" />
        <br />
<?php _e('The "slug" to the main PHPList page, relative to wordpress. Defaults to the name of the script. You may want to create a custom rewrite rule.', 'wpcf') ?></td> 
      </tr> 
      <tr valign="top"> 
        <th scope="row"><?php _e('PHPList default subscribe page:') ?></th> 
        <td><input id="inputid" name="wp_phplist_spage" type="text" id="wp_phplist_spage" value="<?php echo $wp_phplist_spage; ?>" size="50" />
        <br />
<?php _e('Enter the number of the default subscribe page to use, or leave blank to let PHPList generate an index', 'wpcf') ?></td> 
      </tr>   
      <tr valign="top"> 
        <th scope="row"><?php _e('PHPList embedded page title:') ?></th> 
        <td><input id="inputid" name="wp_phplist_title" type="text" id="wp_phplist_title" value="<?php echo $wp_phplist_title; ?>" size="50" />
        <br />
<?php _e('Enter the title to be displayed on the page with the embedded PHPList results', 'wpcf') ?></td> 
      </tr> 
      </tr>   
      <tr valign="top"> 
        <th scope="row"><?php _e('PHPList relative path:') ?></th> 
        <td><input id="inputid" name="wp_phplist_phplist_path" type="text" id="wp_phplist_phplist_path" value="<?php echo $wp_phplist_phplist_path; ?>" size="50" />
        <br />
<?php _e('Enter the path of your PHPList installation, relative to Wordpress', 'wpcf') ?></td> 
      </tr>       
     </table> 

	
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Update Options', 'wpcf') ?> &raquo;" />
    </p>
  </form> 
</div>