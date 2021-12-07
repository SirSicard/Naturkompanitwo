/*
* WordPress dependencies
*/

import { _x } from '@wordpress/i18n';
import { RichText } from '@wordpress/block-editor';
import {
    Component,
    Fragment,
} from '@wordpress/element';

/*
* External dependencies
*/
import classnames from 'classnames';
import { debounce } from 'lodash';

/*
* Internal dependencies
*/
import Inspector from './inspector';
import MapBlock from './map-block';

const googleMapsApiKey = 'AIzaSyD98FUDbAqqfAuEpM0fxgfXVd779jDgKCs';
const GOOGLE_MAPS_URL = 'https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing,places';

// Build map here
export default class GoogleMapEdit extends Component {
    render() {
        const {
            attributes: {
                address,
				addressAlignment,
				height,
				isMarkerVisible,
				lat,
				lng,
				marker,
                zoom,
            },
            setAttributes,
        } = this.props

        const options = {
            zoomControl: true,
            mapTypeControl: false,
			streetViewControl: false,
			fullscreenControl: false,
			gestureHandling: 'cooperative',
			draggable: true,
        }

        const googleMapURL = GOOGLE_MAPS_URL + '&key=' + googleMapsApiKey;
        return (
            <Fragment>
                Here be map
                <Inspector { ...this.props } />

                <Fragment>
                    <MapBlock
                        googleMapURL={ googleMapURL }
                        loadingElement={ <div style={ { height: '100%' } } /> }
                        mapElement={ <div style={ { height: '100%' } } /> }
                        containerElement={ <div className="wcms-maps-google-map-wrap" style={ { height: `${ Math.floor( height * 0.7 ) }vh` } } /> }
                        zoom={ zoom }
                        center={ numberifyCoords( { lat, lng } ) }
                        options={ options }
                        defaultZoom={ zoom }
                        defaultCenter={ { lat, lng } }
                        defaultOptions={ options }
                        onZoomChanged={ debounce( ( value ) => setAttributes( { zoom: value } ), 500 ) }
                        onCenterChanged={ debounce( ( _lat, _lng ) => setAttributes( { lat: _lat, lng: _lng } ), 500 ) }
                    >

                    </MapBlock>
                </Fragment>
            </Fragment>
        );
    };

}

function numberifyCoords( coords ) {

	return {
		lat: Number.parseFloat( coords.lat ) || 41.3947688,
		lng: Number.parseFloat( coords.lng ) || 2.0787284,
	};

}