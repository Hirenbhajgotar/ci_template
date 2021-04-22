<?php 
class Xls_notification_model extends CI_Model
{
    protected $table = 'xls_notification';
    public function set_notification($message = '')
    {
        $data = array(
            'vendor_id'  => $this->session->vendor_user_id,
            'message'    => $message,
            'status'     => 1,
            'created_at' => date('Y-m-d h:i:s'),
        );
        return $this->db->insert($this->table, $data);
    }
}