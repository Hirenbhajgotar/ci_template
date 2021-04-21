<?php

class VendorImage extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Image';
        $data['nav_title'] = 'image';
        
        $config['base_url']             = base_url('vendor-image');
        $config['total_rows']           = $this->db->count_all_results('vendor_image');;
        $config['per_page']             = 5;
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
        $data['images'] = $this->VendorImage_Model->get_images($config['per_page'], $page);
        
        $this->load->view('templates/head', $data);
        $this->load->view('vendor_image/image');
        $this->load->view('templates/foot');
    }

    public function upload_image()
    {
        $data['title'] = 'Image';
        $data['nav_title'] = 'image';
        $this->load->view('templates/head', $data);
        $this->load->view('vendor_image/upload_image');
        $this->load->view('templates/foot');
    }
    public function upload_images()
    {
        // $file_name = time() . '-' . $_FILES["image"]['name'];
        $user_dir_name = $this->session->vendor_username;
        if(empty($_FILES['image']['name'])) {
            $this->session->set_flashdata('msg', 'Image field is required');
            $this->session->set_flashdata('type', 'danger');
            redirect('upload-image');
        } else {
            if (!is_dir('uploads/images/' . $user_dir_name)) {
                mkdir('./uploads/images/' . $user_dir_name, 0777, TRUE);
            }
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $file_name_old = basename($_FILES['image']['name'], '.'.$ext);
            // $file_name = $user_dir_name . $file_name_old . str_replace('.', '', str_replace(' ', '', microtime())) . "-L.".$ext;
            $file_name = str_replace('.', '', $user_dir_name . $file_name_old . str_replace(' ', '', microtime())) . "-L.".$ext;
            
            $config = array(
                'upload_path'   => "./uploads/images/" . $user_dir_name,
                'allowed_types' => "jpg|png|jpeg|JPEG|JPG|PNG",
                'file_name'     => $file_name
            );
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('image')) {
                $this->load->library('image_lib');
                
                $thumb_file_1 = $user_dir_name . $file_name_old . str_replace('.', '', str_replace(' ', '', microtime())) . "-S." . $ext;
                $thumb_file_2 = $user_dir_name . $file_name_old . str_replace('.', '', str_replace(' ', '', microtime())) . "-T." . $ext;
                // Create thumnail or resize image
                $thumb_1['image_library']  = 'gd2';
                $thumb_1['source_image']   = './uploads/images/' . $user_dir_name . '/' . $file_name;
                $thumb_1['new_image']      = './uploads/images/' . $user_dir_name . '/' . $thumb_file_1;               // path where you want to save thumnail
                $thumb_1['width']          = 300;
                $thumb_1['height']         = 300;
    
                $thumb_2['image_library']  = 'gd2';
                $thumb_2['source_image']   = './uploads/images/' . $user_dir_name . '/' . $file_name;
                $thumb_2['new_image']      = './uploads/images/' . $user_dir_name . '/' . $thumb_file_2;               // path where you want to save thumnail
                $thumb_2['width']          = 100;
                $thumb_2['height']         = 100;
                
                $this->image_lib->initialize($thumb_1);
                $library_thumb_1 = $this->image_lib->resize();
                $this->image_lib->initialize($thumb_2);
                $library_thumb_2 = $this->image_lib->resize();
    
                if(!$library_thumb_1 && !$library_thumb_2) {
                    $data['error'] = $this->image_lib->display_errors();
                    $this->session->set_flashdata('msg', $data);
                    $this->session->set_flashdata('type', 'danger');
                    redirect('upload-image');
                } else {
                    $imageArray = [
                        'main_image' => $file_name, 'small_image' => $thumb_file_1, 'thumb_image' => $thumb_file_2
                    ];
                    $this->VendorImage_Model->upload_images($imageArray);
                    $this->session->set_flashdata('msg', 'Image Uploaded Successfully');
                    $this->session->set_flashdata('type', 'success');
                    redirect('upload-image');
                }
            } else {
                $this->session->set_flashdata('msg', $this->upload->display_errors());
                $this->session->set_flashdata('type', 'danger');
                redirect('upload-image');
            }
        }
    }

    public function delete_image($id)
    {
        $vendor_image = $this->VendorImage_Model->get_single_record($id);
        if(file_exists(VENDOR_IMAGE . $this->session->vendor_username . '/' . $vendor_image->main_image)) {
            unlink(VENDOR_IMAGE.$this->session->vendor_username. '/' . $vendor_image->main_image);
        }
        if(file_exists(VENDOR_IMAGE . $this->session->vendor_username . '/' . $vendor_image->small_image)) {
            unlink(VENDOR_IMAGE.$this->session->vendor_username. '/' . $vendor_image->small_image);
        }
        if(file_exists(VENDOR_IMAGE . $this->session->vendor_username . '/' . $vendor_image->thumb_image)) {
            unlink(VENDOR_IMAGE.$this->session->vendor_username. '/' . $vendor_image->thumb_image);
        }
        if($this->VendorImage_Model->delete($vendor_image->id)) {
            $this->session->set_flashdata('msg', 'Record Deleted successfully!');
            $this->session->set_flashdata('type', 'success');
            redirect('vendor-image');
        } else {
            $this->session->set_flashdata('msg', 'Something went wrong try again later!');
            $this->session->set_flashdata('type', 'danger');
            redirect('vendor-image');
        }
    }

    public function edit_image($id = null)
    {
        if($id) {
            $data['title'] = 'Edit Image';
            $data['vendor_image'] = $this->VendorImage_Model->get_single_record($id);
            $this->load->view('templates/head', $data);
            $this->load->view('vendor_image/edit_image');
            $this->load->view('templates/foot');
        } 
        else 
            return false;
    }

    public function update_image($id = null)
    {
        if($id) {
            if (empty($_FILES['image']['name'])) {
                $this->session->set_flashdata('msg', 'Image field is required');
                $this->session->set_flashdata('type', 'danger');
                redirect('edit-image/'. $id);
            } else {
                $user_dir_name = $this->session->vendor_username;
                $vendor_image = $this->VendorImage_Model->get_single_record($id);
                
                // unlink image
                if (file_exists(VENDOR_IMAGE . $this->session->vendor_username . '/' . $vendor_image->main_image)) {
                    unlink(VENDOR_IMAGE . $this->session->vendor_username . '/' . $vendor_image->main_image);
                }
                if (file_exists(VENDOR_IMAGE . $this->session->vendor_username . '/' . $vendor_image->small_image)) {
                    unlink(VENDOR_IMAGE . $this->session->vendor_username . '/' . $vendor_image->small_image);
                }
                if (file_exists(VENDOR_IMAGE . $this->session->vendor_username . '/' . $vendor_image->thumb_image)) {
                    unlink(VENDOR_IMAGE . $this->session->vendor_username . '/' . $vendor_image->thumb_image);
                }

                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $file_name_old = basename($_FILES['image']['name'], '.' . $ext);
                // $file_name = $user_dir_name . $file_name_old . str_replace('.', '', str_replace(' ', '', microtime())) . "-L.".$ext;
                $file_name = str_replace('.', '', $user_dir_name . $file_name_old . str_replace(' ', '', microtime())) . "-L." . $ext;

                $config = array(
                    'upload_path'   => "./uploads/images/" . $user_dir_name,
                    'allowed_types' => "jpg|png|jpeg|JPEG|JPG|PNG",
                    'file_name'     => $file_name
                );

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $this->load->library('image_lib');

                    $thumb_file_1 = $user_dir_name . $file_name_old . str_replace('.', '', str_replace(' ', '', microtime())) . "-S." . $ext;
                    $thumb_file_2 = $user_dir_name . $file_name_old . str_replace('.', '', str_replace(' ', '', microtime())) . "-T." . $ext;
                    // Create thumnail or resize image
                    $thumb_1['image_library']  = 'gd2';
                    $thumb_1['source_image']   = './uploads/images/' . $user_dir_name . '/' . $file_name;
                    $thumb_1['new_image']      = './uploads/images/' . $user_dir_name . '/' . $thumb_file_1;               // path where you want to save thumnail
                    $thumb_1['width']          = 300;
                    $thumb_1['height']         = 300;

                    $thumb_2['image_library']  = 'gd2';
                    $thumb_2['source_image']   = './uploads/images/' . $user_dir_name . '/' . $file_name;
                    $thumb_2['new_image']      = './uploads/images/' . $user_dir_name . '/' . $thumb_file_2;               // path where you want to save thumnail
                    $thumb_2['width']          = 100;
                    $thumb_2['height']         = 100;

                    $this->image_lib->initialize($thumb_1);
                    $library_thumb_1 = $this->image_lib->resize();
                    $this->image_lib->initialize($thumb_2);
                    $library_thumb_2 = $this->image_lib->resize();

                    if (!$library_thumb_1 && !$library_thumb_2) {
                        $data['error'] = $this->image_lib->display_errors();
                        $this->session->set_flashdata('msg', $data);
                        $this->session->set_flashdata('type', 'danger');
                        redirect('edit-image/' . $id);
                    } else {
                        $imageArray = [
                            'main_image' => $file_name, 'small_image' => $thumb_file_1, 'thumb_image' => $thumb_file_2
                        ];
                        if($this->VendorImage_Model->update($id, $imageArray)) {
                            $this->session->set_flashdata('msg', 'Image Updated Successfully');
                            $this->session->set_flashdata('type', 'success');
                            redirect('vendor-image');
                        } else {
                            $this->session->set_flashdata('msg', 'Something went wrong try again later!');
                            $this->session->set_flashdata('type', 'danger');
                            redirect('edit-image/' . $id);
                        }
                    }
                } else {
                    $this->session->set_flashdata('msg', $this->upload->display_errors());
                    $this->session->set_flashdata('type', 'danger');
                    redirect('edit-image/' . $id);
                }
            }
        } else {
            return false;
        }
    }

}