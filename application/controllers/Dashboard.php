<?php 
Class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('model_mhs');
    }

    function index(){

    }

    function login(){
        if($_POST['username']){
            $data = array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password')
            );
            $return = $this->model_mhs->login($data);
            $this->output
                ->set_status_header(201)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($return, JSON_PRETTY_PRINT))
                ->_display();
                exit;
        }
    }

    function add(){
        //Data Login Dummy
        $data = array(
            'nim' => "14.01.074",
            'nama' => "Adi Prasetyo Nugroho",
            'alamat' => "Jalan Satu Kampung Timur",
            'tanggal_lahir' => "1996-07-12",
            'tempat_lahir' => "Balikpapan",
            'tanggal_daftar' => "2014-07-06",
            'nama_orangtua' => "Bill Gates",
            'username' => "admin",
            'password' => password_hash("admin",PASSWORD_BCRYPT)
        );
        $this->db->insert('tbl_mhs',$data);
    }

}