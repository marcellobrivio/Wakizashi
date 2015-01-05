<?php
if (!isset($content_width)) {
    $content_width = 940;
}

if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
	add_image_size('size-XL', 958, 378, true);
    add_image_size('size-L', 638, 378, true);
	add_image_size('size-M', 318, 188, true);

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
}

// Register menu
register_nav_menus(array(
	'main-menu' => __('Main Menu', 'main-menu')
));

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist) {
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}


// Custom Options Array
$themename = "Wakizashi";
$shortname = "wakizashi";
$options = array (
	array(
		"name" => "Default colour scheme",  
		"desc" => "Select the colour scheme for Wakizashi. This will be the default skin for <i>all</i> users.",
		"id" => $shortname."_color_scheme",  
		"type" => "radio",  
		"options" => array("Bright", "Bright Gray", "Dark Gray", "Dark"),
		"std" => "Bright"
	),
	array(
		"name" => "User selectable skin",  
		"desc" => "Wakizashi includes a stylesheet selector that gives users the ability to choose their preferred skin, overriding the Colour Scheme setting above. Of course this is a client-side feature: each user can choose his <i>personal</i> skin, without affecting others. If turned on, a special panel appears on the right side of the screen.",  
		"id" => $shortname."_selectable_skin",  
		"type" => "checkbox",  
		"optext" => "Turn on user selectable skin panel",
		"std" => "0"
	),
	array(
		"name" => "Tracking Code",
		"desc" => "Paste here your tracking code (e.g. Google Analytics). It will be printed in the <head> section of every page.",
		"id" => $shortname."_google_analytics",
		"std" => "",
		"type" => "textarea"
	),
	array(
		"name" => "Autoplay",  
		"desc" => "You can set here if your videos must start playback automatically or not:",
		"id" => $shortname."_autoplay",  
		"type" => "radio",  
		"options" => array("Yes", "No"),
		"std" => "Yes"
	),
	array(
		"name" => "Google Map Embed",
		"desc" => "Enter the URL to your Google Map for the contact page. Leave this field empty if you don't need the map.",
		"id" => $shortname."_google_map",
		"std" => "https://maps.google.it/maps?q=Sunset+Blvd,+Hollywood,+Los+Angeles,+California,+Stati+Uniti&amp;aq=0&amp;oq=suset+blvd+hollywo&amp;sll=34.06105,-118.365498&amp;sspn=0.138656,0.264187&amp;t=m&amp;gl=it&amp;ie=UTF8&amp;hq=&amp;hnear=Sunset+Blvd,+Los+Angeles,+California+90046,+Stati+Uniti&amp;ll=34.106048,-118.354769&amp;spn=0.024874,0.082226&amp;z=14",
		"type" => "textarea"
	),
	array(
		"name" => "Facebook Default Thumbnail",
		"desc" => "Enter the URL of the default thumbnail to be used when your website is shared on Facebook (minimum size: 200x200 pixels).",
		"id" => $shortname."_default_image",
		"std" => get_template_directory_uri()."/screenshot.png",
		"type" => "textarea"
	),
	array(
		"name" => "Footer Info",
		"desc" => "You can write some footer stuff here (your phone, your VAT number, etc.).",
		"id" => $shortname."_footer_info",
		"std" => "You can write some footer stuff here from the theme options",
		"type" => "textarea"
	)
);

function add_custom_admin() {
    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ]) );
			}
			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) {
					update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  );
				} else {
					delete_option( $value['id'] );
				}
			}
			header("Location: themes.php?page=functions.php&saved=true");
			die;
		}
		else if ( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				delete_option( $value['id'] );
			}
			header("Location: themes.php?page=functions.php&reset=true");
			die;
        }
    }
	add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'custom_admin');
}

function custom_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
	?>

<div class="wrap">

	<div id="icon-options-general" class="icon32"><br /></div>
	<h2><?php echo $themename; ?> settings</h2>
	
	<form method="post">

	<?php 
	foreach ($options as $value) {
	?>
			
		<?php if ( $value['type'] == "textarea") { ?>
			<h3><?php echo $value['name']; ?></h3>
			<p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label></p>
			<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="large-text code" rows="5"><?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?></textarea>
		<?php } ?>
			
		<?php if ( $value['type'] == "radio") { ?>
			<h3><?php echo $value['name']; ?></h3>
			<p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label></p>
			<p>
				<?php foreach ($value['options'] as $option) { ?>
					<label><input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $option; ?>" <?php if ( get_option( $value['id'] ) == $option) { echo 'checked="checked"'; } elseif ($option == $value['std']) { echo 'checked="checked"'; } ?> /> <?php echo $option; ?></label><br />
				<?php } ?>	
			</p>
		<?php } ?>
		
		<?php if ( $value['type'] == "checkbox") { ?>
			<h3><?php echo $value['name']; ?></h3>
			<p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label></p>
			<fieldset><label for="<?php echo $value['id']; ?>"><input type="checkbox" value="1" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" <?php if ( get_option( $value['id'] ) ) { echo 'checked="checked"'; } ?>> <?php echo $value['optext']; ?></label></fieldset>
		<?php } ?>
			
	<?php
	}
	?>

	<p class="submit">
		<input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"  />
		<input type="hidden" name="action" value="save" />
	</p>
</form>
<form method="post">
	<h3>Reset To Factory Settings</h3>
	<p>Click on the button below to reset all the options to their default values.</p>
	<p class="submit">
		<input type="submit" name="reset" id="reset" class="button-primary" value="Reset" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
<?php
}
add_action('admin_menu', 'add_custom_admin');



// The following code adds the Vimeo ID box in the post editor screen
add_action( 'load-post.php', 'vimeo_id_meta_boxes_setup' );
add_action( 'load-post-new.php', 'vimeo_id_meta_boxes_setup' );

function vimeo_id_meta_boxes_setup() {
	add_action( 'add_meta_boxes', 'vimeo_add_post_meta_boxes' );
	add_action( 'save_post', 'save_vimeo_id_meta', 10, 2 );
}
function vimeo_add_post_meta_boxes() {
	add_meta_box(
		'vimeo-id',      						// Unique ID
		'Vimeo ID',								// Title
		'vimeo_id_meta_box',					// Callback function
		'post',									// Admin page (or post type)
		'side',									// Context
		'default'								// Priority
	);
}
function vimeo_id_meta_box( $object, $box ) { ?>
  <?php wp_nonce_field( basename( __FILE__ ), 'vimeo_id_nonce' ); ?>
  <p>
    <label for="vimeo-id">Set the Vimeo ID to embed a video in this post (e.g. "14114291"):</label>
    <br />
    <input class="widefat" type="text" name="vimeo-id" id="vimeo-id" value="<?php echo esc_attr( get_post_meta( $object->ID, 'vimeo-id', true ) ); ?>" size="30" />
  </p>
<?php }
function save_vimeo_id_meta( $post_id, $post ) {
  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['vimeo_id_nonce'] ) || !wp_verify_nonce( $_POST['vimeo_id_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['vimeo-id'] ) ? sanitize_html_class( $_POST['vimeo-id'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'vimeo-id';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}
?>