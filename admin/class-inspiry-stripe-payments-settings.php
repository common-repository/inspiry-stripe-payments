<?php
/**
 * Inspiry Stripe Payments Settings.
 *
 * This class is used to initialize the settings page of this plugin.
 *
 * @since      1.1.0
 * @package    inspiry-stripe-payments
 * @subpackage inspiry-stripe-payments/admin
 */

if ( ! class_exists( 'Inspiry_Stripe_Payments_Settings' ) ) {
	/**
	 * Inspiry_Stripe_Payments_Settings
	 *
	 * Class for Inspiry Stripe Payments Settings. It is
	 * responsible for handling the settings page of the
	 * plugin.
	 *
	 * @since 1.1.0
	 */
	class Inspiry_Stripe_Payments_Settings {
		/**
		 * Add plugin settings page menu to the dashboard settings menu.
		 *
		 * @since  1.1.0
		 */
		public function settings_page_menu() {

			add_submenu_page(
				'easy-real-estate',
				esc_html__( 'Stripe Settings', 'inspiry-stripe-payments' ),
				esc_html__( 'Stripe Settings', 'inspiry-stripe-payments' ),
				'manage_options',
				'inspiry-stripe-payments-settings',
				array( $this, 'render_settings_page' )
			);
		}

		/**
		 * Render settings on the settings page.
		 *
		 * @since  1.1.0
		 */
		public function render_settings_page() {
			$isp_settings = get_option( 'isp_settings' );
			?>
            <div id="realhomes-settings-wrap">
                <form action='options.php' method='post'>
                    <header class="settings-header">
                        <h1><?php esc_html_e( 'RealHomes Stripe Payments Settings', 'inspiry-stripe-payments' ); ?><span class="current-version-tag"><?php echo INSPIRY_STRIPE_PAYMENTS_VERSION; ?></span></h1>
                        <p class="credit">
                            <a class="logo-wrap" href="https://themeforest.net/item/real-homes-wordpress-real-estate-theme/5373914?aid=inspirythemes" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" height="29" width="29" viewBox="0 0 36 41">
                                    <style>
                                        .a {
                                            fill: #4E637B;
                                        }
                                        .b {
                                            fill: white;
                                        }
                                        .c {
                                            fill: #27313D !important;
                                        }
                                    </style><g>
                                        <path d="M25.5 14.6C28.9 16.6 30.6 17.5 34 19.5L34 11.1C34 10.2 33.5 9.4 32.8 9 30.1 7.5 28.4 6.5 25.5 4.8L25.5 14.6Z" class="a"></path>
                                        <path d="M15.8 38.4C16.5 38.8 17.4 38.8 18.2 38.4 20.8 36.9 22.5 35.9 25.5 34.2 22.1 32.2 20.4 31.3 17 29.3 13.6 31.3 11.9 32.2 8.5 34.2 11.5 35.9 13.1 36.9 15.8 38.4" mask="url(#mask-2)" class="a"></path>
                                        <path d="M24.3 25.1C25 24.7 25.5 23.9 25.5 23L25.5 14.6 17 19.5 17 29.3 24.3 25.1Z" fill="#C8ED1E"></path>
                                        <path d="M18.2 10.4C17.4 10 16.5 10 15.8 10.4L8.5 14.6 17 19.5 25.5 14.6 18.2 10.4Z" fill="#F9FAF8"></path>
                                        <path d="M8.5 23C8.5 23.9 8.9 24.7 9.7 25.1L17 29.3 17 19.5 8.5 14.6 8.5 23Z" fill="#88B2D7"></path>
                                        <path d="M8.5 14.6C5.1 16.6 3.4 17.5 0 19.5L0 11.1C0 10.2 0.5 9.4 1.2 9 3.8 7.5 5.5 6.5 8.5 4.8L8.5 14.6Z" mask="url(#mask-4)" class="a"></path>
                                        <path d="M34 27.9L34 19.5 25.5 14.6 25.5 23C25.5 23.4 25.4 23.8 25.1 24.2L33.6 29.1C33.8 28.7 34 28.3 34 27.9" fill="#5E9E2D"></path>
                                        <path d="M25.1 24.2C24.9 24.6 24.6 24.9 24.3 25.1L17 29.3 25.5 34.2 32.8 30C33.1 29.8 33.4 29.5 33.6 29.1L25.1 24.2Z" fill="#6FBF2C"></path>
                                        <path d="M17 10.1C17.4 10.1 17.8 10.2 18.2 10.4L25.5 14.6 25.5 4.8 18.2 0.6C17.8 0.4 17.4 0.3 17 0.3L17 10.1Z" fill="#BDD2E1"></path>
                                        <path d="M1.2 30L8.5 34.2 17 29.3 9.7 25.1C9.3 24.9 9 24.6 8.8 24.2L0.3 29.1C0.5 29.5 0.8 29.8 1.2 30" fill="#418EDA"></path>
                                        <path d="M8.8 24.2C8.6 23.8 8.5 23.4 8.5 23L8.5 14.6 0 19.5 0 27.9C0 28.3 0.1 28.7 0.3 29.1L8.8 24.2Z" fill="#3570AA"></path>
                                        <path d="M15.8 0.6L8.5 4.8 8.5 14.6 15.8 10.4C16.2 10.2 16.6 10.1 17 10.1L17 0.3C16.6 0.3 16.2 0.4 15.8 0.6" fill="#A7BAC8"></path>
                                    </g>
                                </svg>InspiryThemes
                            </a>
                        </p>
                    </header>
                    <div class="settings-content">
						<?php settings_errors(); ?>
                        <div class="form-wrapper">
	                        <?php settings_fields( 'isp_settings_group' ); ?>
                            <table class="form-table">
                                <tbody>
                                <tr>
                                    <th scope="row">
				                        <?php esc_html_e( 'Stripe Payments', 'inspiry-stripe-payments' ); ?>
                                    </th>
                                    <td>
				                        <?php
				                        $enable_stripe = ! empty( $isp_settings['enable_stripe'] ) ? $isp_settings['enable_stripe'] : '';
				                        ?>
                                        <input id="isp_settings[enable_stripe]" name="isp_settings[enable_stripe]" type="checkbox" value="1" <?php checked( 1, $enable_stripe ); ?> />
                                        <label for="isp_settings[enable_stripe]"><?php esc_html_e( 'Enable Stripe Payments for Submitted Property.', 'inspiry-stripe-payments' ); ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
				                        <?php esc_html_e( 'Publishable Key*', 'inspiry-stripe-payments' ); ?>
                                    </th>
                                    <td>
				                        <?php $publishable_key = ! empty( $isp_settings['publishable_key'] ) ? $isp_settings['publishable_key'] : ''; ?>
                                        <input id="isp_settings[publishable_key]" name="isp_settings[publishable_key]" type="text" class="regular-text" value="<?php echo esc_attr( $publishable_key ); ?>"/>
                                        <p class="description"><?php printf( esc_html__( 'Paste your account publishable key here. For help consult %1sAPI Keys%2s.', 'inspiry-stripe-payments' ), '<a href="https://stripe.com/docs/keys" target="_blank">', '</a>'  ); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
				                        <?php esc_html_e( 'Secret Key*', 'inspiry-stripe-payments' ); ?>
                                    </th>
                                    <td>
				                        <?php $secret_key = ! empty( $isp_settings['secret_key'] ) ? $isp_settings['secret_key'] : ''; ?>
                                        <input id="isp_settings[secret_key]" name="isp_settings[secret_key]" type="text" class="regular-text" value="<?php echo esc_attr( $secret_key ); ?>"/>
                                        <p class="description"><?php esc_html_e( 'Paste your account secret key here.', 'inspiry-stripe-payments' ); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
				                        <?php esc_html_e( 'Currency Code*', 'inspiry-stripe-payments' ); ?>
                                    </th>
                                    <td>
				                        <?php $currency_code = ! empty( $isp_settings['currency_code'] ) ? $isp_settings['currency_code'] : ''; ?>
                                        <input id="isp_settings[currency_code]" name="isp_settings[currency_code]" class="regular-text" type="text" value="<?php echo esc_attr( $currency_code ); ?>"/>
                                        <p class="description">
                                            <?php esc_html_e( 'Provide currency code that you want to use. Example: USD', 'inspiry-stripe-payments' ); ?><br />
                                            <?php printf( esc_html__( 'For details check %1sStripe Supported Currencies%2s', 'inspiry-stripe-payments' ), '<a href="https://stripe.com/docs/currencies" target="_blank">', '</a>' ); ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
				                        <?php esc_html_e( 'Payment Amount Per Property*', 'inspiry-stripe-payments' ); ?>
                                    </th>
                                    <td>
				                        <?php $amount = ! empty( $isp_settings['amount'] ) ? $isp_settings['amount'] : ''; ?>
                                        <input id="isp_settings[amount]" name="isp_settings[amount]" class="regular-text" type="text" value="<?php echo esc_attr( $amount ); ?>"/>
                                        <p class="description"><?php esc_html_e( 'Provide the amount that you want to charge for one property. Example: 20.00', 'inspiry-stripe-payments' ); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
				                        <?php esc_html_e( 'Payment Button Label', 'inspiry-stripe-payments' ); ?>
                                    </th>
                                    <td>
				                        <?php $button_label = ! empty( $isp_settings['button_label'] ) ? $isp_settings['button_label'] : ''; ?>
                                        <input id="isp_settings[button_label]" name="isp_settings[button_label]" class="regular-text" type="text" value="<?php echo esc_attr( $button_label ); ?>" placeholder="<?php esc_attr_e( 'Pay with Card', 'inspiry-stripe-payments' ); ?>"/>
                                        <p class="description"><?php esc_html_e( 'Default: Pay with Card', 'inspiry-stripe-payments' ); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
				                        <?php esc_html_e( 'Publish Submitted Property after Payment', 'inspiry-stripe-payments' ); ?>
                                    </th>
                                    <td>
				                        <?php $publish_property = isset( $isp_settings['publish_property'] ) ? $isp_settings['publish_property'] : '0'; ?>
                                        <label for="isp_settings_publish_property_yes">
                                            <input id="isp_settings_publish_property_yes" name="isp_settings[publish_property]" type="radio" value="1" <?php checked( 1, $publish_property, true ); ?> />
                                            <?php esc_html_e( 'Yes', 'inspiry-stripe-payments' ); ?>
                                        </label>
                                        <br />
                                        <label for="isp_settings_publish_property_no">
                                            <input id="isp_settings_publish_property_no" name="isp_settings[publish_property]" type="radio" value="0" <?php checked( 0, $publish_property, true ); ?> />
                                            <?php esc_html_e( 'No', 'inspiry-stripe-payments' ); ?>
                                        </label>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
							<?php submit_button(); ?>
                        </div>
                    </div>
                    <footer class="settings-footer">
                        <p><span class="dashicons dashicons-editor-help"></span><?php printf( esc_html__( 'For help, please consult the %1$s documentation %2$s of the plugin.', 'inspiry-stripe-payments' ), '<a href="https://realhomes.io/documentation/inspiry-stripe-payments/" target="_blank">', '</a>' ); ?></p>
                        <p><span class="dashicons dashicons-feedback"></span><?php printf( esc_html__( 'For feedback, please provide your %1$s feedback here! %2$s', 'inspiry-stripe-payments' ), '<a href="' . esc_url( add_query_arg( array( 'page' => 'realhomes-feedback' ), get_admin_url() . 'admin.php' ) ) . '" target="_blank">', '</a>' ); ?></p>
                    </footer>
                </form>
            </div>
			<?php
		}

		/**
		 * Register settings for the plugin.
		 *
		 * @since  1.1.0
		 */
		public function register_settings() {
			register_setting( 'isp_settings_group', 'isp_settings' );
		}
	}
}