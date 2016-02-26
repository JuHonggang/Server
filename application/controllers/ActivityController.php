<?php
class ActivityController extends CI_Controller
{
	private $code = 0;
	private $msg = '操作失败';
	private $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ActivityModel', 'activity', TRUE);
		$this->load->helper('helper');
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

	public function test(){
		echo "hello";
	}

	public function view($page = 'home')
	{
	    if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
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
		$this->data = $this->activity->get_latest_activities();
		return echo_result($this->code, $this->msg, $this->data);
	}

	public function get_specific_type_activities()
	{
		$this->data = $this->activity->get_specific_type_activities();
		return echo_result($this->code, $this->msg, $this->data);
	}

	public function get_specific_activity()
	{
		$this->data = $this->activity->get_specific_activity();
		return echo_result($this->code, $this->msg, $this->data);
	}

	public function add_activity()
	{
		$this->activity->add_activity();
	}

	public function del_activity()
	{
		$this->activity->del_activity();
	}

	public function update_activity()
	{
		$this->activity->update_activity($id);
	}
}

?>
