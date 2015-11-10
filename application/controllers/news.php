<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class News extends Admin_Controller {
 


    function __construct()
    {
        parent::__construct();
        $this->load->model("newsmodel","news");
        if(!$this->ion_auth->in_group('admin'))
        {
          $this->session->set_flashdata('message','You are not allowed to visit the Groups page');
          redirect('admin','refresh');
        }
    }

    function index()
    {
        $data['news'] = $this->news->getAll();
        $this->load->view('templates/_parts/admin_master_header_view'); 
        $this->load->view("news/index",$data);
    }

    public function view()
    {
    
        $id = $this->uri->segment(3);
        $news = $this->news->getById($id);;
    
        if (empty($id))
        {
            show_404();
        }
    
        $data['news'] = $news;
        $this->load->view('templates/header', $data);
        $this->load->view("news/view",$data);
 
    }
 

    function create()
    {
        if(@$_POST['create_news'])
        {
 
            $data = $_POST['news'];
            $data['date'] = date('Y-m-d H:i:s');
            $data['author'] = $this->ion_auth->user()->row()->username;
            $this->news->add($data);
            $this->session->set_flashdata('message',"новость добавлена");
            redirect("news");
        }

        $path = '../js/ckfinder';
        $width = '100%';
        $this->editor($path, $width);

        $this->load->view('templates/_parts/admin_master_header_view');        
        $this->load->view("news/create");

    }

    function edit()
    {
        $id = $this->uri->segment(3);
        $news = $this->news->getById($id);
        if(!$news)
        {
            redirect("news");
        }
        if(@$_POST['update_news'])
        {
            $newsdata = $_POST['news'];
            $this->news->update($newsdata,$id);
            $this->session->set_flashdata('message',"новость изменена");
            redirect("news");
        }
        $data['news'] = $news;

        $path = '../js/ckfinder';
        $width = '100%';
        $this->editor($path, $width);

        $this->load->view('templates/_parts/admin_master_header_view'); 
        $this->load->view("news/edit",$data);
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        $this->news->delete($id);
        $this->session->set_flashdata('message',"новость удалена");
        redirect("news");
    }   

    function editor($path,$width) {
        //Loading Library For Ckeditor
        $this->load->library('ckeditor');
        $this->load->library('ckFinder');
        //configure base path of ckeditor folder 
        $this->ckeditor->basePath = base_url().'js/ckeditor/';
        $this->ckeditor-> config['toolbar'] = 'Full';
        $this->ckeditor->config['language'] = 'ru';
        $this->ckeditor-> config['width'] = $width;
        //configure ckfinder with ckeditor config 
        $this->ckfinder->SetupCKEditor($this->ckeditor,$path); 
    }        

}

