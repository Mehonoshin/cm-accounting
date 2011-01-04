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

    class Registrator extends Controller
    {
        function Registration()
        {
            parent::Controller();
        }

        function index()
        {
            $data['error'] = '';
            $this->load->view('registration_tpl',$data);
        }

        function test($login, $password, $password_repeat, $email)
        {
            if ($login == '') return 'Логин не может быть пустым';
            if ($login == 'гость') return 'Данный логин зарезервирован';
            if ($password == '') return 'Пароль не может быть пустым';
            if ($password != $password_repeat) return 'Пароли не совпадают';
            if ($this->registration_model->exist($login)) return 'Пользователь существует';
            return '';
        }

        function registrate()
        {
            $login = $this->input->post('login');
            $password =  $this->input->post('password');
            $password_repeat = $this->input->post('password_repeat');
            $email = $this->input->post('email');
            $this->load->model('registration_model');
            $test = $this->test($login, $password, $password_repeat, $email);
            if ($test == '')
            {
                $this->registration_model->add_to_base($login,$password,$email);
                $this->session->sess_create();
                $this->session->set_userdata('login',$login);
                redirect('http://localhost/cm-accounting/');
            } else
            {
                $data['error'] = $test;
                $this->load->view('registration_tpl',$data);
            }
        }

        function enter()
        {
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $this->load->model('registration_model');
            if ($this->registration_model->exist($login))
            {
                $hash = $this->registration_model->get_password($login);
                if (md5($password) == $hash)
                {
                    $this->session->sess_create();
                    $this->session->set_userdata('login', $login);
                    redirect('http://localhost/cm-accounting/');
                }
                redirect('http://localhost/cm-accounting/');
            }
            redirect('http://localhost/cm-accounting/');
        }

        function escape()
        {
            $this->session->sess_destroy();
            redirect('http://localhost/cm-accounting/');
        }

    }

?>
