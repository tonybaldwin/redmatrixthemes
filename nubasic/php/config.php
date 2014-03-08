<?php

function theme_content(&$a) {
	if(!local_user()) { return;}

	$arr = array();

	$arr['schema'] = get_pconfig(local_user(),'nubasic', 'schema' );
    $arr['narrow_navbar'] = get_pconfig(local_user(),'nubasic', 'narrow_navbar' );
	$arr['nav_bg'] = get_pconfig(local_user(),'nubasic', 'nav_bg' );
	$arr['nav_gradient_top'] = get_pconfig(local_user(),'nubasic', 'nav_gradient_top' );
	$arr['nav_gradient_bottom'] = get_pconfig(local_user(),'nubasic', 'nav_gradient_bottom' );
	$arr['nav_active_gradient_top'] = get_pconfig(local_user(),'nubasic', 'nav_active_gradient_top' );
	$arr['nav_active_gradient_bottom'] = get_pconfig(local_user(),'nubasic', 'nav_active_gradient_bottom' );
	$arr['nav_bd'] = get_pconfig(local_user(),'nubasic', 'nav_bd' );
	$arr['nav_icon_colour'] = get_pconfig(local_user(),'nubasic', 'nav_icon_colour' );
	$arr['nav_active_icon_colour'] = get_pconfig(local_user(),'nubasic', 'nav_active_icon_colour' );
	$arr['link_colour'] = get_pconfig(local_user(),'nubasic', 'link_colour' );
	$arr['banner_colour'] = get_pconfig(local_user(),'nubasic', 'banner_colour' );
	$arr['bgcolour'] = get_pconfig(local_user(),'nubasic', 'background_colour' );
	$arr['background_image'] = get_pconfig(local_user(),'nubasic', 'background_image' );
	$arr['item_colour'] = get_pconfig(local_user(),'nubasic', 'item_colour' );
	$arr['item_opacity'] = get_pconfig(local_user(),'nubasic', 'item_opacity' );
	$arr['toolicon_colour'] = get_pconfig(local_user(),'nubasic','toolicon_colour');
	$arr['toolicon_activecolour'] = get_pconfig(local_user(),'nubasic','toolicon_activecolour');
	$arr['font_size'] = get_pconfig(local_user(),'nubasic', 'font_size' );
	$arr['body_font_size'] = get_pconfig(local_user(),'nubasic', 'body_font_size' );
	$arr['font_colour'] = get_pconfig(local_user(),'nubasic', 'font_colour' );
	$arr['radius'] = get_pconfig(local_user(),'nubasic', 'radius' );
	$arr['shadow'] = get_pconfig(local_user(),'nubasic', 'photo_shadow' );
	$arr['converse_width']=get_pconfig(local_user(),"nubasic","converse_width");
	$arr['nav_min_opacity']=get_pconfig(local_user(),"nubasic","nav_min_opacity");
	$arr['top_photo']=get_pconfig(local_user(),"nubasic","top_photo");
	$arr['reply_photo']=get_pconfig(local_user(),"nubasic","reply_photo");
	return nubasic_form($a, $arr);
}

function theme_post(&$a) {
	if(!local_user()) { return;}

	if (isset($_POST['nubasic-settings-submit'])) {
		set_pconfig(local_user(), 'nubasic', 'schema', $_POST['nubasic_schema']);
		set_pconfig(local_user(), 'nubasic', 'narrow_navbar', $_POST['nubasic_narrow_navbar']);
		set_pconfig(local_user(), 'nubasic', 'nav_bg', $_POST['nubasic_nav_bg']);
		set_pconfig(local_user(), 'nubasic', 'nav_gradient_top', $_POST['nubasic_nav_gradient_top']);
		set_pconfig(local_user(), 'nubasic', 'nav_gradient_bottom', $_POST['nubasic_nav_gradient_bottom']);
		set_pconfig(local_user(), 'nubasic', 'nav_active_gradient_top', $_POST['nubasic_nav_active_gradient_top']);
		set_pconfig(local_user(), 'nubasic', 'nav_active_gradient_bottom', $_POST['nubasic_nav_active_gradient_bottom']);
		set_pconfig(local_user(), 'nubasic', 'nav_bd', $_POST['nubasic_nav_bd']);
		set_pconfig(local_user(), 'nubasic', 'nav_icon_colour', $_POST['nubasic_nav_icon_colour']);
		set_pconfig(local_user(), 'nubasic', 'nav_active_icon_colour', $_POST['nubasic_nav_active_icon_colour']);
		set_pconfig(local_user(), 'nubasic', 'link_colour', $_POST['nubasic_link_colour']);
		set_pconfig(local_user(), 'nubasic', 'background_colour', $_POST['nubasic_background_colour']);
		set_pconfig(local_user(), 'nubasic', 'banner_colour', $_POST['nubasic_banner_colour']);
		set_pconfig(local_user(), 'nubasic', 'background_image', $_POST['nubasic_background_image']);
		set_pconfig(local_user(), 'nubasic', 'item_colour', $_POST['nubasic_item_colour']);
		set_pconfig(local_user(), 'nubasic', 'item_opacity', $_POST['nubasic_item_opacity']);
		set_pconfig(local_user(), 'nubasic', 'toolicon_colour', $_POST['nubasic_toolicon_colour']);
		set_pconfig(local_user(), 'nubasic', 'toolicon_activecolour', $_POST['nubasic_toolicon_activecolour']);
		set_pconfig(local_user(), 'nubasic', 'font_size', $_POST['nubasic_font_size']);
		set_pconfig(local_user(), 'nubasic', 'body_font_size', $_POST['nubasic_body_font_size']);
		set_pconfig(local_user(), 'nubasic', 'font_colour', $_POST['nubasic_font_colour']);
		set_pconfig(local_user(), 'nubasic', 'radius', $_POST['nubasic_radius']);
		set_pconfig(local_user(), 'nubasic', 'photo_shadow', $_POST['nubasic_shadow']);
		set_pconfig(local_user(), 'nubasic', 'converse_width', $_POST['nubasic_converse_width']);
		set_pconfig(local_user(), 'nubasic', 'nav_min_opacity', $_POST['nubasic_nav_min_opacity']);
		set_pconfig(local_user(), 'nubasic', 'top_photo', $_POST['nubasic_top_photo']);
		set_pconfig(local_user(), 'nubasic', 'reply_photo', $_POST['nubasic_reply_photo']);
	}
}



