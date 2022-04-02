<?php
/*
Plugin Name: Admin Code Editor Fix
Description: Resolve issue where theme editor and plugin editor cannot be edited.
Author: 1shiharaT
Version: 1.0.0
Author URI: https://grow-group.jp
Network: True
*/


function tpef_https_local_ssl_verify ($verify){
    if ( is_admin() && wp_doing_ajax() && isset($_REQUEST["action"]) && $_REQUEST["action"] === "edit-theme-plugin-file" ){
        return false;
    }
    return $verify;
}

add_filter( "https_local_ssl_verify", "tpef_https_local_ssl_verify");
add_filter( "https_ssl_verify", "tpef_https_local_ssl_verify");

function tpef_fixed_admin_url( $url = "", $path = "" ){
    if ( is_admin() && is_multisite() &&
    ( strpos($url, "/wp-admin/theme-editor.php") !== false || strpos($url, "/wp-admin/plugin-editor.php") !== false ) ){
        $url = str_replace("/wp-admin/theme-editor.php", "/wp-admin/network/theme-editor.php", $url);
        $url = str_replace("/wp-admin/plugin-editor.php", "/wp-admin/network/plugin-editor.php", $url);
    }
    return $url;
}

add_filter( "admin_url", "tpef_fixed_admin_url", 10, 2 );
