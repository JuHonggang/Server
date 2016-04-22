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
		$sign = md5($private_key.$all_params);
		
		return $sign;
	}

	return "";
}

function isvalid_sign($params = array())
{
	//print_r($params);
	/*if ($_SERVER['REQUEST_METHOD'] == "GET") 
	{
		//echo "get";
		if (isset($_GET['sign']) && $_GET['sign'] == generate_sign($params))
		{
			return true;
		}
	}
	else if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//echo "post";
		if (isset($_POST['sign']) && $_POST['sign'] == generate_sign($params))
		{
			return true;
		}
	}*/
	//phpinfo();
	if (isset($_REQUEST['sign']) && $_REQUEST['sign'] == generate_sign($params))
	{
		return true;
	}

	return false;
}

function has_logined()
{
	if (isset($_GET['token']))
	{
		return true;
	}

	return false;
}