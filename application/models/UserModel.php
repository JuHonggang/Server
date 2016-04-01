<?php

define ('USER_TABLE', 'user_info_table');
define ('CODE_TABLE', 'code_table');

class UserModel extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('distance');
	}

	public function get_user_info()
	{
		$data = array();
		$query = $this->db->get_where(USER_TABLE, array('id' => $this->input->get('uid')));
		if (!is_null($query) && !is_null($result=$query->row()))
		{
			$data['id'] = $result->id;
			$data['icon'] = $result->icon;
			$data['nick_name'] = $result->nick_name;
		}

		return $data;
	}

	public function generate_nickname($len = 8)
	{	
		$nickname = 'player_';
		for ($i = 0; $i < $len; $i++)
		{
			$nickname .= mt_rand(0, 9);
		}

		return $nickname;
	}

	public function register()
	{
		$data = array(
			'tel_number' => $this->input->get('tel_number'),
			'passwd' => $this->input->get('passwd'),
			'nick_name' => $this->generate_nickname(),
			'create_time' => date('Y-m-d H:i:s', time()));
		$data['passwd'] = is_null($data['passwd']) ? '' : $data['passwd'];
		$result = $this->db->insert(USER_TABLE, $data);
		print_r($result);
		if ($result)
		{
			return $data;
		}

		return null;
	} 

	public function login_by_code()
	{
		$data = array();
		$tel_number = $this->input->get('tel_number');
		$code = $this->input->get('code');
		$query = $this->db->get_where(CODE_TABLE, array('tel_number' => $tel_number, 'code' => $code));
		if (!is_null($query) && $result = $query->row())
		{
			$query = $this->db->get_where(USER_TABLE, array('tel_number' => $tel_number));
			if (!is_null($query) && $result = $query->row())
			{
				$data['id'] = $result->id;
				$data['nick_name'] = $result->nick_name;
				$data['tel_number'] = $result->tel_number;
				$data['has_passwd'] = $result->has_passwd;
				return $data;
			}
			else
			{
				return $this->register();
			}
		}
		
		return null;
	}


	public function login_by_account()
	{
		$data = array();
		$tel_number = $this->input->get('tel_number');
		$passwd = $this->input->get('passwd');
		$query = $this->db->get_where(USER_TABLE, array('tel_number' => $tel_number, 'passwd' => $passwd));
		if (!is_null($query) && $result = $query->row())
		{
			$data['id'] = $result->id;
			$data['nick_name'] = $result->nick_name;
			$data['tel_number'] = $result->tel_number;
			$data['gender'] = $result->gender;
			$data['icon'] = $result->icon;
			$data['sign'] = $result->sign;
			$data['passwd'] = $result->passwd;
			$data['has_passwd'] = $result->has_passwd;
			$data['create_time'] = $result->create_time;
		}
		
		return $data;
	}

	public function generate_code()
	{
		$code = '';
		for ($i = 0; $i < 6; $i++)
		{
			$code .= mt_rand(0, 9);
		}
		
		return $code;
	}

	public function get_sms_code()
	{
		$tel_number = $this->input->get('tel_number');
		$code = $this->generate_code();
		require_once(BASEPATH.'../taobao-sdk/TopSdk.php');
		$c = new TopClient;
		$c->appkey = '23319465';
		$c->secretKey = '377d06e20690954e30dd1c7df3742fe9';
		$req = new AlibabaAliqinFcSmsNumSendRequest;
		$req->setExtend("123456");
		$req->setSmsType("normal");
		$req->setSmsFreeSignName("注册验证");
		$req->setSmsParam("{\"code\":\"$code\",\"product\":\" 测试应用 \",\"item\":\"上海\"}");
		$req->setRecNum($tel_number);
		$req->setSmsTemplateCode("SMS_5405669");
		$resp = $c->execute($req);
		if (!is_null($resp->result) && $resp->result->success)
		{
			$result = $this->user->save_code($tel_number, $code);
			return $result ? $code : null;
		}

		return null;
	}

	public function is_exist()
	{
		$data = array();
		$tel_number = $this->input->get('tel_number');
		$query = $this->db->get_where(USER_TABLE, array('tel_number' => $tel_number));
		if (!is_null($query) && $result = $query->row())
		{
			$data['id'] = $result->id;
		}
	
		return $data;
	}

	public function vertify_code()
	{
		$tel_number = $this->input->get('tel_number');
		$code = $this->input->get('code');
		$query = $this->db->get_where(CODE_TABLE, array('tel_number' => $tel_number, 'code' => $code));
		if (!is_null($query) && !is_null($query->row())) 
		{
			return true;
		}

		return false;
	}

	public function save_code($tel_number, $code)
	{
		$data = array(
			'tel_number' => $tel_number,
			'code' => $code,
			'insert_time' => date('Y-m-d H:i:s', time()));
	
		return $this->db->insert(CODE_TABLE, $data);
	}

	public function reset_passwd()
	{
		$this->db->set('has_passwd', 1);
		$this->db->set('passwd', $this->input->get('new_passwd'));
		$this->db->where('tel_number', $this->input->get('tel_number'));

		return $this->db->update(USER_TABLE);
	}

	public function modify_user_icon()
	{
		$icon_url = 'http://7xrqzm.com1.z0.glb.clouddn.com/'.$this->input->post('icon');
		$this->db->set('icon', $icon_url);
		$this->db->where('id', $this->input->post('uid'));

		if ($this->db->update(USER_TABLE))
		{
			return $icon_url;
		}

		return null;
	}

	public function update_user_info()
	{
		$this->db->set('gender', $this->input->post('gender'));
		$this->db->set('sign', $this->input->post('sign'));
		$this->db->where('id', $this->input->post('id'));

		return $this->db->update(USER_TABLE);
	}

	public function get_nearby_users()
	{
		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');
		$sql = 'select * from '.USER_TABLE.' where longitude between '.($lng-0.1).' and '.($lng+0.1).' and latitude between '.($lat-0.1).' and '.($lat+0.1).';';
		$query = $this->db->query($sql);
		if (!is_null($query) && count($query->result()) > 0)
		{
			foreach ($query->result() as $key => $user) {
				$data[$key]['id'] = $user->id;
				$data[$key]['nick_name'] = $user->nick_name;
				$data[$key]['gender'] = $user->gender;
				$data[$key]['icon'] = $user->icon;
				$data[$key]['sign'] = $user->sign;
				$data[$key]['distance'] = get_distance($lat, $lng, $user->latitude, $user->longitude);
				$data[$key]['longitude'] = $user->longitude;
				$data[$key]['latitude'] = $user->latitude;
			}
		}

		return $data;
	}
}