<?php
function echo_result($code, $msg, $data = array())
{
	$result = array(
		'code' => intval($code),
		'msg'  => strval($msg),
		'data' => $data
	);

	echo json_encode($result);
	//$this->output->set_content_type('application/json')->set_output(json_encode(result));
}
