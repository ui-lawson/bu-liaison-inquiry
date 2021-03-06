<?php
/**
 * Collection of static method retrieving current settings
 *
 * @package BU_Liaison_Inquiry
 */

namespace BU\Plugins\Liaison_Inquiry;

/**
 * Settings class.
 *
 * Allows to easily retrieve saved settings.
 */
class Settings {

	const NAME               = 'bu_liaison_inquiry_options';
	const PAGE_TITLE_SETTING = 'page_title';
	const UTM_SETTINGS       = array( 'utm_source', 'utm_campaign', 'utm_content', 'utm_medium', 'utm_term' );

	/**
	 * Return an associative array of UTM parameter titles.
	 *
	 * @return array Format: [(string)'name' => (string)'title']
	 */
	public static function list_utm_titles() {
		$titles = [
			__( 'Source', 'bu_liaison_inquiry' ),
			__( 'Campaign Name', 'bu_liaison_inquiry' ),
			__( 'Content', 'bu_liaison_inquiry' ),
			__( 'Medium', 'bu_liaison_inquiry' ),
			__( 'Term', 'bu_liaison_inquiry' ),
		];
		$result = array();
		foreach ( self::UTM_SETTINGS as $index => $setting_name ) {
			$result[ $setting_name ] = $titles[ $index ];
		}
		return $result;
	}

	/**
	 * Get the option value for the given setting name or empty string
	 * if the option with this name doesn't exist.
	 *
	 * @param  string $setting_name Setting name.
	 * @return string Option value
	 */
	public static function get( $setting_name ) {
		$options = get_option( self::NAME );

		if ( ! $options ) {
			return '';
		}

		if ( ! array_key_exists( $setting_name, $options ) ) {
			return '';
		}

		return $options[ $setting_name ];
	}

	/**
	 * Return an associative array of UTM parameter field IDs.
	 *
	 * @return array Format: [(string)'name' => (string)'field ID']
	 */
	public static function list_utm_values() {
		$result = array();
		foreach ( self::UTM_SETTINGS as $index => $setting_name ) {
			$value = self::get( $setting_name );
			if ( $value ) {
				$result[ $setting_name ] = $value;
			}
		}
		return $result;
	}

	/**
	 * Return UTM page title field ID as associative array.
	 *
	 * @return array Format: [(string)'page title setting name' => (string)'field ID']
	 */
	public static function page_title_values() {
		$result                             = array();
		$result[ self::PAGE_TITLE_SETTING ] = self::get( self::PAGE_TITLE_SETTING );
		return $result;
	}
}
