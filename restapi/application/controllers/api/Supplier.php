<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/API_Controller.php';
class Supplier extends API_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model','SupplierModel');
    }
    public function panggil() 
    {
        $Output = $this->SupplierModel->Get();
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
        $Output = $this->SupplierModel->Insert(json_decode($data));
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
        $Output = $this->SupplierModel->Update($data);
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
        $Output = $this->SupplierModel->Delete($id);
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

