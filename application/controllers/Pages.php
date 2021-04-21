<?php
require FCPATH . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
class Pages extends CI_Controller
{
	public function view($page = 'home')
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}
		// $spreadsheet = new Spreadsheet();
		// Read the Excel file.
		// $reader = IOFactory::createReader("Xlsx");
		// $spreadsheet = $reader->load("Financial Sample.xlsx");
		// // Export to CSV file.
		// $writer = IOFactory::createWriter($spreadsheet, "Csv");
		// $writer->setSheetIndex(0);   // Select which sheet to export.
		// $writer->setDelimiter(';');  // Set delimiter.

		// $writer->save("my-excel-file.csv");
		

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
