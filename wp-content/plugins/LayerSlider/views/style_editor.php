<?php

	if(!defined('LS_ROOT_FILE')) { 
		header('HTTP/1.0 403 Forbidden');
		exit;
	}

	// Get uploads dir
	$upload_dir = wp_upload_dir();
	$file = $upload_dir['basedir'].'/layerslider.custom.css';

	// Get contents
	$contents = file_exists($file) ? file_get_contents($file) : '';

	// Get screen options
	$lsScreenOptions = get_option('ls-screen-options', '0');
	$lsScreenOptions = ($lsScreenOptions == 0) ? array() : $lsScreenOptions;
	$lsScreenOptions = is_array($lsScreenOptions) ? $lsScreenOptions : unserialize($lsScreenOptions);

	// Defaults
	if(!isset($lsScreenOptions['showTooltips'])) {
		$lsScreenOptions['showTooltips'] = 'true';
	}
?>

<div id="ls-screen-options" class="metabox-prefs hidden">
	<div id="screen-options-wrap" class="hidden">
		<form id="ls-screen-options-form" action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
			<h5><?php _e('Show on screen', 'LayerSlider') ?></h5>
			<label>
				<input type="checkbox" name="showTooltips"<?php echo $lsScreenOptions['showTooltips'] == 'true' ? ' checked="checked"' : ''?>> <?php _e('Tooltips', 'LayerSlider') ?>
			</label>
		</form>
	</div>
	<div id="screen-options-link-wrap" class="hide-if-no-js screen-meta-toggle">
		<a href="#screen-options-wrap" id="show-settings-link" class="show-settings"><?php _e('Screen Options', 'LayerSlider') ?></a>
	</div>
</div>
<div class="wrap">

	<!-- Page title -->
	<h2>
		<?php _e('LayerSlider CSS Editor', 'LayerSlider') ?>
		<a href="?page=layerslider" class="add-new-h2"><?php _e('Back to the list', 'LayerSlider') ?></a>
	</h2>

	<!-- Error messages -->
	<?php if(isset($_GET['edited'])) : ?>
	<div class="ls-notification updated">
		<div><?php _e('Your changes has been saved!', 'LayerSlider') ?></div>
	</div>
	<?php endif; ?>
	<!-- End of error messages -->

	<!-- Editor box -->
	<div class="ls-box ls-skin-editor-box">
		<h3 class="header medium">
			<?php _e('Contents of your custom CSS file', 'LayerSlider') ?>
			<figure><span>|</span>Ctrl+Q to fold/unfold a block</figure>
		</h3>
		<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="inner">
			<input type="hidden" name="ls-user-css" value="1">
			<?php wp_nonce_field('save-user-css'); ?>
			<textarea rows="10" cols="50" name="contents" class="ls-codemirror"><?php if(!empty($contents)) {
					echo htmlentities($contents);
				} else {
					_e('/* You can type here any CSS code that will be loaded both on your admin and front-end pages.', 'LayerSlider');
					echo NL;
					_e('Let us help you by giving a few exmaple CSS classes: */', 'LayerSlider');
					echo NL . NL;
					echo '/* Front-end sliders & preview */' . NL . NL;
					echo '.ls-container { /* The slider itself */' . NL . NL . '}' .NL.NL;
					echo '.ls-slide { ' . NL  . NL . '}' . NL.NL;
					echo '.ls-slide a:hover {' . NL.TAB . 'color: blue;' . NL.TAB . 'text-decoration: underline;' . NL . '}' . NL.NL;
					echo '.ls-slide #yourID {' . NL  . NL . '}' . NL.NL;
					echo '.ls-slide .yourClass {' . NL  . NL . '}' . NL.NL;
					echo '/* Side color of 3D objects */' . NL;
					echo '.ls-3d-box div { background: #777; }' .NL;
				}?></textarea>
			<p class="footer">
				<?php if(!is_writable($upload_dir['basedir'])) { ?>
				<?php _e('You need to make your uploads folder writable before you can save your changes. See the <a href="http://codex.wordpress.org/Changing_File_Permissions" target="_blank">Codex</a> for more information.', 'LayerSlider') ?>
				<?php } else { ?>
				<button class="button-primary"><?php _e('Save changes', 'LayerSlider') ?></button>
				<?php _e('Using bad CSS code could break the appearance of your site or your sliders. Changes cannot be reverted after saving.','LayerSlider') ?>
				<?php } ?>
			</p>
		</form>
	</div>
</div>
<script type="text/javascript">
	// Screen options
	var lsScreenOptions = <?php echo json_encode($lsScreenOptions) ?>;
</script>
