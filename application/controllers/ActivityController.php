<?php

//include ("../third_party/taobao-sdk/top/request/TopClient.php");
//include ("../third_party/taobao-sdk/top/request/AlibabaAliqinFcSmsNumSendRequest");

class ActivityController extends CI_Controller
{
	private $code = 0;
	private $msg = '操作失败';
	private $data = null;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ActivityModel', 'activity', TRUE);
		$this->load->model('ActivityTypeModel', 'activity_type', TRUE);
		$this->load->model('SuggestionModel', 'suggestion', TRUE);
		$this->load->library('pagination');
		$this->load->helper('format');
		$this->load->helper('util');
		$this->load->helper('url');
	}

	public function index()
	{
		//$this->load->view('test');
		return $this->get_latest_activities();
		/*if (!function_exists('getspecificactivity')) 
		{
			echo "The function is not exist!";
		} else 
		{*/
			//$this->getLatestActivity();
		//}
		//var_dump($array);
	}

	public function view($page = 'home')
	{
	    if (!file_exists(APPPATH.'/views/pages/'.$page.'.php'))
	    {
	        // Whoops, we don't have a page for that!
	        show_404();
	    }

	    $data['title'] = ucfirst($page); // Capitalize the first letter

	    $this->load->view('templates/header', $data);
	    $this->load->view('pages/'.$page, $data);
	    $this->load->view('templates/footer', $data);
	}

	public function get_latest_activities()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->activity->get_latest_activities();
			if (!empty($this->data))
			{
				$this->code = 1;
				$this->msg = "数据获取成功";
			}
			else
			{
				$this->code = 0;
				$this->msg = "近期没有活动哦";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
			$this->data = array();
		}

		echo_result($this->code, $this->msg, $this->data);
	}

	public function get_nearby_activities()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->activity->get_nearby_activities();
			if (!is_null($this->data))
			{
				$this->code = 1;
				$this->msg = "数据获取成功";
			}
			else
			{
				$this->code = 0;
				$this->msg = "附近没有活动哦";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
			$this->data = array();
		}

		echo_result($this->code, $this->msg, $this->data);
	}

	public function get_specific_type_activities()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->activity->get_specific_type_activities();
			if (!empty($this->data))
			{
				$this->code = 1;
				$this->msg = "数据获取成功";
			}
			else
			{
				$this->code = 0;
				$this->msg = "近期没有活动哦";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
			$this->data = array();
		}

		echo_result($this->code, $this->msg, $this->data);
	}

	public function get_launched_activities()
	{
		if (isvalid_sign($_GET))
		{
			if (has_logined())
			{
				$this->data = $this->activity->get_launched_activities();
				if (!is_null($this->data))
				{
					$this->code = 1;
					$this->msg = "数据获取成功";
				}
				else
				{
					$this->code = 0;
					$this->msg = "没有发布过活动哦";
				}
			}
			else
			{
				$this->code = -1;
				$this->msg = "没有登录";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

		echo_result($this->code, $this->msg, $this->data);
	}

	public function get_specific_activity()
	{
		if (isvalid_sign($_GET))
		{
			if (has_logined())
			{
				$this->data = $this->activity->get_specific_activity();
				if (!is_null($this->data))
				{
					$this->code = 1;
					$this->msg = "数据获取成功";
				}
				else
				{
					$this->code = 0;
					$this->msg = "该活动不存在哦";
				}
			}
			else
			{
				$this->code = -1;
				$this->msg = "没有登录";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

		echo_result($this->code, $this->msg, $this->data);
	}

	public function add_activity()
	{
		if (isvalid_sign($_GET))
		{
			if (has_logined())
			{
				$this->data = $this->activity->add_activity();
				if ($this->data)
				{
					$this->code = 1;
					$this->msg = "活动添加成功";
				}
				else
				{
					$this->code = 0;
					$this->msg = "活动添加失败";
				}
			}
			else
			{
				$this->code = -1;
				$this->msg = "没有登录";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

		echo_result($this->code, $this->msg, $this->data);
	}

	public function del_activity()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->activity->del_activity();
			if ($this->data)
			{
				$this->code = 1;
				$this->msg = "活动已删除";
			}
			else
			{
				$this->code = 0;
				$this->msg = "活动删除失败";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}
		
		echo_result($this->code, $this->msg, $this->data);
	}

	public function update_activity()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->activity->update_activity($id);
			if ($this->data)
			{
				$this->code = 1;
				$this->msg = "更新成功";
			}
			else
			{
				$this->code = 0;
				$this->msg = "更新失败";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}
		
		echo_result($this->code, $this->msg, $this->data);
	}

	public function get_all_activity_type()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->activity_type->get_all_activity_type();
			if (!empty($this->data))
			{
				$this->code = 1;
				$this->msg = "数据获取成功";
			}
			else
			{
				$this->code = 0;
				$this->msg = "数据获取失败";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
			$this->data = array();
		}

		echo_result($this->code, $this->msg, $this->data);
	}

	public function submit_suggestion()
	{
		phpinfo();
		if (isvalid_sign($_GET))
		{
			$this->data = $this->suggestion->submit_suggestion();
			if ($this->data)
			{
				$this->code = 1;
				$this->msg = "提交成功";
			}
			else
			{
				$this->code = 0;
				$this->msg = "提交失败";
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

