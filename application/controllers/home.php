<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->model("newsmodel","news");
    }
 
    function index()
    {
        $this->load->library('pagination');
        $total = $this->news->countAll();
        $page = 1;
        if(@$this->uri->segment(2))
        {
            $page = $this->uri->segment(2);
        }
        $limit = 30;
        $offset = ($page - 1)*$limit;
     
        $data['news'] = $this->news->getAll(array('offset' => $offset,'limit' => $limit));
     
        $config['use_page_numbers'] = TRUE;
        $config['base_url'] = site_url('news');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['uri_segment'] = 2;
        $config['num_links'] = 2;
     
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
     
        $this->pagination->initialize($config); 
        $data['pagination'] = $this->pagination->create_links();        
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
     
    public function view($id)
    {
    
        $id = $this->uri->segment(3);
        $news = $this->news->getById($id);;
    
        if (empty($id))
        {
            show_404();
        }
        #Счетчик просмотров
        $this->add_count($id);

        $data['news'] = $news;
        $this->load->view('templates/header', $data);
        $this->load->view("home/view",$data);
 
    }

    function add_count($id) { 
        $check_visitor = $this->input->cookie($id, FALSE); 
        $ip = $this->input->ip_address();
        if ($check_visitor == false) { 
            $cookie = array( 
                "name" => $id, 
                "value" => "$ip", 
                "expire" => time() + 7200, 
                "secure" => false 
                ); 
                $this->input->set_cookie($cookie); 
                $this->news->update_counter($id); 
        } 
    } 

}
