( function( api ) {

	// Extends our custom "vw-construction-estate" section.
	api.sectionConstructor['vw-construction-estate'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );