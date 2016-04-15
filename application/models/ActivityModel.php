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
				$data[$key]['status'] = $activity->status;
				$data[$key]['activity_time'] = $activity->activity_time;
				$data[$key]['comment'] = $activity->comment;
				$data[$key]['number_of_person'] = $activity->number_of_person;
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
				$data[$key]['distance'] = get_distance($lat, $lng, $activity->latitude, $activity->longitude);
				$data[$key]['create_time'] = $activity->create_time;
				$data[$key]['type'] = $activity->type;
				$data[$key]['status'] = $activity->status;
				$data[$key]['activity_time'] = $activity->activity_time;
				$data[$key]['comment'] = $activity->comment;
				$data[$key]['longitude'] = $activity->longitude;
				$data[$key]['latitude'] = $activity->latitude;
				$data[$key]['number_of_person'] = $activity->number_of_person;
			}
		}

		return $data;
	}

	public function get_launched_activities()
	{
		$data = array();
		$user_id = $this->input->get('user_id');
		$page = $this->input->get('page');
		$sql = 'select * from ' .TAB_NAME.' where user_id='.$user_id.';';
		if (!empty($page))
		{
			$page_size = 10;
			$sql .= 'limit '.$page * $page_size.','.$page_size;
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
				$data[$key]['create_time'] = $activity->create_time;
				$data[$key]['type'] = $activity->type;
				$data[$key]['status'] = $activity->status;
				$data[$key]['activity_time'] = $activity->activity_time;
				$data[$key]['comment'] = $activity->comment;
				$data[$key]['longitude'] = $activity->longitude;
				$data[$key]['latitude'] = $activity->latitude;
				$data[$key]['number_of_person'] = $activity->number_of_person;
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
				$data[$key]['id'] = $activity->id;
				$data[$key]['user_id'] = $activity->user_id;
				$data[$key]['title'] = $activity->title;
				$data[$key]['user_icon'] = $activity->user_icon;
				$data[$key]['user_name'] = $activity->user_name;
				$data[$key]['destination'] = $activity->destination;
				$data[$key]['distance'] = $activity->distance;
				$data[$key]['create_time'] = $activity->create_time;
				$data[$key]['type'] = $activity->type;
				$data[$key]['status'] = $activity->status;
				$data[$key]['activity_time'] = $activity->activity_time;
				$data[$key]['comment'] = $activity->comment;
				$data[$key]['number_of_person'] = $activity->number_of_person;
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
				$data['id'] = $result->id;
				$data['user_id'] = $result->user_id;
				$data['title'] = $result->title;
				$data['user_icon'] = $result->user_icon;
				$data['user_name'] = $result->user_name;
				$data['destination'] = $result->destination;
				$data['distance'] = $result->distance;
				$data['create_time'] = $result->create_time;
				$data['type'] = $result->type;
				$data['status'] = $result->status;
				$data['activity_time'] = $result->activity_time;
				$data['comment'] = $result->comment;
				$data['number_of_person'] = $result->number_of_person;
			} 
		}

		return $data;
	}

	public function add_activity()
	{
		//phpinfo();
		$data =  array(
			'title' 			=> $this->input->post('title'),
			'user_id' 			=> $this->input->post('user_id'),
			'user_name' 		=> $this->input->post('user_name'),
			'user_icon'			=> $this->input->post('user_icon'),
			'destination' 		=> $this->input->post('destination'),
			'distance' 			=> $this->input->post('distance'),
			'create_time' 		=> date('Y-m-d H:i', time()),
			'type' 				=> $this->input->post('type'),
			'status' 			=> $this->input->post('status'),
			'activity_time'		=> $this->input->post('time'),
			'comment' 	=> $this->input->post('comment')
			);
		
		return $this->db->insert(TAB_NAME, $data);
	}

	public function del_activity($id)
	{	
		$id = $this->input->get('id');
		return $this->db->delete(TAB_NAME, array('id' => $id));
	}

	public function update_activity()
	{
		$data =  array(
			'title' 			=> $this->input->post('title'),
			'user_id' 			=> $this->input->post('user_id'),
			'user_name' 		=> $this->input->post('user_name'),
			'destination' 		=> $this->input->post('destination'),
			'distance' 			=> $this->input->post('distance'),
			'create_time' 		=> date('H-m-D H:i', time()),
			'type' 				=> $this->input->post('type'),
			'status' 			=> $this->input->post('status'),
			'number_of_person' 	=> $this->input->post('number_of_person'),
			);

		return $this->db->replace(TAB_NAME, $data);
	}
} 
