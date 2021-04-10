<?php
class Pages extends CI_Controller
{
	public function view($page = 'home')
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}
		$data['title'] = ucfirst($page);
		$data['nav_title'] = $page;
		$this->load->view('templates/head', $data);
		$this->load->view('pages/' . $page);
		$this->load->view('templates/foot');
	}

	public function about($page = 'about')
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}
		$data['title'] = ucfirst($page);
		$data['nav_title'] = $page;
		$this->load->view('templates/head', $data);
		$this->load->view('pages/' . $page);
		$this->load->view('templates/foot');
	}
	public function contact($page = 'contact')
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}
		$data['title'] = ucfirst($page);
		$data['nav_title'] = $page;
		$this->load->view('templates/head', $data);
		$this->load->view('pages/' . $page);
		$this->load->view('templates/foot');
	}
	public function list($page = 'list')
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}
		$data['title'] = ucfirst($page);
		$data['nav_title'] = $page;
		$this->load->view('templates/head', $data);
		$this->load->view('pages/' . $page);
		$this->load->view('templates/foot');
	}

}
