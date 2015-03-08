<?php
/**
 * Returns the distance between two lat, long in miles
 * @author  Sanjeev shrestha <sanjeev@joomlaguru.com.np>
 * @date 2015/03/08
 * @file distance.php
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Return Distance in Km or Miles for lat long sets
 * @param  float $lat1  Latitude 1
 * @param  float  $lng1  Longitude 1
 * @param  float  $lat2  Latitude 2
 * @param  float  $lng2  Longitude 2
 * @param  boolean $miles if km or miles to return
 * @return float         Returns distance in miles or kms
 */
function distance($lat1, $lng1, $lat2, $lng2, $miles = true)
{
	$pi180 = pi()/ 180;
	$lat1 *= $pi180;
	$lng1 *= $pi180;
	$lat2 *= $pi180;
	$lng2 *= $pi180;
 
	$r = 6372.797; // mean radius of Earth in km
	$dlat = $lat2 - $lat1;
	$dlng = $lng2 - $lng1;
	$a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
	$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
	$km = $r * $c;
 
	return ($miles ? ($km * 0.621371192) : $km);
}

/**
 * Get the lat long from argument
 */
if(count($argv)!=3)
{
	echo '[ERROR] Requires 2 parameters exactly'.PHP_EOL;
}
/**
 * Separate the latitude and longitudes
 */
list($lat1,$lng1)=explode(',',$argv[1]);
list($lat2,$lng2)=explode(',',$argv[2]);

/**
 * Print result
 */
printf("Distance : %s miles",distance($lat1,$lng1,$lat2,$lng2,true));

/**
 * Print New line
 */
echo PHP_EOL;


