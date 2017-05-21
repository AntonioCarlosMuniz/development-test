<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
        
	public function index()
	{
        $path = dirname(__FILE__);

        file_put_contents('cron.txt', "*/30 * * * *  php $path/Welcome.php createOrder");
        exec('crontab cron.txt');
        $this->load->helper('url');
		$this->home();
	}
    
    public function home(){
        
        $this->load->model('model_cron');
        
        $data['encomendas'] = $this->model_cron->getEncomendas();
        
        $this->load->view('welcome_message', $data);
    }
    
    public function createOrder(){
        
        $row = $this->model_cron->randomProduct();
        $this->model_cron->randomOrder($row);
    }
}
