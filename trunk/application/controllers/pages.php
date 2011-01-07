<?php
/**
 * Контроллер страниц
 * @package Controllers
 * @author Chaos, Mehonoshin Stanislav
 */

	class Pages extends Controller
	{
		/**
                 * конструктор
                 */
        function Pages()
		{
			parent::Controller();
		}

                /**
                 * Генерирует страницу доходов
                 */
		function incomes()
		{						
                    $date1 = $this->input->post('date1');
                    $date2 = $this->input->post('date2');
                    $data['page'] = 'incomes';
                    $data['login'] = $this->session->userdata('login');
                    if (($date1 != '') && ($date2 != ''))
                    {
                        $data['date1'] = $date1;
                        $data['date2'] = $date2;
                    } else
                    {
                        $data['date1'] = 'Дата Начала';
                        $data['date2'] = date("Y-m-d");

                    }
                    if ($data['login'] == '')
                    {
                        $data['login'] = 'гость';
                        $data['authorized'] = false;
                    }
                    else
                    {
                        $data['authorized'] = true;
                        $this->load->model('acc_model');
                        $data['array_data'] = $this->acc_model->get_income_data($data['login'], $date1, $date2);
                        $data['categories'] = $this->acc_model->get_categories();
                    }
                    $this->load->view('main_tpl',$data);
		}

                /**
                 * Вставка дохода
                 */
                function insert_income()
                {
                    $date = $this->input->post('date');
                    $name = $this->input->post('name');
                    $category = $this->input->post('category');
                    $summary = $this->input->post('summary');
                    $information = $this->input->post('information');
                    $this->load->model('acc_model');
                    $this->acc_model->add_income_data($this->session->userdata('login'), $date, $name, $category, $summary, $information);
                    redirect("http://localhost/cm-accounting/pages/incomes");
                }

                /**
                 * Удаляет дохода
                 * @param integer $id
                 */
                function delete_income($id)
                {
                    $this->load->model('acc_model');
                    $this->acc_model->del_income_data($this->session->userdata('login'), $id);
                    redirect("http://localhost/cm-accounting/pages/incomes");
                }

                /**
                 * Генерирует страницу расходов
                 */
		function outcomes()
		{
                    $date1 = $this->input->post('date1');
                    $date2 = $this->input->post('date2');
                    $data['page'] = 'outcomes';
                    $data['login'] = $this->session->userdata('login');
                    if (($date1 != '') && ($date2 != ''))
                    {
                        $data['date1'] = $date1;
                        $data['date2'] = $date2;
                    } else
                    {
                        $data['date1'] = 'Дата Начала';
                        $data['date2'] = date("Y-m-d");

                    }

                    if ($data['login'] == '')
                    {
                        $data['login'] = 'гость';
                        $data['authorized'] = false;
                    }
                    else
                    {
                        $data['authorized'] = true;
                        $this->load->model('acc_model');
                        $data['array_data'] = $this->acc_model->get_outcome_data($data['login'], $date1, $date2);
                        $data['categories'] = $this->acc_model->get_categories();
                    }
                    $this->load->view('main_tpl',$data);
		}

                /*
                 * вставляет расход
                 */
                function insert_outcome()
                {
                    $date = $this->input->post('date');
                    $name = $this->input->post('name');
                    $category = $this->input->post('category');
                    $summary = $this->input->post('summary');
                    $information = $this->input->post('information');
                    $this->load->model('acc_model');
                    $this->acc_model->add_outcome_data($this->session->userdata('login'), $date, $name, $category, $summary, $information);
                    redirect("http://localhost/cm-accounting/pages/outcomes");
                }

                /**
                 *удаляет расход
                 * @param integer $id
                 */
                function delete_outcome($id)
                {
                    $this->load->model('acc_model');
                    $this->acc_model->del_outcome_data($this->session->userdata('login'), $id);
                    redirect("http://localhost/cm-accounting/pages/outcomes");
                }

                /**
                 * Генерирует страницу периодических доходов
                 */
		function periodic_incomes()
		{
                    $date1 = $this->input->post('date1');
                    $date2 = $this->input->post('date2');
                    $data['page'] = 'periodic_incomes';
                    $data['login'] = $this->session->userdata('login');
                    if (($date1 != '') && ($date2 != ''))
                    {
                        $data['date1'] = $date1;
                        $data['date2'] = $date2;
                    } else
                    {
                        $data['date1'] = 'Дата Начала';
                        $data['date2'] = date("Y-m-d");

                    }
                    if ($data['login'] == '')
                    {
                        $data['login'] = 'гость';
                        $data['authorized'] = false;
                    }
                    else
                    {
                        $data['authorized'] = true;
                        $this->load->model('acc_model');
                        $array_data = $this->acc_model->get_periodic_income_data($data['login'], $date1, $date2);
                        $data['array_data'] = $array_data;
                    }
                    $this->load->view('main_tpl',$data);
		}

                /**
                 * вставляет периодический доход
                 */
                function insert_periodic_income()
                {
                    $date = $this->input->post('date');
                    $name = $this->input->post('name');
                    $summary = $this->input->post('summary');
                    $period = $this->input->post('period');
                    $term = $this->input->post('term');
                    $this->load->model('acc_model');
                    $this->acc_model->add_periodic_income_data($this->session->userdata('login'), $date, $name, $summary, $period, $term);
                    redirect("http://localhost/cm-accounting/pages/periodic_incomes");
                }

                /**
                 * удаляет периодический доход
                 * @param integer $id
                 */
                function delete_periodic_income($id)
                {
                    $this->load->model('acc_model');
                    $this->acc_model->del_periodic_income_data($this->session->userdata('login'), $id);
                    redirect("http://localhost/cm-accounting/pages/periodic_incomes");
                }

                /**
                 * Генерирует страницу периодических расходов
                 */
		function periodic_outcomes()
		{
                    $date1 = $this->input->post('date1');
                    $date2 = $this->input->post('date2');
                    $data['page'] = 'periodic_outcomes';
                    $data['login'] = $this->session->userdata('login');
                    if (($date1 != '') && ($date2 != ''))
                    {
                        $data['date1'] = $date1;
                        $data['date2'] = $date2;
                    } else
                    {
                        $data['date1'] = 'Дата Начала';
                        $data['date2'] = date("Y-m-d");

                    }
                    if ($data['login'] == '')
                    {
                        $data['login'] = 'гость';
                        $data['authorized'] = false;
                    }
                    else
                    {
                        $data['authorized'] = true;
                        $this->load->model('acc_model');
                        $array_data = $this->acc_model->get_periodic_outcome_data($data['login'], $date1, $date2);
                        $data['array_data'] = $array_data;
                    }
                    $this->load->view('main_tpl',$data);
		}

                /**
                 * вставляет периодический расход
                 */
                function insert_periodic_outcome()
                {
                    $date = $this->input->post('date');
                    $name = $this->input->post('name');
                    $summary = $this->input->post('summary');
                    $period = $this->input->post('period');
                    $term = $this->input->post('term');
                    $this->load->model('acc_model');
                    $this->acc_model->add_periodic_outcome_data($this->session->userdata('login'), $date, $name, $summary, $period, $term);
                    redirect("http://localhost/cm-accounting/pages/periodic_outcomes");
                }

                /**
                 * удаляет периодический расход
                 * @param integer $id
                 */
                function delete_periodic_outcome($id)
                {
                    $this->load->model('acc_model');
                    $this->acc_model->del_periodic_outcome_data($this->session->userdata('login'), $id);
                    redirect("http://localhost/cm-accounting/pages/periodic_outcomes");
                }

                /**
                 * Генерирует страницу отчетов
                 */
                function reports()
                {	
					$data['page'] = 'reports';
                    $data['login'] = $this->session->userdata('login');
                    
					if (@$_POST['variant'] != 'graphic')
					{
						$date1 = $this->input->post('date1');
	                    $date2 = $this->input->post('date2');
	                    if (($date1 != '') && ($date2 != ''))
	                    {
	                        $data['date1'] = $date1;
	                        $data['date2'] = $date2;
	                    } else
	                    {
	                        $data['date1'] = 'Дата Начала';
	                        $data['date2'] = date("Y-m-d");

	                    }
	                    if ($data['login'] == '')
	                    {
	                        $data['login'] = 'гость';
	                        $data['authorized'] = false;
	                    }
	                    else
	                    {
	                        $data['authorized'] = true;
	                        if ($date2 == 'Дата Конца')
	                        {
	                            $data['error'] = 'Дата конца обязательна';
	                            $data['array_data'] = array ();
	                        } elseif ($date2 != '')
	                        {
	                            if ($date1 == 'Дата Начала') $date1 = '';
	                            if ($date2 == 'Дата Конца') $date2 = '';
	                            $data['error'] = '';
	                            $this->load->model('acc_model');
	                            $param = array();
	                            if ($this->input->post('income') == 'on') $param[0] = 1; else $param[0] = 0;
	                            if ($this->input->post('outcome') == 'on') $param[1] = 1; else $param[1] = 0;
	                            if ($this->input->post('periodic_income') == 'on') $param[2] = 1; else $param[2] = 0;
	                            if ($this->input->post('periodic_outcome') == 'on') $param[3] = 1; else $param[3] = 0;
	                            $data['array_data'] = $this->acc_model->sum($this->acc_model->combine($param, $date1, $date2));

	                        } else
	                        {
	                            $data['error'] = '';
	                            $data['array_data'] = array();
	                        }
	                    }
						$this->load->view('main_tpl',$data);
					}
                    else
					{
						$data['authorized'] = true;
						if ($data['login'] == '')
	                    {
	                        $data['login'] = 'гость';
	                        $data['authorized'] = false;
	                    }
						// Get data
						
						$this->load->model('graphic_reports_model');	
						$this->load->library('statistics');
						
						// Доходы
						$objects = $this->graphic_reports_model->getIncomes($data['login']);
						$data['incomes'] = $this->statistics->getPercentage($objects);
						
						//  Расходы
						$objects = $this->graphic_reports_model->getOutcomes($data['login']);
						$data['outcomes'] = $this->statistics->getPercentage($objects);

						// Получим массивы с данными по периодическим доходам/расходам
						$Objects = $this->graphic_reports_model->getPeriodicIncomes($data['login']);	
						$arr1 = $this->statistics->fetchPeriodic($Objects);
						$Objects = $this->graphic_reports_model->getPeriodicOutcomes($data['login']);
						$arr2 = $this->statistics->fetchPeriodic($Objects);
						
						// Найдем максимальный период платежа
						$maxPeriod = $this->statistics->getMaxPeriod($arr1, $arr2);

						// Получим json для графиков
						$data['incomeTiming'] = $this->statistics->buildPeriodicJson($arr1, $maxPeriod);
						$data['outcomeTiming'] = $this->statistics->buildPeriodicJson($arr2, $maxPeriod);
						
						$this->load->view('graphic_report_tpl', $data);
					}
                }
	} 

?>
