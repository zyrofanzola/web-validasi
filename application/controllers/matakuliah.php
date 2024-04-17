<?php
class matakuliah extends CI_Controller 
{ 
    public function __construct() // Corrected construct to __construct
    {
        parent::__construct(); // Added parent constructor call
        $this->load->library('form_validation'); // Load form validation library
    }
    public function index() 
    { 
        $this->load->view('view-form-matakuliah');
    } 
    public function cetak() 
    {
        $this->form_validation->set_rules('kode', 'Kode Matakuliah', 'required|min_length[3]',
            [ 
                'required' => 'Kode Matakuliah Harus diisi', 
                'min_length' => 'Kode terlalu pendek' // Corrected typo
            ]); 
        $this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required|min_length[3]',
            [ 
                'required' => 'Nama Matakuliah Harus diisi', 
                'min_length' => 'Nama terlalu pendek' // Corrected typo
            ]); 
        if ($this->form_validation->run() !== true) { // Corrected operator to !==
            $this->load->view('view-form-matakuliah');
        } else { 
            $data = [ 
                'kode' => $this->input->post('kode'), 
                'nama' => $this->input->post('nama'), 
                'sks' => $this->input->post('sks') 
            ]; 
            $this->load->view('view-data-matakuliah', $data); 
        } 
    } 
} 
?>
