/* Hide WP version strings from scripts and styles
 * @return {string} $src
 * @filter script_loader_src
 * @filter style_loader_src
 */
function social9_remove_wp_version_strings( $src ) {
     global $wp_version;
     parse_str(parse_url($src, PHP_URL_QUERY), $query);
     if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
          $src = remove_query_arg('ver', $src);
     }
     return $src;
}
add_filter( 'script_loader_src', 'social9_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'social9_remove_wp_version_strings' );
 
/* Hide WP version strings from generator meta tag */
function s9bg_remove_version() {
return '';
}
add_filter('the_generator', 's9bg_remove_version');
