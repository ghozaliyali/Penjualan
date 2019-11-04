<?php
class Transaksi_Model extends CI_Model {
    public function Get() {
        $message = $this->db->get('transaksi');
        return $message->result_array();
    }

    public function Insert($data)
    {
        $result = $this->db->insert('transaksi', $data);
        return $result;
    }

    public function Update($data)
    {
        $this->db->where('idtransaksi', $data->idtransaksi);
        $result = $this->db->update('transaksi', $data);
        return $result;
    }

    public function Delete($id)
    {
        $this->db->where('idtransaksi', $id['idtransaksi']);
        $result = $this->db->delete('transaksi');
        return $result;
    }
}