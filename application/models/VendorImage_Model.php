<?php
class VendorImage_Model extends CI_Model
{
    protected $table = 'vendor_image';
    public function __construct()
    {
        $this->load->database();
    }

    public function upload_images($imgArray)
    {
        $data = array(
            'vendor_id'   => $this->session->vendor_user_id,
            'main_image'  => $imgArray['main_image'],
            'small_image' => $imgArray['small_image'],
            'thumb_image' => $imgArray['thumb_image'],
            'created_at'  => date('Y-m-d h:i:s'),
            'updated_at'  => date('Y-m-d h:i:s'),
        );
        return $this->db->insert($this->table, $data);
    }

    public function get_images($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_single_record($id = null)
    {
        if($id) {
            $this->db->where('id', $id);
            $query = $this->db->get($this->table);
            return $query->row();
        } else {
            return false;
        }
    }

    public function delete($id = null)
    {
        if($id) {
            $this->db->delete($this->table, ['id' => $id]);
            return true;
        } else {
            return false;
        }
    }

    public function update($id = null, $imageArray)
    {
        if($id) {
            $this->db->set('main_image', $imageArray['main_image']);
            $this->db->set('small_image', $imageArray['small_image']);
            $this->db->set('thumb_image', $imageArray['thumb_image']);
            $this->db->where('id', $id);
            $this->db->update($this->table);
            return true;
        } else {
            return false;
        }
    }
}
