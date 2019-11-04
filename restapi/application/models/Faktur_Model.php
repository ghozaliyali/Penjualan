<?php
class Faktur_Model extends CI_Model {
    public function Get() {
        $message = $this->db->get('faktur');
        return $message->result_array();
    }

    public function Insert($data)
    {
        $result = $this->db->insert('faktur', $data);
        return $result;
    }

    public function Update($data)
    {
        $this->db->where('idfaktur', $data->idfaktur);
        $result = $this->db->update('faktur', $data);
        return $result;
    }

    public function Delete($id)
    {
        $this->db->where('idfaktur', $id['idfaktur']);
        $result = $this->db->delete('faktur');
        return $result;
    }
}