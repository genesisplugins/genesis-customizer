<?php

namespace GenesisPlugins\GenesisCustomizer;

add_action( 'wp_footer', __NAMESPACE__ . '\additional_js_output' );
/**
 * Outputs Additional JS to site footer.
 *
 * @since  1.0.0
 *
 * @return void
 */
function additional_js_output() {
	$js = _get_value( 'code_js_additional' );

	if ( '' !== $js ) {
		?>
        <script type="text/javascript">
            jQuery(function ($) {
                "use strict";
				<?php echo $js . "\n"; ?>
            });
        </script>
		<?php
	}
}
