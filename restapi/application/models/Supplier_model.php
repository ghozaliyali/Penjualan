<?php
class Supplier_Model extends CI_Model {
    public function Get() {
        $message = $this->db->get('supplier');
        return $message->result_array();
    }

    public function Insert($data)
    {
        $result = $this->db->insert('supplier', $data);
        return $result;
    }

    public function Update($data)
    {
        $this->db->where('idsupplier', $data->idsupplier);
        $result = $this->db->update('supplier', $data);
        return $result;
    }

    public function Delete($id)
    {
        $this->db->where('idsupplier', $id['idsupplier']);
        $result = $this->db->delete('supplier');
        return $result;
    }
}