<?php
/**
 * Главный контроллер
 *
 * @package Controllers
 * @author Chaos
 */
	class Main extends Controller
	{
                /**
                 * конструктор
                 */
		function Main()
		{
			parent::Controller();
		}

                /**
                 * главная страница
                 */
		function index()
		{
            $data['page'] = 'main';
			$data['login'] = $this->session->userdata('login');
			if ($data['login'] == '')
			{
				$data['login'] = 'гость';
				$data['authorized'] = false;
			}
			else 
				$data['authorized'] = true;
			$this->load->view('main_tpl',$data);            
		}
		
	}
?>
