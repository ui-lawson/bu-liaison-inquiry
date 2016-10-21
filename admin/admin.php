<?php
/**
 * BU Liaison Inquiry Admin
 *
 * @package BU Liaison Inquiry
 */

/**
 * Register the settings option and define the settings page
 */
function bu_liaison_inquiry_settings_init() {
	// Register a new setting for "bu_liaison_inquiry" page.
	register_setting( 'bu_liaison_inquiry', 'bu_liaison_inquiry_options' );

	// Register a new section in the "bu_liaison_inquiry" page.
	add_settings_section(
		'bu_liaison_inquiry_admin_section_key',
		__( 'Enter SpectrumEMP API Key and Client ID', 'bu_liaison_inquiry' ),
		'bu_liaison_inquiry_admin_section_key_callback',
		'bu_liaison_inquiry'
	);

	// Register a new field in the "bu_liaison_inquiry_admin_section_key" section, inside the "bu_liaison_inquiry" page.
	add_settings_field(
		'APIKey',
		__( 'API Key', 'bu_liaison_inquiry' ),
		'bu_liaison_inquiry_field_APIKey_callback',
		'bu_liaison_inquiry',
		'bu_liaison_inquiry_admin_section_key',
		array( 'label_for' => 'APIKey', 'class' => 'bu_liaison_inquiry_row', 'bu_liaison_inquiry_custom_data' => 'custom' )
	);

	// Register the ClientID field.
	add_settings_field(
		'ClientID',
		__( 'Client ID', 'bu_liaison_inquiry' ),
		'bu_liaison_inquiry_field_ClientID_callback',
		'bu_liaison_inquiry',
		'bu_liaison_inquiry_admin_section_key',
		array( 'label_for' => 'ClientID', 'class' => 'bu_liaison_inquiry_row', 'bu_liaison_inquiry_custom_data' => 'custom' )
	);
}

/**
 * Initialize the admin settings
 */
add_action( 'admin_init', 'bu_liaison_inquiry_settings_init' );

/**
 * Outputs a section header for the admin page, called by add_settings_section()
 *
 * @param array $args Contains keys for title, id, callback.
 */
function bu_liaison_inquiry_admin_section_key_callback( $args ) {
	echo "<p id='". esc_attr( $args['id'] ) . "'>" . esc_html__( 'Set the parameters for your organization to fetch the correct form.', 'bu_liaison_inquiry' ) . '</p>';
}

/**
 * Outputs the form field for the API Key, called by add_settings_field()
 *
 * @param array $args Contains keys for label_for, class, bu_liaison_inquiry_custom_data.
 */
function bu_liaison_inquiry_field_apikey_callback( $args ) {
	// Get the value of the setting registered with register_setting().
	$options = get_option( 'bu_liaison_inquiry_options' );

	// Output the field.
?>
	<input type="text" size="50" id="<?php echo esc_attr( $args['label_for'] ); ?>"
			data-custom="<?php echo esc_attr( $args['bu_liaison_inquiry_custom_data'] ); ?>"
			name="bu_liaison_inquiry_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
			value="<?php echo esc_html( $options['APIKey'] ); ?>"
	>

	<p class="description">
		<?php echo esc_html( 'The API Key allows access to SpectrumEMP.', 'bu_liaison_inquiry' ); ?>
	</p>


	<?php
}

/**
 * Outputs the form field for the Client ID, called by add_settings_field()
 *
 * @param array $args Contains keys for label_for, class, bu_liaison_inquiry_custom_data.
 */
function bu_liaison_inquiry_field_clientid_callback( $args ) {
	// Get the value of the setting registered with register_setting().
	$options = get_option( 'bu_liaison_inquiry_options' );

	// Output the field.
?>
	<input type="text" size="10" id="<?php echo esc_attr( $args['label_for'] ); ?>"
			data-custom="<?php echo esc_attr( $args['bu_liaison_inquiry_custom_data'] ); ?>"
			name="bu_liaison_inquiry_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
			value="<?php echo esc_html( $options['ClientID'] ); ?>"
	>

	<p class="description">
		<?php echo esc_html( 'The Client ID specifies the organizational account.', 'bu_liaison_inquiry' ); ?>
	</p>


	<?php
}
/**
 * Create an admin page.
 */
function bu_liaison_inquiry_options_page() {

	add_submenu_page(
		'tools.php',
		'Liaison API Keys',
		'Liaison API Keys',
		'manage_options',
		'bu_liaison_inquiry',
		'bu_liaison_inquiry_options_page_html'
	);
}

/**
 * Register the page in the admin menu.
 */
add_action( 'admin_menu', 'bu_liaison_inquiry_options_page' );

/**
 * Outputs the form on the admin page using the defined actions.
 */
function bu_liaison_inquiry_options_page_html() {
	// Check user capabilities.
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Add status messages.
	// Wordpress will add the "settings-updated" $_GET parameter to the url.
	if ( isset( $_GET['settings-updated'] ) ) {
		// Add settings saved message with the class of "updated".
		add_settings_error( 'bu_liaison_inquiry_messages', 'bu_liaison_inquiry_message', __( 'Settings Saved', 'bu_liaison_inquiry' ), 'updated' );
	}

	// Show status messages.
	settings_errors( 'bu_liaison_inquiry_messages' );
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			// Output security fields for the registered setting.
			settings_fields( 'bu_liaison_inquiry' );
			// Output setting sections and their fields.
			// (sections are registered for "bu_liaison_inquiry", each field is registered to a specific section).
			do_settings_sections( 'bu_liaison_inquiry' );
			// Output save settings button.
			submit_button( 'Save Settings' );
	        ?>
	    </form>
	</div>
	<?php
}