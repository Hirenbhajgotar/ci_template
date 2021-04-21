<?php
class Xls_Model extends CI_Model
{
    protected $table = 'xls';
    public function __construct()
    {
        $this->load->database();
    }

    public function create_xls($xls_file, $dir_path)
    {
        $data = array(
            'path'       => $dir_path,
            'file_name'  => $xls_file,
            'vendor_id'  => $this->session->vendor_user_id,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        );
        return $this->db->insert($this->table, $data);
    }

    public function get_xls($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result();
    }
}