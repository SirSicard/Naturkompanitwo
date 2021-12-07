/*
* WordPress dependencies
*/
import { _x } from '@wordpress/i18n';
import {
    Component,
    Fragment,
} from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import {
    CheckboxControl,
    ToggleControl,
    PanelBody,
    RangeControl,
    SelectControl,
} from '@wordpress/components';

/*
* Internal dependencies
*/
// Import map style
// Import Address search

export default class Inspector extends Component {
    render() {
        const {
            attributes: {
                zoom,
            },
            // googleMapURL,
            setAttributes,
        } = this.props;

        return (
            <InspectorControls>
                <Fragment>

                    <PanelBody>
                        <RangeControl
                            label={_x( 'Zoom level', 'wcms20', 'google-maps' ) }
                            value={ zoom }
                            onChange={ (value) => setAttributes({ zoom: value} ) }
                            min={ 1 }
                            max={ 10 }
                        />
                    </PanelBody>
                </Fragment>
            </InspectorControls>
        )
    }
}