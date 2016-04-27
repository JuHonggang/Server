<?php
/**
 * 将应答包以Json的形式返回给客户端
 * @param  [type]   
 * @param  [type]
 * @param  array
 * @return [type]
 */
function echo_result($code, $msg, $data = array())
{
	$result = array(
		'code' => intval($code),
		'msg'  => strval($msg),
		'data' => $data
	);

	echo json_encode($result);
}
