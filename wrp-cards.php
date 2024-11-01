<?php
/*
Plugin Name: wrp-cards
Plugin URI: http://www.WarRoomPoker.com/wrpcards.php
Description: Replace cards by a graphical representation of the card. 
             This is based on Chris Halverson's "pokerhand". Prefix the cards by a ":" ex :As for the Ace of Spade.
             You can now also display a backgard by using ":00". 
Version: 1.6
Author: Fumseck
Author URI: http://www.WarRoomPoker.com/

Copyright 2005  Fumseck  (email : Fumseck@WarRoomPoker.com)

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
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function wrp_card($text) {
	// Only take things that are between the tag.
	$ret = preg_replace("':(\w*)'e", "replace_card('\\1')", $text);
	
	return $ret;
}


function replace_card($text) {
	$ret = "";
	$ok = "n";	

	// If you want to use 4 color cards (blue for diamond and green for clubs: set $use_4_color to "y". 
	// If you want to use normal cards (red for diamond and black for clubs): set $use_4_color to "n".
	$use_4_color = "y";


	$a = preg_split('//', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);
	

	// Check if the string is no longer than 2 characters 
	if(strlen($text)==2) {
		$ok = "y";		
	} else {
		$ok = "n";		
	}


	// Check if it's a backcard 
	if (!strcmp($text, '00')) { 
		// Tell the variable we used a backcard
		$ok = "b";		
	}


	// Check if the second character is a suit 
	if(!strcmp($ok, 'y')) {
		if(!strcmp($a[1], "c")) {
			$ok ='y';
			// Check if we should use extended cards
			if (!strcmp($use_4_color, 'y')) {
				$text = $text . "_e";
			}
		
		} else if(!strcmp($a[1], "d")) {
			$ok  ='y';
			// Check if we should use extended cards
			if (!strcmp($use_4_color, 'y')) {
				$text = $text . "_e";
			}
		
		} else if(!strcmp($a[1], "h")) {
			$ok ='y';
		
		} else if(!strcmp($a[1], "s")) {
			$ok ='y';
		
		} else {
			$ok ='n';
		}
	}


	// Check if the first character is a card
	if(!strcmp($ok, 'y')) {
		if(!strcmp($a[0], "2")) {
			$ok ='y';
		
		} else if(!strcmp($a[0], "3")) {
			$ok  ='y';
		
		} else if(!strcmp($a[0], "4")) {
			$ok  ='y';

		} else if(!strcmp($a[0], "5")) {
			$ok  ='y';

		} else if(!strcmp($a[0], "6")) {
			$ok  ='y';

		} else if(!strcmp($a[0], "7")) {
			$ok  ='y';

		} else if(!strcmp($a[0], "8")) {
			$ok  ='y';

		} else if(!strcmp($a[0], "9")) {
			$ok  ='y';

		} else if(!strcmp($a[0], "t")) {
			$ok  ='y';

		} else if(!strcmp($a[0], "j")) {
			$ok  ='y';

		} else if(!strcmp($a[0], "q")) {
			$ok  ='y';

		} else if(!strcmp($a[0], "k")) {
			$ok  ='y';

		} else if(!strcmp($a[0], "a")) {
			$ok  ='y';
		
		} else {
			$ok ='n';
		}
	}

	// If the string passed the test, convert it to an image, if not return the inital string 
	if(!strcmp($ok, 'y')) {
			if (!strcmp($text, 'Ad')) { 
				$text = "xyz";		
			}
			if (!strcmp($text, 'Ad_e')) { 
				$text = "xyz_e";		
			}
		$ret = '<img src="' . WP_PLUGIN_URL . '/wrp-cards/cards/' . $text . '.gif" class="wrp-cards" width="30" height="20">';
	} else if(!strcmp($ok, 'b')) {
		$ret = '<img src="' . WP_PLUGIN_URL . '/wrp-cards/cards/00.gif" class="wrp-cards" width="30" height="20">';
	} else {
		$ret = ':' . $text;
	}	
	
	return($ret);
}


function wrp_card_head() {
}
// Pre-2.6 compatibility
if ( ! defined( 'WP_CONTENT_URL' ) )
      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

add_filter('the_content', 'wrp_card');
add_filter('the_excerpt', 'wrp_card');
add_filter('comment_text', 'wrp_card');
add_action('wp_head', 'wrp_card_head');
?>
