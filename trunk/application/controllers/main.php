<?php
    /**
    *@property CI_Loader           $load
    *@property CI_Form_validation  $form_validation
    *@property CI_Input            $input
    *@property CI_Email            $email
    *@property CI_DB_active_record $db
    *@property CI_DB_forge         $dbforge
    *@property CI_Table            $table
    *@property CI_Session          $session
    *@property CI_FTP              $ftp
    **/
	class Main extends Controller
	{

		function Main()
		{
			parent::Controller();
		}
	
		function index()
		{   
                    $data['page'] = 'main';
                    $data['login'] = $this->session->userdata('login');
                    if ($data['login'] == '')
                    {
                        $data['login'] = 'гость';
                        $data['authorized'] = false;
                    }
                    else $data['authorized'] = true;
                    $this->load->view('main_tpl',$data);
		}
	}

<<<<<<< .mine
?>
=======
        function Main()
        {
            parent::Controller();
        }
		
        function index()
        {        	
          $this->load->view('main_tpl');
        }

		function finish()
		{
			if ($this->db->table_exists('Categories') && 
				$this->db->table_exists('ci_sessions') &&
				$this->db->table_exists('Incomes') &&
				$this->db->table_exists('Outcomes') &&
				$this->db->table_exists('Periodic_incomes') &&
				$this->db->table_exists('Periodic_incomes') &&
				$this->db->table_exists('Periodic_outcomes')
			) 
			{
				echo "Все уже готово к работе. Вернитесь на <a href=\".\">главную страницу</a>";
			}
			else
			{
					$query = $this->db->query('
					CREATE TABLE IF NOT EXISTS `Categories` (
					  `name` text NOT NULL,
					  `code` int(11) NOT NULL AUTO_INCREMENT,
					  PRIMARY KEY (`code`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;
					');

					$query = $this->db->query('
					CREATE TABLE IF NOT EXISTS `ci_sessions` (
					  `session_id` varchar(40) NOT NULL DEFAULT \'0\',
					  `ip_address` varchar(16) NOT NULL DEFAULT \'0\',
					  `user_agent` varchar(50) NOT NULL,
					  `last_activity` int(10) unsigned NOT NULL DEFAULT \'0\',
					  `user_data` text NOT NULL,
					  PRIMARY KEY (`session_id`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8;			
					');

					$query = $this->db->query('
					CREATE TABLE IF NOT EXISTS `Incomes` (
					  `date` date NOT NULL,
					  `name` text NOT NULL,
					  `category` text NOT NULL,
					  `summary` int(11) NOT NULL,
					  `information` text NOT NULL,
					  `user_id` int(11) NOT NULL,
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;
					');

					$query = $this->db->query('
					CREATE TABLE IF NOT EXISTS `Outcomes` (
					  `date` date NOT NULL,
					  `name` text NOT NULL,
					  `category` text NOT NULL,
					  `summary` int(11) NOT NULL,
					  `information` text NOT NULL,
					  `user_id` int(11) NOT NULL,
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;
					');			

					$query = $this->db->query('
					CREATE TABLE IF NOT EXISTS `Periodic_incomes` (
					  `name` text NOT NULL,
					  `summary` int(11) NOT NULL,
					  `date` date NOT NULL,
					  `period` int(11) NOT NULL,
					  `term` int(11) NOT NULL,
					  `user_id` int(11) NOT NULL,
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;
					');

					$query = $this->db->query('
					CREATE TABLE IF NOT EXISTS `Periodic_outcomes` (
					  `name` text NOT NULL,
					  `summary` int(11) NOT NULL,
					  `date` date NOT NULL,
					  `period` int(11) NOT NULL,
					  `term` int(11) NOT NULL,
					  `user_id` int(11) NOT NULL,
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;
					');

					$query = $this->db->query('
					CREATE TABLE IF NOT EXISTS `Users` (
					  `login` text NOT NULL,
					  `password` text NOT NULL,
					  `email` text NOT NULL,
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54;			
					');
					echo "Установка успешно завершилась. Можете <a href=\".\">начать</a> работу.";			
			}			
		}
		
    }
?>>>>>>>> .r9
