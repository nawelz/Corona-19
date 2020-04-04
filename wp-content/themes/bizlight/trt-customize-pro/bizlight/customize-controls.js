( function( api ) {

	// Extends our custom "bizlight" section.
	api.sectionConstructor['bizlight'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
