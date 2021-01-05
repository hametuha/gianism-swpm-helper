<?php
/**
 * リダイレクト関連の処理
 */

/**
 * シングルページだった場合、同じページにリダイレクトさせる
 *
 * @param string $url
 */
add_filter( 'swpm_get_login_link_url', function( $url ) {
	if ( is_singular() && ! is_page() ) {
		$url = add_query_arg( [
			'redirect_to' => rawurlencode( get_permalink( get_queried_object() ) ),
		], $url );
	}
	return $url;
} );

/**
 * ショートコードの出力するリダイレクトURLをコントロール
 *
 * @param string
 */
add_filter( 'shortcode_atts_gianism_login', function( $out, $paris, $atts, $shortcode ) {
	if ( 'gianism_login' === $shortcode ) {
		$redirect_to = filter_input( INPUT_GET, 'redirect_to' );
		if ( $redirect_to ) {
			$out['redirect_to'] = $redirect_to;
		} else {
			$option = get_option( 'swpm-settings', [] );
			if ( ! empty( $option['profile-page-url'] ) ) {
				$out['redirect_to'] = $option['profile-page-url'];
			}
		}
	}
	return $out;
}, 10, 4 );
