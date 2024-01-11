<?php 
/**
 * Add Theme Options
 *
 */
 
function add_appearance_menu(){
     add_theme_page('Bootstrap 386 Options', 'Theme Options', 'edit_theme_options', 'bs386-options', 'bs386_options_page'); 
}

add_action('admin_menu', 'add_appearance_menu');

function bs386_admin_init(){
	//Register Theme Settings
    register_setting( 'bs386_options', 'bs386_theme_options', 'bs386_validate_settings' );

    // Add image settings section
    add_settings_section( 'bs386_image_options', 'Image Options', 'bs386_image_options_description', 'bs386-options' );
    add_settings_field( 
		'high-contrast', 
		'Use High Contrast', 
		'bs386_checkbox', 
		'bs386-options', 
		'bs386_image_options',
		array(
			'id'			=> 'high-contrast',
			'value'			=> 'use-high-contrast',
			'description'	=> 'Images will display in higher than normal contrast, to give them a old school feel.'
		)
	);
	
	// Add animation settings section
    add_settings_section( 'bs386_animation_options', 'Animation Options', 'bs386_animation_options_description', 'bs386-options' );
    add_settings_field( 
		'fast-load', 
		'Fast Load', 
		'bs386_checkbox', 
		'bs386-options', 
		'bs386_animation_options',
		array(
			'id'			=> 'fast-load',
			'value'			=> 'true',
			'description'	=> 'When checked, it disables all animation.  The other settings in the section require Fast Load to be turned off to have effect.'
		) 
	);
	add_settings_field( 
		'one-pass', 
		'One Pass', 
		'bs386_checkbox', 
		'bs386-options', 
		'bs386_animation_options' ,
		array(
			'id'			=> 'one-pass',
			'value'			=> 'true',
			'description'	=> 'When checked this will disable the second flyby cursor.'
		)
	);
	add_settings_field( 
		'speed-factor', 
		'Speed Factor',
		 'bs386_speed_factor_select', 
		 'bs386-options', 
		 'bs386_animation_options'
	);
}
add_action( 'admin_init', 'bs386_admin_init' );


function bs386_image_options_description(){
}

function bs386_animation_options_description(){
}

function bs386_checkbox($args){
	$settings = get_option('bs386_theme_options');
	echo "<input id='".$args['id']."' name='bs386_theme_options[".$args['id']."]' value='".$args['value']."' type='checkbox' ";
	if ( isset($settings[$args['id']]) ){
		if ($settings[$args['id']] == $args['value']){
			echo "checked";
		}
	}
	echo "/>";
	echo "<p class='description'>".$args['description']."</p>" ;
}

function bs386_speed_factor_select(){
	$settings = get_option('bs386_theme_options');
	$speeds = array(
		'fastest'	=> '1.5',
		'fast'		=> '1.25',
		'regular'	=> '1',
		'slow'		=> '0.75',
		'slowest'	=> '0.5'
	);
	echo "<select id='speed-factor' name='bs386_theme_options[speed-factor]'>";
	foreach($speeds as $speed => $value){
		echo "<option value='" . $value . "' ";
		if ( isset($settings['speed-factor']) ){
			if ($settings['speed-factor'] == $value){
				echo "selected";
			}
		}
		echo ">". $speed ."</option>";
	}
	echo "</select>";
}

function bs386_options_page(){
	?>
    <div class="wrap">
      <h2>Bootstrap 386 Theme Options</h2>
      <form method="post" enctype="multipart/form-data" action="options.php">
        <?php 
        settings_fields( 'bs386_options' ); 
		do_settings_sections( 'bs386-options' );
		submit_button();
        ?>            
      </form>
    </div>
    <?php
}

function bs386_validate_settings($input){
	$options = get_option('bs386_theme_options');
	
	if ( isset($input['high-contrast']) ){
		if( $input['high-contrast'] == 'use-high-contrast' ){
			$options['high-contrast'] = 'use-high-contrast';
		}
	}else{
		$options['high-contrast'] = '';	
	}
	
	if ( isset($input['fast-load']) ){
		if( $input['fast-load'] == 'true' ){
			$options['fast-load'] = 'true';
		}
	}else{
		$options['fast-load'] = '';	
	}
	
	if ( isset($input['one-pass']) ){
		if( $input['one-pass'] == 'true' ){
			$options['one-pass'] = 'true';
		}
	}else{
		$options['one-pass'] = '';	
	}
	
	if ( isset($input['speed-factor']) ){
		if( (float)$input['speed-factor'] >= 0.5 && (float)$input['speed-factor'] <= 1.5 ){
			$options['speed-factor'] = $input['speed-factor'];
		}else{
			$options['speed-factor'] = '1';
		}
	}else{
		$options['speed-factor'] = '1';	
	}
	
	
	return $options;
}
