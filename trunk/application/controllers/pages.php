<?php
/**
 * Контроллер страниц
 * @package Controllers
 * @author Chaos
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
						
						// Доходы
						$incomes = array();
						$objects = $this->graphic_reports_model->getIncomes($data['login']);
						foreach($objects as $obj)
						{
							$tmp = array();
							$tmp[] = $obj->category;
							$tmp[] = $obj->summary;
							$incomes[] = $tmp;
						}
						// Самописный Distinct по атрибуту Category
						for ($i = 0; $i < count($incomes); $i++)
						{
							$num = 0;
							for ($j = 0; $j < count($incomes); $j++)
							{
								if (@$incomes[$i][0] == @$incomes[$j][0])
								{
									$num++;
									if ($num > 1)
									{
										$incomes[$i][1] += $incomes[$j][1];
										unset($incomes[$j]);
									}
								}
							}
						}
						// Получаем проценты
						$sum = 0;
						foreach ($incomes as $cat)
						{
							$sum += $cat[1];
						}
						for ($i = 0; $i < count($incomes); $i++)
						{
							@$incomes[$i][1] = round((@$incomes[$i][1] / $sum) * 100, 1);
						}
						// Генерируем строку
						$data['incomes'] = '[';						
						foreach ($incomes as $cat)
						{
							@$data['incomes'] .= "['".$cat[0]."', ".$cat[1]."],";
						}
						$data['incomes'] .= ']';						
						
						
						
						//  Расходы
						$outcomes = array();
						$objects = $this->graphic_reports_model->getOutcomes($data['login']);
						foreach($objects as $obj)
						{
							$tmp = array();
							$tmp[] = $obj->category;
							$tmp[] = $obj->summary;
							$outcomes[] = $tmp;
						}
						$size = count($outcomes);
						// Самописный Distinct по атрибуту Category
						for ($i = 0; $i < $size; $i++)
						{
							$num = 0;
							for ($j = 0; $j < $size; $j++)
							{
								if (@$outcomes[$i][0] == @$outcomes[$j][0])
								{
									$num++;
									if ($num > 1)
									{
										$outcomes[$i][1] += $outcomes[$j][1];
										unset($outcomes[$j]);
										$size--;
									}
								}
							}
						}
						// Получаем проценты
						$sum = 0;
						foreach ($outcomes as $cat)
						{
							$sum += $cat[1];
						}
						for ($i = 0; $i < count($outcomes); $i++)
						{
							@$outcomes[$i][1] = round((@$outcomes[$i][1] / $sum) * 100, 1);
						}
						
						$data['outcomes'] = '[';						
						foreach ($outcomes as $cat)
						{
							$data['outcomes'] .= "['".@$cat[0]."', ".@$cat[1]."],";
						}
						$data['outcomes'] .= ']';
						
						// Периодические доходы
						$Objects = $this->graphic_reports_model->getPeriodicIncomes($data['login']);
						$incomes = array(); $maxPeriod = 0; $inLine = '[';
						foreach($Objects as $obj)
						{
							$tmp['sum'] = $obj->summary;
							$tmp['per'] = $obj->period;
							if ($obj->period > $maxPeriod)
							{
								$maxPeriod = $obj->period;
							}
							$incomes[] = $tmp;
						}
						for ($i = 1; $i <= $maxPeriod; $i++)
						{
							$sum = 0;
							foreach($incomes as $item)
							{
								if (($i % $item['per']) == 0)
								{
									$sum += $item['sum'];
								}
							}
							$inLine .= $sum.',';
						}
						$data['incomeTiming'] = $inLine.']';
						
						// Периодические  расходы
						$Objects = $this->graphic_reports_model->getPeriodicOutcomes($data['login']);
						$outcomes = array(); $outLine = '[';
						foreach($Objects as $obj)
						{
							$tmp['sum'] = $obj->summary;
							$tmp['per'] = $obj->period;
							if ($obj->period > $maxPeriod)
							{
								$maxPeriod = $obj->period;
							}
							$outcomes[] = $tmp;
						}
						for ($i = 1; $i <= $maxPeriod; $i++)
						{
							$sum = 0;
							foreach($outcomes as $item)
							{
								if (($i % $item['per']) == 0)
								{
									$sum += $item['sum'];
								}
							}
							$outLine .= $sum.',';
						}
						$data['outcomeTiming'] = $outLine.']';
						
						$this->load->view('graphic_report_tpl', $data);
					}
                }
	} 

?>
