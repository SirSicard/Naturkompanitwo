/*
* Import the blocks.
*/

import * as googleMaps from './google-maps-block';

const {
    registerBlockType,
    registerBlockStyle,
} = wp.blocks;

[
    googleMaps
    // Add more custom blocks here
].forEach( block => {
    if ( ! block ) {
        return;
    }

    // Register block in the editor
    const { name, settings} = block;
    registerBlockType( name, settings );
});