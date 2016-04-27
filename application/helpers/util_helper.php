<?php

function generate_token()
{
	return md5('id='.$_GET['deviceId'].'&mac='.$_GET['wifiMac']);
}

/**
 * 生成签名
 * @param  array http请求的参数
 * @return [type] 返回签名的结果
 */
function generate_sign($params = array())
{
	$private_key = md5('quwan2016.');
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$params = array_slice($params, 1);
	}

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
		//print_r($all_params);
		$sign = md5($private_key.$all_params);
		
		return $sign;
	}

	return "";
}

/**
 * 验证签名是否有效
 * @param  array http的请求参数
 * @return [type] true表示签名正确，否则错误
 */
function isvalid_sign($params = array())
{
	if (isset($_REQUEST['sign']) && $_REQUEST['sign'] == generate_sign($params))
	{
		return true;
	}

	return false;
}

/**
 * 判断用户是否已登陆
 * @return boolean true表示已登陆，否则未登录
 */
function has_logined()
{
	if (isset($_GET['token']))
	{
		return true;
	}

	return false;
}