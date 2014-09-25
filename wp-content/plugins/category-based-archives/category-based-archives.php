<?php
/*
Plugin Name: Category Based Archives
Description: Allows Category Based archives to be applied to archives. Permalinks should be something in the lines of http://mydomain.com/2008/in-category-slug/. Currently only allows date archives and up to month. Theme builders can use the following functions, cba_get_category_id(), cba_the_year(), cba_the_month(), cba_auto_thedate(), cba_get_year_link(), cba_get_month_link();
Version: 1.0.5
Author: Jeremy Foo
Author URI: http://thirdly.org/
Plugin URI: http://wordpress.ornyx.net

    Copyright 2008  Jeremy Foo  (email : jeremyfoo@gmail.com)

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

/* Functions for theme builders */

function cba_get_category_id() {
	global $wp_query;
	return $wp_query->query_vars['cat'];
}

function cba_the_year() { 
	global $wp_query;
	return $wp_query->query_vars['year'];
}

function cba_the_month() { 
	global $wp_query;
	return $wp_query->query_vars['monthnum'];
}

function cba_auto_thedate() {
	if (is_year()) {
		return cba_the_year();
	} else if (is_month()) {
		return date('F', mktime(0,0,0,cba_the_month())) . " " . cba_the_year();
	}
	
}


function cba_get_year_link($year) {
	global $wp_rewrite, $wpdb, $wp_query;

	$cat = $wpdb->get_var("SELECT slug FROM $wpdb->terms WHERE term_id = " . $wp_query->query_vars['cat']);
	if ( !$year )
		$year = gmdate('Y', time()+(get_option('gmt_offset') * 3600));
	
	$yearlink = $wp_rewrite->get_year_permastruct();
	if ( !empty($yearlink) ) {
		$yearlink = str_replace('%year%', $year, $yearlink);
		return apply_filters('year_link', get_option('home') . user_trailingslashit($yearlink, 'year') . "in-$cat/", $year);
	} else {
		return apply_filters('year_link', get_option('home') . '/?m=' . $year . '&datecategory=' . $cat, $year);
	}
}

function cba_get_month_link($year, $month) {
	global $wp_rewrite, $wpdb, $wp_query;

	$cat = $wpdb->get_var("SELECT slug FROM $wpdb->terms WHERE term_id = " . $wp_query->query_vars['cat']);

	if ( !$year )
		$year = gmdate('Y', time()+(get_option('gmt_offset') * 3600));
	if ( !$month )
		$month = gmdate('m', time()+(get_option('gmt_offset') * 3600));
		$monthlink = $wp_rewrite->get_month_permastruct();

	if ( !empty($monthlink) ) {
		$monthlink = str_replace('%year%', $year, $monthlink);
		$monthlink = str_replace('%monthnum%', zeroise(intval($month), 2), $monthlink);
		return apply_filters('month_link', get_option('home') . user_trailingslashit($monthlink, 'month') . "in-$cat/", $year, $month);
	} else {
		return apply_filters('month_link', get_option('home') . '/?m=' . $year . zeroise($month, 2) . '&datecategory=' . $cat, $year, $month);
	}
}


/* CBA Magic */

function cba_queryvars( $qvars )
{
  array_push($qvars, 'datecategory');
  return $qvars;
}


function cba_search_join( $join )
{
	global $wpdb, $wp_query;
	
	if(isset( $wp_query->query_vars['datecategory'] )) {
		$join .= " LEFT JOIN $wpdb->term_relationships ON " . 
		$wpdb->posts . ".ID = " . $wpdb->term_relationships . 
		".object_id LEFT JOIN $wpdb->term_taxonomy ON " .
		$wpdb->term_relationships . ".term_taxonomy_id = " . $wpdb->term_taxonomy . ".term_taxonomy_id " .
		"LEFT JOIN $wpdb->terms ON " . $wpdb->term_taxonomy . ".term_id = " . $wpdb->terms . ".term_id";
	}
	
	return $join;
}

function cba_search_where( $where )
{
	global $wp_query;
	if(isset( $wp_query->query_vars['datecategory'] )) {
		$where .= " AND slug = '" . get_query_var('datecategory') . "'";
	}
	return $where;
}


function cba_redirect_datearchive() {
	global $wp_query, $wpdb;

	if(isset($wp_query->query_vars['datecategory'] )) {
		// hack to show category
		$cat = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE slug = '" . get_query_var('datecategory') . "'");
		$wp_query->query_vars['cat'] = $cat;

		// get wordpress to use date templates;
		$wp_query->is_date = true;

	}
//	print_r($wp_query);
}


/* rewrite rules */

function cba_flush_rewrite_rules() 
{
   global $wp_rewrite;
   $wp_rewrite->flush_rules();
}

function cba_add_rewrite_rules( $wp_rewrite ) 
{

  $new_rules = array( 
     '([0-9]{4})/in-(.+?)/?$' => 'index.php?year=' . $wp_rewrite->preg_index(1) . '&datecategory=' . $wp_rewrite->preg_index(2),
     '([0-9]{4})/([0-9]{1,2})/in-(.+?)/?$' => 'index.php?year=' . $wp_rewrite->preg_index(1) . '&monthnum=' . $wp_rewrite->preg_index(2) . '&datecategory=' . $wp_rewrite->preg_index(3)
     );

  $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

add_action('template_redirect', 'cba_redirect_datearchive');
add_filter('query_vars', 'cba_queryvars' );
add_action('init', 'cba_flush_rewrite_rules');
add_action('generate_rewrite_rules', 'cba_add_rewrite_rules');
add_filter('posts_join', 'cba_search_join' );
add_filter('posts_where', 'cba_search_where' );

?>