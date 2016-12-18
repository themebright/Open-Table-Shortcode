jQuery( function( $ ) {

	var asdf = function() {
		return $( '#ots-restaurant-id' ).val();
	}

	// When Insert button in the modal is clicked
	$( '#ots-insert' ).on( 'click', function() {

		// Get data from field values and
		var data = {
			restaurantId: asdf(),
			language:     $( '#ots-language option:selected' ).val(),
			type:         $( '#ots-type input:checked' ).val(),
		};

		// Create array to build shortcode
		var shortcode = [];

		// Opening tag
		shortcode.push( '[open-table-widget' );

		// Add restaraunt ID attr
		shortcode.push( 'restaurant-id=' + data.restaurantId );

		// Only add language attr if default isn't selected
		if ( data.language !== 'en' ) {
			shortcode.push( 'language=' + data.language );
		}

		// Only add type attr if default isn't selected
		if ( data.type !== 'standard' ) {
			shortcode.push( 'type=' + data.type );
		}

		// Join shortcode attributes and add a closing bracket
		shortcode = shortcode.join( ' ' ) + ']';

		// Hide ThickBox
		tb_remove();

		// Insert shortcode into MCE editor
		send_to_editor( shortcode );

	} );

} );
