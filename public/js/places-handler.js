function initMap() {

    /**
     * Google Places API Handler
     */
    let places = {
        form: null,
        input: null,
        __construct: function () {
            /* Specify target form */
            places.form = $('form#address');

            /* Configure Places Auto-complete */
            places.input = $("#places-input")[0];
            const autocomplete = new google.maps.places.Autocomplete(places.input);
            autocomplete.setFields([
                "formatted_address",
                "address_components",
                "geometry"
            ]);

            autocomplete.addListener("place_changed", () => {
                const place = autocomplete.getPlace();

            console.log(place);

            /* If no place found */
            if (!place.geometry) {
                /**
                 * User entered the name of a Place that was not suggested and
                 *  pressed the Enter key, or the Place Details request failed.
                 *  (Present alternative form for User to manually enter each field)
                 */
                console.log("ADDRESS NOT FOUND: '" + place.name + "'");
                return;
            }

            /* Map Address components to field names */
            places.mapAddressComponents(place);
        });
        },
        mapAddressComponents: function (place) {
            let placeLat = place.geometry.location.lat(),
                placeLng = place.geometry.location.lng(),
                country = '',
                countryCode = '',
                postalCode = '',
                city = '',
                region = '';
            for (var i = 0; i < place.address_components.length; i++) {
                if (place.address_components[i].types.includes('country')) {
                    country = place.address_components[i].long_name;
                    countryCode = place.address_components[i].short_name;
                } else if (place.address_components[i].types.includes('administrative_area_level_3') ||
                    place.address_components[i].types.includes('administrative_area_level_2') ||
                    place.address_components[i].types.includes('administrative_area_level_1')
                ) {
                    city = place.address_components[i].long_name;
                } else if (place.address_components[i].types.includes('postal_town') ||
                    place.address_components[i].types.includes('locality') ||
                    place.address_components[i].types.includes('sublocality') ||
                    place.address_components[i].types.includes('sublocality_level_1')
                ) {
                    region = place.address_components[i].long_name;
                } else if (place.address_components[i].types.includes('postal_code')) {
                    postalCode = place.address_components[i].long_name;
                }
            }

            /* Update form with address components */
            places.updateAddressForm(place, postalCode, region, city, country, countryCode, placeLat, placeLng);
        },
        updateAddressForm: function (place, postalCode, region, city, country, countryCode, placeLat, placeLng) {
            places.form.find('#formatted-address').val(place.formatted_address);
            places.form.find('#postal-code').val(postalCode);
            places.form.find('#region').val(region);
            places.form.find('#city').val(city);
            places.form.find('#country').val(country);
            places.form.find('#country-code').val(countryCode);
            places.form.find('#latitude').val(placeLat);
            places.form.find('#longitude').val(placeLng);
        }
    };
    places.__construct();
}