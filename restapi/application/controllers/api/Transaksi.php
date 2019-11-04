<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/API_Controller.php';
class Transaksi extends API_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model','TransaksiModel');
    }
    public function panggil() 
    {
        $Output = $this->TransaksiModel->Get();
        if($Output != null || count($Output)>0)
        {
            $this->api_return(
                [
                    'status' => true,
                    "result" => $Output
                ],
            200);
        }else{
            $this->api_return(
                [
                    'status' => false
                ],
            400);
        }
    }

    public function Tambah()
    {
        $data = $this->input->raw_input_stream;
        $Output = $this->TransaksiModel->Insert(json_decode($data));
        if($Output){
            $this->api_return(
                [
                    "status"=> true
                ], 200
            );
        }else{
            $this->api_return(
                [
                    "status"=> false
                ], 400
            );
        }
    }

    public function Ubah()
    {
        $data = json_decode($this->input->raw_input_stream);
        $Output = $this->TransaksiModel->Update($data);
        if($Output){
            $this->api_return(
                [
                    "status"=> true
                ], 200
            );
        }else{
            $this->api_return(
                [
                    "status"=> false
                ], 400
            );
        }
    }
    public function Hapus()
    {
        $id = $_GET;
        $Output = $this->TransaksiModel->Delete($id);
        if($Output){
            $this->api_return(
                [
                    "status"=> true
                ], 200
            );
        }else{
            $this->api_return(
                [
                    "status"=> false
                ], 400
            );
        }
    }
}

