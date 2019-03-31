<?php

namespace GenesisCustomizer;

/**
 * Class Merlin_WP
 *
 * @package GenesisCustomizer
 */
class Merlin_WP extends \Merlin {

	/**
	 * Get template part workaround.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function loading_spinner() {
		echo '<span class="merlin__button--loading__spinner">
			<div class="merlin-spinner">
				<svg class="merlin-spinner__svg" viewbox="25 25 50 50">
					<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="10"></circle>
				</svg>
			</div>
		</span>';
	}
}
