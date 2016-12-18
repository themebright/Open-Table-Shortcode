<?php
/**
 * Admin
 */

( defined( 'ABSPATH' ) || is_admin() ) || exit;

/**
 * Register admin scripts.
 */
function ots_admin_assets() {

	wp_register_script(
		'ots-admin',
		esc_url( OTS_URL . 'open-table-shortcode/assets/js/admin.js' ),
		array( 'jquery' ),
		OTS_VERSION,
		true
	);

}
add_action( 'admin_enqueue_scripts', 'ots_admin_assets' );

/**
 * Shortcode insert button.
 */
function ots_insert_button() {

	// Enqueue ThickBox styles and scripts
	add_thickbox();

	// Enqueue OTS admin JS
	wp_enqueue_script( 'ots-admin' );

	?>

	<a href="#TB_inline&inlineId=ots-modal" class="button thickbox" data-editor="content"><span class="wp-media-buttons-icon dashicons dashicons-feedback"></span> <?php esc_html_e( 'Insert Open Table Widget', 'open-table-widget' ); ?></a>

	<?php

}
add_action( 'media_buttons', 'ots_insert_button' );

/**
 * Shortcode generator modal.
 */
function ots_modal() {

	// Save allowed markup for radio labels
	$allowed_label_markup = array( 'em' => array(), 'strong' => array() );

	?>

	<div id="ots-modal" style="display: none;">
		<h2><?php echo esc_html_x( 'Insert Open Table Widget', 'widget config modal heading', 'open-table-shortcode' ); ?></h2>
		<p><?php esc_html_e( 'Use the form below to configure your Open Table Widget.', 'open-table-shortcode' ); ?></p>

		<table id="ots-form" class="form-table">
			<tbody>
				<tr>
					<th scope="row"><?php echo esc_html_x( 'Restaurant ID', 'widget restaurant heading', 'open-table-shortcode' ); ?></th>

					<td>
						<input type="text" id="ots-restaurant-id" class="regular-text" value="">
					</td>
				</tr>

				<tr>
					<th scope="row"><?php echo esc_html_x( 'Language', 'widget language heading', 'open-table-shortcode' ); ?></th>

					<td>
						<select id="ots-language">
							<option value="en" selected>English</option>
							<option value="fr">Français</option>
							<option value="es">Español</option>
							<option value="de">Deutsch</option>
							<option value="ja">日本語</option>
						</select>
					</td>
				</tr>

				<tr>
					<th scope="row"><?php echo esc_html_x( 'Type', 'widget type heading', 'open-table-shortcode' ); ?></th>

					<td>
						<fieldset id="ots-type">
							<legend class="screen-reader-text"><?php echo esc_html_x( 'Type', 'widget type heading', 'open-table-shortcode' ); ?></legend>

							<label>
								<input type="radio" name="ots-type" value="standard" checked>

								<?php echo wp_kses(
									_x( '<strong>Standard</strong> (224&times;289 pixels)', 'standard widget type label', 'open-table-shortcode' ),
									$allowed_label_markup
								); ?>
							</label>

							<br>

							<label>
								<input type="radio" name="ots-type" value="tall">

								<?php echo wp_kses(
									_x( '<strong>Tall</strong> (280&times;477 pixels)', 'tall widget type label', 'open-table-shortcode' ),
									$allowed_label_markup
								); ?>
							</label>

							<br>

							<label>
								<input type="radio" name="ots-type" value="wide">

								<?php echo wp_kses(
									_x( '<strong>Wide</strong> (832&times;154 pixels)', 'wide widget type label', 'open-table-shortcode' ),
									$allowed_label_markup
								); ?>
							</label>

							<br>

							<label>
								<input type="radio" name="ots-type" value="button">

								<?php echo wp_kses(
									_x( '<strong>Button</strong> (210&times;106 pixels)', 'button widget type label', 'open-table-shortcode' ),
									$allowed_label_markup
								); ?>
							</label>
						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>

		<p><button id="ots-insert" class="button button-primary"><?php echo esc_html_x( 'Insert Shortcode', 'insert shortcode button label', 'open-table-shortcode' ); ?></button></p>
	</div>

	<?php

}
add_action( 'admin_footer', 'ots_modal' );
