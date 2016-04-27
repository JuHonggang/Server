<?php
// 地球半径
define('EARTH_RADIUS', 6372797);

function rad($degress)
{
    return $degress * M_PI / 180.0;
}

/**
 * 根据两点的经纬度获取两点的距离
 * @param  [type]
 * @param  [type]
 * @param  [type]
 * @param  [type]
 * @return [type]
 */
function get_distance($lat1, $lng1, $lat2, $lng2)
{
	$rad_lat1 = rad($lat1);
	$rad_lat2 = rad($lat2);
    $d_lat = $rad_lat1 - $rad_lat2;
    $d_lon = rad($lng1 - $lng2); 
    $rate = 2 * asin(sqrt(pow(sin($d_lat / 2), 2) + cos($rad_lat1) * cos($rad_lat2) * pow(sin($d_lon / 2), 2)));
    
    return round(EARTH_RADIUS * $rate, 2);
}