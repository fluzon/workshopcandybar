( function( api ) {

	// Extends our custom "event-star" section.
	api.sectionConstructor['event-star'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );