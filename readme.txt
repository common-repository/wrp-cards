=== Plugin Name ===

Name: WRP-CARDS
Donate link: http://www.WarRoomPoker.com/donate.php
Tags: poker, cards, image, graphic, playing, blackjack
Contributors: Fumseck
Version: 1.6
Requires at least: 1.5.x
Tested up to: 3.x
Stable tag: trunk


== DESCRIPTION ==


I M P O R T A N T !!! PLEASE DOWNLOAD THE VERSION LOCATED HERE:
http://wordpress.org/extend/plugins/poker-cards
  
This is a simple plug-in to display playing cards in a more visual fashion.
It is looseley based on Chris Halverson's "pokerhand".

Many people will describe poker hands by writing something like "AsKh". Using 
the wrp-cards plug-in, you can easily display the playing cards in a graphical way
by prefixing the cards by a ':'. Ex. :As :Kh.

To view wrp-cards in action go to:
http://www.WarRoomPoker.com/wrpcards.php


As an option, you can use the "normal" card color (red and black) or you can use
4 color cards:
Diamond : Blue
Heart   : Red
Spade   : Black
Club    : Green 


== Screenshots ==
`/trunk/wrp-cards-screenshot.jpg`


== DOWNLOAD ==

Download the file wrp-cards.zip here:
http://www.WarRoomPoker.com/wrpcards.php



== USAGE ==

Just prefix the card that you want with a ":".
Examples:
:Ad - Ace of Diamonds
:Kc - King of Clubs
:Qs - Queen of Spades
:Jh - Jack of Hearts
:Th - Ten of Hearts
:9h - 9 of Hearts
:8h - 8 of Hearts
:7h - 7 of Hearts
:6h - 6 of Hearts
:5h - 5 of Hearts
:4h - 4 of Hearts
:3h - 3 of Hearts
:2h - 2 of Hearts
:00 - display the backcard

By default, the plug-in uses 4 color cards (blue for diamond and green for clubs).

If you do not wish to use 4 color cards you must modify the function replace_card located in the wrp-cards.php file:
$use_4_color = 'n';



== INSTALLATION ==

1. Optional, modify $use_4_color = 'n'; if you want to use normal cards.
2. Copy the wrp-cards folder to your wp-content/plugins directory. 
3. Make sure that the "cards" folder is in the wrp-cards folder. 
4. Log into the administration area of WordPress and activate the plugin.



== CHANGE LOG ==

Version 1.0 
Beta testing

Version 1.1
Initial release version

Version 1.2
Created the 4 color deck

Version 1.3
Added class="wrp-cards" to the images. With this you can easily control the way the cards are displayed within your CSS stylesheet.
For example, if you wanted to display the cards 35% lower on the line this is what you would use
img.wrp-cards { vertical-align: -35%; }

Version 1.4
Added the possibility to display a "backcard". You just have to use the code :00 to display it. This was suggested by Tomas from www.blogaloo.com.
Thanks Tomas!

Version 1.5
Modified the Ad.gif and Ad_e.gif. Some spam filter where filtering this image out. I guess it's because the filter reads Ad.gif and Ad_e.gif as an ad and it's being filtered out.
I patched it non elegantly, I changed the Ad.gif and Ad_e.gif to xyz.gif and xyz_e.gif. It's not pretty, but it works...
I should have rolled out that patch a while ago...
Thanks Nside for tinkering with it and letting me know what was happening.

Version 1.6
The path to the cards directory was hard coded in the plug-in and this caused problems with people who had their wordpress located somewhere else than the root dir.
Version 1.6 now uses WP_PLUGIN_URL to determine the location of the cards.


== GNU LICENSE ==

Copyright 2005  Fumseck  (email : Fumseck [insert.at.here] WarRoomPoker.com)

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