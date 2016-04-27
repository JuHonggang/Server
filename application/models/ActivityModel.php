<?php

define('TAB_NAME', 'activity_info_table');

class ActivityModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$result = $this->load->database();
		$this->load->helper('url');
		$this->load->helper('distance');
	}

	public function get_latest_activities()
	{
		$data = array();
		$sql = "select * from ".TAB_NAME;
		$page = $this->input->get('page');
		if (!empty($page))
		{
			$page_size = 10;
			$sql .= " limit ".($page-1) * $page_size.','.$page_size;
		}
		
		$query = $this->db->query($sql);
		if (!is_null($query) && count($query->result()))
		{
			foreach ($query->result() as $key => $activity) {
				$data[$key]['id'] = $activity->id;
				$data[$key]['user_id'] = $activity->user_id;
				$data[$key]['title'] = $activity->title;
				$data[$key]['user_icon'] = $activity->user_icon;
				$data[$key]['user_name'] = $activity->user_name;
				$data[$key]['destination'] = $activity->destination;
				$data[$key]['distance'] = $activity->distance;
				$data[$key]['create_time'] = $activity->create_time;
				$data[$key]['type'] = $activity->type;
				$data[$key]['activity_time'] = $activity->activity_time;
				$data[$key]['comment'] = $activity->comment;
				$data[$key]['longitude'] = $activity->longitude;
				$data[$key]['latitude'] = $activity->latitude;
			}
		} 
		
		return $data;
	}

	public function get_nearby_activities()
	{
		// 用户当前的位置
		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');
		$sql = "select * from ".TAB_NAME." where longitude between ".($lng-0.1)." and ".($lng+0.1)." and latitude between ".($lat-0.1)." and ".($lat+0.1).";";
		$query = $this->db->query($sql);
		if (!is_null($query) && count($query->result()) > 0)
		{
			foreach ($query->result() as $key => $activity) 
			{
				$data[$key]['id'] = $activity->id;
				$data[$key]['user_id'] = $activity->user_id;
				$data[$key]['title'] = $activity->title;
				$data[$key]['user_icon'] = $activity->user_icon;
				$data[$key]['user_name'] = $activity->user_name;
				$data[$key]['destination'] = $activity->destination;
				$data[$key]['distance'] = $activity->distance;
				$data[$key]['create_time'] = $activity->create_time;
				$data[$key]['type'] = $activity->type;
				$data[$key]['activity_time'] = $activity->activity_time;
				$data[$key]['comment'] = $activity->comment;
				$data[$key]['longitude'] = $activity->longitude;
				$data[$key]['latitude'] = $activity->latitude;
			}
		}

		return $data;
	}

	public function get_launched_activities()
	{
		$data = array();
		$user_id = $this->input->get('user_id');
		$page = $this->input->get('page');
		$sql = 'select * from ' .TAB_NAME.' where user_id='.$user_id.'';
		if (!empty($page))
		{
			$page_size = 10;
			$sql .= ' limit '.($page-1) * $page_size.','.$page_size;
		}
	
		$query = $this->db->query($sql);
		if (!is_null($query) && count($query) > 0)
		{
			foreach ($query->result() as $key => $activity) {
				$data[$key]['id'] = $activity->id;
				$data[$key]['user_id'] = $activity->user_id;
				$data[$key]['title'] = $activity->title;
				$data[$key]['user_icon'] = $activity->user_icon;
				$data[$key]['user_name'] = $activity->user_name;
				$data[$key]['destination'] = $activity->destination;
				$data[$key]['distance'] = $activity->distance;
				$data[$key]['create_time'] = $activity->create_time;
				$data[$key]['type'] = $activity->type;
				$data[$key]['activity_time'] = $activity->activity_time;
				$data[$key]['comment'] = $activity->comment;
				$data[$key]['longitude'] = $activity->longitude;
				$data[$key]['latitude'] = $activity->latitude;
			}
		}

		return $data;
	}

	public function get_specific_type_activities()
	{
		$data = array();
		$type = $this->input->get('type');
		$query = $this->db->get_where(TAB_NAME, array('type' => $type));
		if (!is_null($query) && count($query->result()))
		{
			foreach ($query->result() as $key => $activity) 
			{
				$data[$key]['id'] 				= $activity->id;
				$data[$key]['user_id'] 			= $activity->user_id;
				$data[$key]['title'] 			= $activity->title;
				$data[$key]['user_icon'] 		= $activity->user_icon;
				$data[$key]['user_name'] 		= $activity->user_name;
				$data[$key]['destination'] 		= $activity->destination;
				$data[$key]['distance'] 		= $activity->distance;
				$data[$key]['create_time'] 		= $activity->create_time;
				$data[$key]['type'] 			= $activity->type;
				$data[$key]['activity_time'] 	= $activity->activity_time;
				$data[$key]['comment'] 			= $activity->comment;
				$data[$key]['longitude'] 		= $activity->longitude;
				$data[$key]['latitude'] 		= $activity->latitude;
			}
		}
		
		return $data;
	}

	public function get_specific_activity()
	{
		$data = array();
		$id = $this->input->get('id');
		if (!empty($id))
		{
			$query = $this->db->get_where(TAB_NAME, array('id' => $id));
			if (!is_null($query) && $result = $query->row())
			{
				$data['id'] 			= $result->id;
				$data['user_id'] 		= $result->user_id;
				$data['title'] 			= $result->title;
				$data['user_icon'] 		= $result->user_icon;
				$data['user_name'] 		= $result->user_name;
				$data['destination'] 	= $result->destination;
				$data['distance'] 		= $result->distance;
				$data['create_time'] 	= $result->create_time;
				$data['type'] 			= $result->type;
				$data['activity_time'] 	= $result->activity_time;
				$data['comment'] 		= $result->comment;
				$data['longitude'] 		= $result->longitude;
				$data['latitude'] 		= $result->latitude;
			} 
		}

		return $data;
	}

	public function add_activity()
	{
		$data =  array(
			'title' 			=> $this->input->post('title'),
			'user_id' 			=> $this->input->post('user_id'),
			'user_name' 		=> $this->input->post('user_name'),
			'user_icon'			=> $this->input->post('user_icon'),
			'title'				=> $this->input->post('title'),
			'destination' 		=> $this->input->post('destination'),
			'create_time' 		=> time(),
			'type' 				=> $this->input->post('type'),
			'activity_time'		=> $this->input->post('activity_time'),
			'comment' 			=> $this->input->post('comment'),
			'longitude'			=> $this->input->post('longitude'),
			'latitude'			=> $this->input->post('latitude')
		);
		
		return $this->db->insert(TAB_NAME, $data);
	}

	public function del_activity()
	{	
		$id = $this->input->get('id');
		return $this->db->delete(TAB_NAME, array('id' => $id));
	}

	public function update_activity()
	{
		$data =  array(
			'title' 			=> $this->input->post('title'),
			'destination' 		=> $this->input->post('destination'),
			'type' 				=> $this->input->post('type'),
			'activity_time'		=> $this->input->post('activity_time'),
			'comment' 			=> $this->input->post('comment'),
			'longitude'			=> $this->input->post('longitude'),
			'latitude'			=> $this->input->post('latitude')
		);

		$this->db->where('id', $this->input->post('id'));
		return $this->db->update(TAB_NAME, $data);
	}
} 
