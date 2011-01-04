<?php
/**
 * Модель данных для работы с аккаунтом
 * @package models
 * @author Chaos
 */


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
        /**
        * Модель данных для работы с аккаунтом
        */
	class Acc_model extends Model
	{
		/**
                * конструктор
                */
                function Acc_model()
		{
			parent::Model();
		}

                /**
                 * Получает список доходов пользователя
                 * @param string $login
                 * @param string $date1
                 * @param string $date2
                 * @return array
                 */
		function get_income_data($login, $date1, $date2)
		{
                    if (($date1 != '') && ($date2 != ''))
                    {
                        $query = $this->db->query("select date, name, category, summary, information, id from Incomes where user_id in (select id from Users where login = '$login') and date >= '$date1' and date <= '$date2' order by date");
                        return $query->result();
                    } else
                    {
                        $query = $this->db->query("select date, name, category, summary, information, id from Incomes where user_id in (select id from Users where login = '$login') order by date");
                        return $query->result();
                    }
		}

                /**
                 * Добавляет доход пользователя в базу
                 * @param string $login
                 * @param string $date
                 * @param string $name
                 * @param string $category
                 * @param string $summary
                 * @param string $information
                 */
                function add_income_data($login, $date, $name, $category, $summary, $information)
                {

                    $query = $this->db->query("select id from Users where login = '$login'");
                    if ($query->num_rows == 1)
                    {
                        $result = $query->result();
                        $id = $result[0]->id;
                        $this->db->query("insert into Incomes values('$date', '$name', '$category', $summary, '$information', $id, '')");
                    }
                }

                /**
                 * Удаляет доход из базы
                 * @param string $login
                 * @param string $id
                 */
                function del_income_data($login, $id)
                {
                        $this->db->query("delete from Incomes where id = $id");
                }

                 /**
                 * Получает список расходов
                 * @param string $login
                 * @param string $date1
                 * @param string $date2
                 * @return array
                 */
		function get_outcome_data($login, $date1, $date2)
		{
                    if (($date1 != '') && ($date2 != ''))
                    {
                        $query = $this->db->query("select date, name, category, summary, information, id from Outcomes where user_id in (select id from Users where login = '$login') and date >= '$date1' and date <= '$date2' order by date");
                        return $query->result();
                    } else
                    {
                        $query = $this->db->query("select date, name, category, summary, information, id from Outcomes where user_id in (select id from Users where login = '$login') order by date");
                        return $query->result();
                    }
		}

                /**
                 * Добавляет расход пользователя в базу
                 * @param string $login
                 * @param string $date
                 * @param string $name
                 * @param string $category
                 * @param string $summary
                 * @param string $information
                 */
                function add_outcome_data($login, $date, $name, $category, $summary, $information)
                {

                    $query = $this->db->query("select id from Users where login = '$login'");
                    if ($query->num_rows == 1)
                    {
                        $result = $query->result();
                        $id = $result[0]->id;
                        $this->db->query("insert into Outcomes values('$date', '$name', '$category', $summary, '$information', $id, '')");
                    }
                }

                /**
                 * Удаляет доход из базы
                 * @param string $login
                 * @param string $id
                 */
                function del_outcome_data($login, $id)
                {
                        $this->db->query("delete from Outcomes where id = $id");
                }

                 /**
                 * Получает список периодических доходов пользователя
                 * @param string $login
                 * @param string $date1
                 * @param string $date2
                 * @return array
                 */
		function get_periodic_income_data($login, $date1, $date2)
		{
			if (($date1 != '') && ($date2 != ''))
                        {
                            $query = $this->db->query("select date, name, summary, period, term, id from Periodic_incomes where user_id in (select id from Users where login = '$login') and date >= '$date1' and date <= '$date2' order by date");
                            return $query->result();
                        } else
                        {
                            $query = $this->db->query("select date, name, summary, period, term, id from Periodic_incomes where user_id in (select id from Users where login = '$login') order by date");
                            return $query->result();
                        }
		}

                /**
                 * Добавляет периодический доход пользователя в базу
                 * @param string $login
                 * @param string $date
                 * @param string $name
                 * @param string $summary
                 * @param string $period
                 * @param string $term
                 */
                function add_periodic_income_data($login, $date, $name, $summary, $period, $term)
                {

                    $query = $this->db->query("select id from Users where login = '$login'");
                    if ($query->num_rows == 1)
                    {
                        $result = $query->result();
                        $id = $result[0]->id;
                        $this->db->query("insert into Periodic_incomes values('$name', $summary, '$date', '$period', '$term', $id, '')");
                    }
                }

                /**
                 * Удаляет периодический доход из базы
                 * @param string $login
                 * @param string $id
                */
                function del_periodic_income_data($login, $id)
                {
                        $this->db->query("delete from Periodic_incomes where id = $id");
                }

                /**
                 * Получает список периодических расходов пользователя
                 * @param string $login
                 * @param string $date1
                 * @param string $date2
                 * @return array
                 */
		function get_periodic_outcome_data($login, $date1, $date2)
		{
			
                        if (($date1 != '') && ($date2 != ''))
                        {
                            $query = $this->db->query("select date, name, summary, period, term, id from Periodic_outcomes where user_id in (select id from Users where login = '$login') and date >= '$date1' and date <= '$date2' order by date");
                            return $query->result();
                        } else
                        {
                            $query = $this->db->query("select date, name, summary, period, term, id from Periodic_outcomes where user_id in (select id from Users where login = '$login') order by date");
                            return $query->result();
                        }
		}

                /**
                 * Добавляет периодический расход пользователя в базу
                 * @param string $login
                 * @param string $date
                 * @param string $name
                 * @param string $summary
                 * @param string $period
                 * @param string $term
                 */
                function add_periodic_outcome_data($login, $date, $name, $summary, $period, $term)
                {

                    $query = $this->db->query("select id from Users where login = '$login'");
                    if ($query->num_rows == 1)
                    {
                        $result = $query->result();
                        $id = $result[0]->id;
                        $this->db->query("insert into Periodic_outcomes values('$name', $summary, '$date', '$period', '$term', $id, '')");
                    }
                }

                /**
                 * Удаляет периодический расход из базы
                 * @param string $login
                 * @param string $id
                 */
                function del_periodic_outcome_data($login, $id)
                {
                        $this->db->query("delete from Periodic_outcomes where id = $id");
                }

                /**
                 * получает список категорий
                 * @return array
                 */
                function get_categories()
                {
                    $query = $this->db->query('select name from Categories');
                    return $query->result();
                }

                /**
                 * получает доходы для отчетов
                 * @param string $date1
                 * @param string $date2
                 */
                function rep_get_income_data($date1, $date2)
                {
                    if (($date1 != '') && ($date2 != ''))
                    {
                        $query = $this->db->query("select date, name, summary from Incomes where date >= '$date1' and date <= '$date2'");
                        return $query->result();                        
                    } else
                    {
                        $query = $this->db->query("select date, name, summary from Incomes");
                        return $query->result();
                    }
                }

                /**
                 * получает расходы для отчетов
                 * @param string $date1
                 * @param string $date2
                 */
                function rep_get_outcome_data($date1, $date2)
                {
                    if (($date1 != '') && ($date2 != ''))
                    {
                        $query = $this->db->query("select date, name, summary from Outcomes where date >= '$date1' and date <= '$date2'");
                        return $query->result();
                    } else
                    {
                        $query = $this->db->query("select date, name, summary from Outcomes");
                        return $query->result();
                    }
                }

                /**
                 * получает периодические доходы для отчетов
                 * @param string $date1
                 * @param string $date2
                 */
                function rep_get_per_income_data($date)
                {
                    $query = $this->db->query("select date, name, summary, period, term from Periodic_incomes where date <= '$date'");
                    return $query->result();
                }

                /**
                 * получает периодические расходы для отчетов
                 * @param string $date1
                 * @param string $date2
                 */
                function rep_get_per_outcome_data($date)
                {
                    $query = $this->db->query("select date, name, summary, period, term from Periodic_outcomes where date <= '$date'");
                    return $query->result();
                }

                /**
                 * cчитает баланс
                 * @param array $array
                 * @return array
                 */
                function sum($array)
                {
                    $sum = 0;
                    foreach($array as $value)
                    {
                        if ($value['type'] == 'доход') $sum += $value['summary'];
                        if ($value['type'] == 'расход') $sum -= $value['summary'];
                        if ($value['type'] == 'периодический доход') $sum += $value['summary'];
                        if ($value['type'] == 'периодический расход') $sum -= $value['summary'];
                    }
                    $c = count($array);
                    $array[$c]['type'] = '';
                    $array[$c]['date'] = '';
                    $array[$c]['name'] = '';
                    $array[$c]['summary'] = $sum;
                    return $array;
                }

                /**
                 * сортирует по дате
                 * @param array $array
                 * @return array
                 */
                function sort($array)
                {
                    for($i = 0; $i < count($array); $i++)
                    {
                        $min = $i;
                        for($j = $i; $j < count($array); $j++)
                        {
                            if ($this->date_cmp($array[$min]['date'],$array[$j]['date']) == 1) $min = $j;
                        }
                        $t = $array[$min]['type'];
                        $array[$min]['type'] = $array[$i]['type'];
                        $array[$i]['type'] = $t;
                        $t = $array[$min]['date'];
                        $array[$min]['date'] = $array[$i]['date'];
                        $array[$i]['date'] = $t;
                        $t = $array[$min]['name'];
                        $array[$min]['name'] = $array[$i]['name'];
                        $array[$i]['name'] = $t;
                        $t = $array[$min]['summary'];
                        $array[$min]['summary'] = $array[$i]['summary'];
                        $array[$i]['summary'] = $t;

                    }
                    return $array;
                }

                /**
                 * совмещает отчеты
                 * @param array $param
                 * @param string $date1
                 * @param string $date2
                 * @return array
                 */
                function combine($param, $date1, $date2)
                {
                    $result = array();
                    $i = 0;
                    if ($param[0] == 1)
                    {
                        $incomes = $this->rep_get_income_data($date1, $date2);
                        foreach($incomes as $value)
                        {
                            $result[$i] = array();
                            $result[$i]['type'] = 'доход';
                            $result[$i]['date'] = $value->date;
                            $result[$i]['name'] = $value->name;
                            $result[$i]['summary'] = $value->summary;
                            $i++;
                        }
                    }
                    if ($param[1] == 1)
                    {
                        $outcomes = $this->rep_get_outcome_data($date1, $date2);
                        foreach($outcomes as $value)
                        {
                            $result[$i] = array();
                            $result[$i]['type'] = 'расход';
                            $result[$i]['date'] = $value->date;
                            $result[$i]['name'] = $value->name;
                            $result[$i]['summary'] = $value->summary;
                            $i++;
                        }
                    }
                    if ($param[2] == 1)
                    {
                        $per_incomes = $this->rep_get_per_income_data($date2);
                        $per_incomes = $this->perform_periodic($per_incomes, $date1, $date2);
                        foreach($per_incomes as $value)
                        {
                            $result[$i] = array();
                            $result[$i]['type'] = 'периодический доход';
                            $result[$i]['date'] = $value['date'];
                            $result[$i]['name'] = $value['name'];
                            $result[$i]['summary'] = $value['summary'];
                            $i++;
                        }
                    }
                    if ($param[3] == 1)
                    {
                        $per_outcomes = $this->rep_get_per_outcome_data($date2);
                        $per_outcomes = $this->perform_periodic($per_outcomes, $date1, $date2);
                        foreach($per_outcomes as $value)
                        {
                            $result[$i] = array();
                            $result[$i]['type'] = 'периодический расход';
                            $result[$i]['date'] = $value['date'];
                            $result[$i]['name'] = $value['name'];
                            $result[$i]['summary'] = $value['summary'];
                            $i++;
                        }
                    }
                    $res = $this->sort($result);
                    return $res;
                }

                /**
                 *
                 * @param array $array
                 * @param string $date1
                 * @param string $date2
                 * @return array
                 */
                function perform_periodic($array, $date1, $date2)
                {
                    $result = array();
                    $i = 0;
                    foreach ($array as $value)
                    {
                        $inception_date = $value->date;
                        $name = $value->name;
                        $summary = $value->summary;
                        $period = $value->period;
                        $count = $value->term;
                        $new_date = $inception_date;
                        if ($count != 0)
                        {
                            $c = 0;
                            while(($this->date_cmp($date2, $new_date) == 1) && ($c < $count))
                            {

                                if ($date1 != '')
                                {
                                    if($this->date_cmp($new_date, $date1) == 1)
                                    {
                                        $result[$i] = array();
                                        $result[$i]['date'] = $new_date;
                                        $result[$i]['name'] = $name;
                                        $result[$i]['summary'] = $summary;
                                        $c++;$i++;
                                    }
                                    $new_date = $this->date_add($new_date, $period);
                                } else
                                {
                                    $result[$i] = array();
                                    $result[$i]['date'] = $new_date;
                                    $result[$i]['name'] = $name;
                                    $result[$i]['summary'] = $summary;
                                    $new_date = $this->date_add($new_date, $period);
                                    $c++;$i++;
                                }
                            }
                        } else
                        {
                            while($this->date_cmp($date2, $new_date) == 1)
                            {

                                if ($date1 != '')
                                {
                                    if($this->date_cmp($new_date, $date1) == 1)
                                    {
                                        $result[$i] = array();
                                        $result[$i]['date'] = $new_date;
                                        $result[$i]['name'] = $name;
                                        $result[$i]['summary'] = $summary;
                                        $i++;
                                    }
                                    $new_date = $this->date_add($new_date, $period);
                                } else
                                {
                                    $result[$i] = array();
                                    $result[$i]['date'] = $new_date;
                                    $result[$i]['name'] = $name;
                                    $result[$i]['summary'] = $summary;
                                    $new_date = $this->date_add($new_date, $period);
                                    $i++;
                                }
                            }
                        }
                    }
                    return $result;
                }

                /**
                 * сравнивает даты
                 * @param string $date1
                 * @param string $date2
                 * @return 1-,1
                 */
                function date_cmp($date1, $date2)
                {
                     $array1 = str_getcsv($date1, '-');
                     $array2 = str_getcsv($date2, '-');
                     if ($array1[0] > $array2[0]) return 1;
                     if ($array1[0] < $array2[0]) return -1;
                     if ($array1[1] > $array2[1]) return 1;
                     if ($array1[1] < $array2[1]) return -1;
                     if ($array1[2] > $array2[2]) return 1;
                     if ($array1[2] < $array2[2]) return -1;
                     return  1;
                }

                /**
                 * добавляет дни к дате
                 * @param string $date
                 * @param integer $value
                 * @return string
                 */
                function date_add($date, $value)
                {
                    $array = str_getcsv($date, '-');
                    $year = $array[0];
                    $month = $array[1];
                    $day = $array[2];
                    $val = $value;
                    while($this->day_month($year, $month) < $day + $val)
                    {
                        if ($month < 12)
                        {
                            $month++;
                            $val -= $this->day_month($year, $month);
                        }
                        else
                        {
                            $year++;
                            $month = 1;
                            $val -= $this->day_month($year, $month);

                        }
                    }
                    $day += $val;
                    if (strlen($month) == 1) $month = '0'.$month;
                    if (strlen($day) == 1) $day = '0'.$day;
                    return $year.'-'.$month.'-'.$day;
                }

                /**
                 * получает количество дней в месяце
                 * @param integer $year
                 * @param integer $month
                 * @return integer
                 */
                function day_month($year, $month)
                {
             
                    if ($month == 2)
                    {
                        $leap = $year % 4;
                        if ($leap == 0) return 29;
                        else return 28;
                    } elseif($month < 8)
                    {
                        if ($month % 2 != 0) return 31;
                        else return 30;
                    } else
                    {
                         if ($month % 2 != 0) return 30;
                         else return 31;
                    }
                }

	}
?>
