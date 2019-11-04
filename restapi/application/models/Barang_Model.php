<?php
class Barang_Model extends CI_Model {
    public function GetBarang() {
        $message = $this->db->get('barang');
        return $message->result_array();
    }

    public function InsertBarang($data)
    {
        $result = $this->db->insert('barang', $data);
        return $result;
    }

    public function UpdateBarang($data)
    {
        $this->db->where('idbarang', $data->idbarang);
        $result = $this->db->update('barang', $data);
        return $result;
    }

    public function DeleteBarang($id)
    {
        $this->db->where('idbarang', $id['idbarang']);
        $result = $this->db->delete('barang');
        return $result;
    }
}