<?php

require APPPATH.'third_party/php-sdk-7.0.7/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class UserController extends CI_Controller
{
	private $code = 0;
	private $msg = '操作失败';
	private $data = null;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'user', TRUE);
		$this->load->helper('format');
		$this->load->helper('url');
		$this->load->helper('util');
		$this->load->add_package_path(APPPATH.'third_party/taobao/');
	}

	public function index()
	{
		//echo $this->user->get_default_user_icon();
	}

	public function get_user_info()
	{
		if (isvalid_sign($_GET))
		{
			if (has_logined())
			{
				$this->data = $this->user->get_user_info();
				if (!empty($this->data))
				{
					$this->code = 1;
					$this->msg = "数据获取成功";
				}
				else 
				{
					$this->code = 0;
					$this->msg = "该用户不存在";
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

	public function get_sms_code()
	{
		if (isvalid_sign($_GET))
		{
			$data = $this->user->get_sms_code();
			if (!is_null($data))
			{
				$this->code = 1;
				$this->msg = "验证码已发送到您的手机，请注意查收";
			}
			else
			{
				$this->code = 0;
				$this->msg = "验证码发送失败";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

		echo_result($this->code, $this->msg, $data);
	}

	public function register()
	{
		if (isvalid_sign($_GET))
		{
			if (!$this->user->is_exist()) 
			{
				$this->data = $this->user->register();
				if (!empty($this->data))
				{
					$this->code = 1;
					$this->msg = "注册成功";
				}
				else
				{
					$this->code = 0;
					$this->msg = "您已注册，请直接登录";
				}
			}
			else
			{
				$this->code = 0;
				$this->msg = "该账号已存在，请直接登录";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}
		
		echo_result($this->code, $this->msg, $this->data);
	}

	public function login_by_account()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->user->login_by_account();
			if (!empty($this->data))
			{
				$this->code = 1;
				$this->msg = "登录成功";
			}
			else
			{
				$this->code = 0;
				$this->msg = "登录失败";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

		echo_result($this->code, $this->msg, $this->data);
	}

	public function login_by_code()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->user->login_by_code();
			if (!empty($this->data))
			{
				$this->code = 1;
				$this->msg = "登录成功";
			}
			else
			{
				$this->code = 0;
				$this->msg = "手机号码或验证码错误";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

		echo_result($this->code, $this->msg, $this->data);
	}

	public function vertify_telnumber()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->user->is_exist();
			if (!empty($this->data))
			{
				$this->code = 1;
				$this->msg = "该用户存在";
			} 
			else
			{
				$this->code = 0;
				$this->msg = "该用户不存在";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

	    echo_result($this->code, $this->msg, $this->data);
	}

	public function vertify_code()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->user->vertify_code();
			if ($this->data)
			{
				$this->code = 1;
				$this->msg = "验证码正确";
			}
			else
			{
				$this->code = 0;
				$this->msg = "验证码错误";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

		echo_result($this->code, $this->msg, $this->data);
	}

	public function reset_passwd()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->user->reset_passwd();
			if ($this->data)
			{
				$this->code = 1;
				$this->msg = "密码修改成功";
			}
			else
			{
				$this->code = 0;
				$this->msg = "密码修改失败";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

		echo_result($this->code, $this->msg, $this->data);
	}


	public function get_nearby_contact()
	{
		$lon = $this->input->get('lon');
		$lat = $this->input->get('lat');
		$ch = curl_init("http://yuntuapi.amap.com/nearby/around?key='6b82ad5cc81642973d987ecf5e939749'&center='lon=121.514,31.2046'&radius=10000&timerange=43200");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		$output = curl_exec($ch);
		if ($output === FALSE)
		{
			echo "curl error:".curl_error($ch);
		}

		echo $output;
	}

	public function get_token()
	{
		if (isvalid_sign($_GET))
		{
			// 用于签名的公钥和私钥
			$accessKey = '2TlARu5yB9yh89r8Oc4zLiMr8lkDbPFsguKqE8_N';
			$secretKey = 'NKt2L4OG-XAaUPJ7SDQHZU8fEtn6BEbCAkGpZNH4';
			// 初始化签权对象
			$auth = new Auth($accessKey, $secretKey);
			$bucket = 'together-play';
			$token = $auth->uploadToken($bucket);
			
			if (!empty($token)) {
				$this->code = 1;
				$this->msg = "token获取成功";
			}
			else 
			{
				$this->code = 0;
				$this->msg = "token获取失败";
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

		echo_result($this->code, $this->msg, $token);
	}	

	public function modify_user_icon()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->user->modify_user_icon();
			if (!is_null($this->data))
			{
				$this->code = 1;
				$this->msg = "头像上传成功";
			}
			else
			{
				$this->code = 0;
				$this->msg = "头像上传失败";
				$this->data = '';
			}
		}
		else
		{
			$this->code = 2;
			$this->msg = "签名错误";
		}

		echo_result($this->code, $this->msg, $this->data);
	}

	public function update_user_info()
	{
		if (isvalid_sign($_GET))
		{
			$this->data = $this->user->update_user_info();
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

		echo_result($this->code, $this->msg, null);
	}

	public function get_nearby_users()
	{
		if (isvalid_sign($_GET))
		{
			if (has_logined()) 
			{
				$this->data = $this->user->get_nearby_users();
				if (!is_null($this->data))
				{
					$this->code = 1;
					$this->msg = "用户列表获取成功";
				}
				else
				{
					$this->code = 0;
					$this->msg = "您附近还没有其他好友";
				}
			}
			else
			{
				$this->code = －1;
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
}