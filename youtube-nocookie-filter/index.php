<?php

/**
 * Plugin Name: Youtube-nocookie filter
 * Plugin URI: 
 * Description: Replace youtube urls with gdpr compliant youtube-nocookie.com
 * Version: 1.0.0
 * Author: rickylee
 * Author URI: https://rickylee.com/2018/03/26/youtube-nocookie-gdpr-wordpress/
 * Text Domain: 
 */
 
 
 /**
 * Modify YouTube oEmbeds to use youtube-nocookie.com
 * https://rickylee.com/2018/03/26/youtube-nocookie-gdpr-wordpress/
 * @param $cached_html
 * @param $url
 *
 * @return string
 */
function filter_youtube_embed( $cached_html, $url = null ) {

	// Search for both youtube.com and youtu.be URLs
	if ( strpos( $url, 'youtu.be' ) or strpos( $url, 'youtube.com' ) ) {
		$cached_html = preg_replace( '/youtube\.com\/(v|embed)\//s', 'youtube-nocookie.com/$1/', $cached_html );
	}

	return $cached_html;
}
add_filter( 'embed_oembed_html', 'filter_youtube_embed', 10, 2 );