function nubasic_form(&$a, $arr) {
	$scheme_choices = array();
	$scheme_choices["---"] = t("Default");
	$files = glob('view/theme/nubasic/schema/*.php');
	if($files) {
		foreach($files as $file) {
			$f = basename($file, ".php");
			$scheme_name = $f;
			$scheme_choices[$f] = $scheme_name;
		}
	}

if(feature_enabled(local_user(),'expert')) 
				$expert = 1;
					
	  $t = get_markup_template('theme_settings.tpl');
	  $o .= replace_macros($t, array(
		'$submit' => t('Submit'),
		'$baseurl' => $a->get_baseurl(),
		'$expert' => $expert,
		'$title' => t("Theme settings"),
		'$schema' => array('nubasic_schema', t('Set scheme'), $arr['schema'], '', $scheme_choices),
		'$narrow_navbar' => array('nubasic_narrow_navbar',t('Narrow navbar'),$arr['narrow_navbar']),		
		'$nav_bg' => array('nubasic_nav_bg', t('Navigation bar background colour'), $arr['nav_bg']),
		'$nav_gradient_top' => array('nubasic_nav_gradient_top', t('Navigation bar gradient top colour'), $arr['nav_gradient_top']),
		'$nav_gradient_bottom' => array('nubasic_nav_gradient_bottom', t('Navigation bar gradient bottom colour'), $arr['nav_gradient_bottom']),
		'$nav_active_gradient_top' => array('nubasic_nav_active_gradient_top', t('Navigation active button gradient top colour'), $arr['nav_active_gradient_top']),
		'$nav_active_gradient_bottom' => array('nubasic_nav_active_gradient_bottom', t('Navigation active button gradient bottom colour'), $arr['nav_active_gradient_bottom']),
		'$nav_bd' => array('nubasic_nav_bd', t('Navigation bar border colour '), $arr['nav_bd']),
		'$nav_icon_colour' => array('nubasic_nav_icon_colour', t('Navigation bar icon colour '), $arr['nav_icon_colour']),
		'$nav_active_icon_colour' => array('nubasic_nav_active_icon_colour', t('Navigation bar active icon colour '), $arr['nav_active_icon_colour']),
		'$link_colour' => array('nubasic_link_colour', t('link colour'), $arr['link_colour'], '', $link_colours),
		'$banner_colour' => array('nubasic_banner_colour', t('Set font-colour for banner'), $arr['banner_colour']),
		'$bgcolour' => array('nubasic_background_colour', t('Set the background colour'), $arr['bgcolour']),
		'$background_image' => array('nubasic_background_image', t('Set the background image'), $arr['background_image']),
		'$item_colour' => array('nubasic_item_colour', t('Set the background colour of items'), $arr['item_colour']),
		'$item_opacity' => array('nubasic_item_opacity', t('Set the opacity of items'), $arr['item_opacity']),
		'$toolicon_colour' => array('nubasic_toolicon_colour',t('Set the basic colour for item icons'),$arr['toolicon_colour']),
		'$toolicon_activecolour' => array('nubasic_toolicon_activecolour',t('Set the hover colour for item icons'),$arr['toolicon_activecolour']),
		'$body_font_size' => array('nubasic_body_font_size', t('Set font-size for the entire application'), $arr['body_font_size']),
		'$font_size' => array('nubasic_font_size', t('Set font-size for posts and comments'), $arr['font_size']),
		'$font_colour' => array('nubasic_font_colour', t('Set font-colour for posts and comments'), $arr['font_colour']),
		'$radius' => array('nubasic_radius', t('Set radius of corners'), $arr['radius']),
		'$shadow' => array('nubasic_shadow', t('Set shadow depth of photos'), $arr['shadow']),
		'$converse_width' => array('nubasic_converse_width',t('Set maximum width of conversation regions'),$arr['converse_width']),
		'$nav_min_opacity' => array('nubasic_nav_min_opacity',t('Set minimum opacity of nav bar - to hide it'),$arr['nav_min_opacity']),
		'$top_photo' => array('nubasic_top_photo', t('Set size of conversation author photo'), $arr['top_photo']),
		'$reply_photo' => array('nubasic_reply_photo', t('Set size of followup author photos'), $arr['reply_photo']),
		));

	return $o;
}
