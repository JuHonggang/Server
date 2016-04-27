<?php

class VersionController extends CI_Controller
{
	private $code = 0;
	private $msg = '操作失败';
	private $data = null;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('VersionModel', 'version', TRUE);
		$this->load->helper('format');
		$this->load->helper('url');
		$this->load->helper('util');
	}

	public function index()
	{
		echo "Hello World";
	}

	/**
	 * 版本更新
	 * @return [type]
	 */
	public function update_version()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->version->update_version();
			if (empty($this->data))
			{
				$this->code = 0;
				$this->msg = '已经是最新版本';
			}
			else 
			{
				$this->code = 1;
				$this->msg = '发现新的版本';
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

		echo_result($this->code, $this->msg, $this->data);
	}
}