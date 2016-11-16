<?php
/**
 * Template for displaying search forms in Naked
 *
 * @package Naked
 */
?>
<div class="menu-hover-icon"><i class="fa fa-caret-up" aria-hidden="true"></i></div>
<div id="animatedModal">

	<div class="close-icon background-dark background-dark-hover close-animatedModal">
		<i class="fa fa-times-thin close-inner" aria-hidden="true"></i>
	</div>


	<div class="modal-content">
		<div class="modal-container">

			<div class="fw-container">
				<div class="fw-row">


					<form role="search" method="get" class="search-form fullscreen-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="fw-col-sm-9 ">
							<div class="fullscreen-input-container">
								<input class="fullscreen-input search-field" type="search" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" >
								<div><?php _e( 'Type above and press the search icon or enter to search. Press Esc to cancel.', 'thshpr' ); ?></div>
							</div>
						</div>
						<div class="fw-col-sm-3">
							<div class="fullscreen-submit-container">
								<button class="fullscreen-submit search-submit" type="submit"></button>
							</div>
						</div>
					</form>


				</div>
			</div>

		</div>
	</div>

</div>
