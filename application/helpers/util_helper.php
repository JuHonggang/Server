<?php

function generate_token()
{
	return md5('id='.$_GET['deviceId'].'&mac='.$_GET['wifiMac']);
}

function generate_sign($params = array())
{
	$private_key = md5('quwan2016.');
	if (!empty($params))
	{
		ksort($params);
		$all_params = array();
		foreach ($params as $key => $value)
		{
			if ($key == "sign")
			{
				continue;
			}
			array_push($all_params, $key.'='.$value);
		}

		$all_params = join('&', $all_params);
		echo $all_params;
		echo '<br/>';
		$sign = md5($private_key.$all_params);
		echo $sign;
		return $sign;
	}

	return "";
}

function isvalid_sign($params = array())
{
	if ($_GET['sign'] == generate_sign($params))
	{
		return true;
	}

	return false;
}

function has_logined()
{
	if (!empty($_GET['token']))
	{
		return true;
	}

	return false;
}