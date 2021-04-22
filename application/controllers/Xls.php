<?php
set_time_limit(20000);
require FCPATH . '/vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
class Xls extends MY_Controller 
{
    public function index()
    {
        $data['title'] = 'Xlsx List';
        $data['nav_title'] = 'xls';

        $config['base_url']             = base_url('xlsx-list');
        $config['total_rows']           = $this->db->count_all_results('xls');;
        $config['per_page']             = 2;
        $config['enable_query_strings'] = true;
        $config['page_query_string']    = true;
        $config['full_tag_open']        = "<ul class='pagination'>";
        $config['full_tag_close']       = '</ul>';
        $config['num_tag_open']         = '<li class="page-item">';
        $config['num_tag_close']        = '</li>';
        $config['cur_tag_open']         = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']        = '</span></li>';
        $config['prev_tag_open']        = '<li> ';
        $config['prev_tag_close']       = '</li>';
        $config['first_tag_open']       = '<li> ';
        $config['first_tag_close']      = '</li>';
        $config['last_tag_open']        = '<li>';
        $config['last_tag_close']       = '</li>';
        $config['prev_link']            = 'Previous';
        $config['prev_tag_open']        = '<li class="page-item">';
        $config['prev_tag_close']       = '</li>';
        $config['next_link']            = 'Next';
        $config['next_tag_open']        = '<li class="page-item">';
        $config['next_tag_close']       = '</li>';
        $config['attributes']           = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) && $_GET['per_page'] ? $_GET['per_page'] : 0;
        // $data['images'] = $this->VendorImage_Model->get_images($config['per_page'], $page);

        $data['xls_list'] = $this->Xls_Model->get_xls($config['per_page'], $page);
        
        $this->load->view('templates/head', $data);
        $this->load->view('xls/index');
        $this->load->view('templates/foot');

    }
    public function create_xls()
    {
        $data['title'] = 'Upload Xlsx';
        $data['nav_title'] = 'xls';
        $this->load->view('templates/head', $data);
        $this->load->view('xls/create_xls');
        $this->load->view('templates/foot');

    }

    public function upload_xls()
    {
        $data['title'] = 'Upload Xlsx';
        $data['nav_title'] = 'xls';
        
        if (empty($_FILES['xls_file']['name'])) {
            $this->session->set_flashdata('msg', 'Xlsx file is required');
            $this->session->set_flashdata('type', 'danger');
            redirect('upload-xlsx');
        } else {
            $user_dir_name = $this->session->vendor_username;
            $time_dir_name = str_replace('.', '', str_replace(' ', '', microtime()));

            if (!is_dir('uploads/' . $user_dir_name)) {
                mkdir('./uploads/' . $user_dir_name, 0777, TRUE);
            }
            if (!is_dir('uploads/' . $user_dir_name . '/' . $time_dir_name)) {
                mkdir('./uploads/' . $user_dir_name . '/' . $time_dir_name, 0777, TRUE);
            }
            $filesCount = count($_FILES['xls_file']['name']);
            $path = './uploads/' . $user_dir_name . '/' . $time_dir_name . '/';
            // Read the Excel file.
            $reader = IOFactory::createReader("Xlsx");
            $mainXlsFiles = [];
            for ($i = 0; $i < $filesCount; $i++) {
                $xlsFiles = [];
                $_FILES['exl_file']['name']     = $_FILES['xls_file']['name'][$i];
                $_FILES['exl_file']['type']     = $_FILES['xls_file']['type'][$i];
                $_FILES['exl_file']['tmp_name'] = $_FILES['xls_file']['tmp_name'][$i];
                $_FILES['exl_file']['error']    = $_FILES['xls_file']['error'][$i];
                $_FILES['exl_file']['size']     = $_FILES['xls_file']['size'][$i];
                
                $config['upload_path'] = './uploads/' . $user_dir_name . '/' . $time_dir_name;
                $config['allowed_types'] = 'xls|xlsx';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('exl_file')) {
                    
                    $xlsFiles['file_name']  = $this->upload->data('file_name');
                    $xlsFiles['path']       = $path;
                    $xlsFiles['vendor_id']  = $this->session->vendor_user_id;
                    $xlsFiles['created_at'] = date('Y-m-d h:i:s');
                    $xlsFiles['updated_at'] = date('Y-m-d h:i:s');

                    $mainXlsFiles[] = $xlsFiles;
                    
                    // $reader = new Xlsx();
                    $spreadsheet = $reader->load($path . $this->upload->data('file_name'));
                    // Export to CSV file.
                    $loadedSheetNames = $spreadsheet->getSheetNames();
        
                    $writer = IOFactory::createWriter($spreadsheet, "Csv");
                    foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
                        $writer->setSheetIndex($sheetIndex);
                        $writer->save($path . $this->upload->data('raw_name') . '_' . $loadedSheetName . '.csv');
                    }
                } else {
                    $this->session->set_flashdata('msg', $this->upload->display_errors());
                    $this->session->set_flashdata('type', 'danger');
                    redirect('upload-xlsx');
                }
                
            }
            // insert data inro database
            if(count($mainXlsFiles) > 0) {
                $this->replace_csv($path); // replace special charector
                $is_xls = $this->Xls_Model->batch_insert($mainXlsFiles);
                // $is_xls = $this->Xls_Model->create_xls($this->upload->data('file_name'), $path);
                if($is_xls) {
                    $xls_notification_msg = '<b>' . $this->session->vendor_username . '</b> Upload '. $filesCount. ' Xlsx file';
                    $this->set_xls_notification($xls_notification_msg);
                    $this->session->set_flashdata('msg', 'Xlsx file uploaded successfully');
                    $this->session->set_flashdata('type', 'success');
                    redirect('upload-xlsx');
                } else {
                    $this->session->set_flashdata('msg', 'Something went wrong, try again latter!');
                    $this->session->set_flashdata('type', 'danger');
                    redirect('upload-xlsx');
                }
            }
        }
    }

    public function replace_csv($path)
    {
        $files = glob($path . "/*.csv");
        foreach($files as $file_path) {
            $oldCsv = file_get_contents($file_path, FILE_USE_INCLUDE_PATH);
            $new_csv = str_replace(' - ', '-', str_replace(' ', '', str_replace('“', '"', str_replace('´´', '"', str_replace('½', '1/2', str_replace('•', '-', str_replace('™', '', str_replace('®', '', str_replace('°', '', $oldCsv)))))))));
            file_put_contents($file_path, $new_csv);
        }
        return true;
    }
}