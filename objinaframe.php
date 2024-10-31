<?php
/*
Plugin Name: Object in A-frame;
Plugin URI: http://www.andywar.net
Description: Uploads obj files via the a-frame environment.
Version: 1.1
Author: andywar65
Author URI: http://www.andywar.net
License: GPLv2
*/

/*  Copyright 2016  Andrea Guerra  (email : 65@andywar.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_filter('upload_mimes', 'objinaframe_upload_mimes');

function objinaframe_upload_mimes ( $existing_mimes=array() ) {//make obj and mtl files uploadable
	$existing_mimes['obj'] = 'application/octet-stream';
	$existing_mimes['mtl'] = 'application/octet-stream';
	return $existing_mimes;
}

add_action ( 'plugins_loaded' , 'objinaframe_textdomain');

function objinaframe_textdomain(){//internationalization
	if (!load_plugin_textdomain( 'objinaframe', false, plugins_url( 'languages', __FILE__ ) ) ){
		load_plugin_textdomain( 'objinaframe', false, plugins_url( 'languages', __FILE__ ) );
	}
}

wp_enqueue_script( 'aframe', $src = plugins_url( 'js/aframe.min.js', __FILE__ ) );//insert js libraries in head of document
//wp_enqueue_script( 'aframe-extras', $src = plugins_url( 'js/aframe-extras.js', __FILE__ ) );
//wp_enqueue_script( 'aframe-extras-loaders', $src = plugins_url( 'js/aframe-extras.loaders.min.js', __FILE__ ) );

add_shortcode( 'objinaframe_shortcode' , 'objinaframe_embed' );

function objinaframe_embed( $atts ){//process the shortcode
	$obj_path = $atts[ 'path' ];
	$obj_name = basename( $obj_path, '.obj' );
	$mtl_path = str_replace( '.obj' , '.mtl' , $obj_path );
	$return = __( '<p>Click on the visor icon on the right to watch VR fullscreen. </p>' , 'objinaframe' );
	$return .= '<a-scene style="width: 100%; height: 500px" embedded><a-assets>';
	$return .= '<a-asset-item id="' . $obj_name . '-Obj" src="' . $obj_path . '"></a-asset-item>';
	$return .= '<a-asset-item id="' . $obj_name . '-Mtl" src="' . $mtl_path . '"></a-asset-item>';
	$return .= '</a-assets>';
	//$return .= '<a-box color="red" depth="2" position"-1 1 -2"></a-box>';//dummy entity
	$return .= '<a-entity obj-model="obj: #' . $obj_name . '-Obj; mtl: #' . $obj_name . '-Mtl"></a-entity>';
	$return .= '<a-entity><a-camera></a-camera></a-entity>';
	$return .= '</a-scene>';
	return $return;
}