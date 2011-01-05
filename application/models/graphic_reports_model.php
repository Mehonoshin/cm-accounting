<?php
    /**
     * Модель данных для графических отчетов
     * @package models 
     * @author Mekhonoshin Stanislav 
     */

    /**
     * Модель данных для регистрации
     */
    class Graphic_reports_model extends Model
    {
        /**
         * Конструктор
         */
        function Registration_model()
        {
            parent::Model();
        }

        function getIncomes($login)
        {
			// Получим id нашего пользователя
            $result = $this->db->query("SELECT id FROM Users WHERE login = '$login'");
            if ($result->num_rows != 0)
            {
                $result = $result->result();
                $id = $result[0]->id;
            }
			// Выберем доходы с нужным id
			$result = $this->db->query("SELECT category, summary FROM Incomes WHERE user_id = '$id'");
            if ($result->num_rows != 0)
            {
                return $result->result();
            }
        }
		
		function getOutcomes($login)
        {
			// Получим id нашего пользователя
            $result = $this->db->query("SELECT id FROM Users WHERE login = '$login'");
            if ($result->num_rows != 0)
            {
                $result = $result->result();
                $id = $result[0]->id;
            }
			// Выберем доходы с нужным id
			$result = $this->db->query("SELECT category, summary FROM Outcomes WHERE user_id = '$id'");
            if ($result->num_rows != 0)
            {
                return $result->result();
            }
        }

		function getPeriodicIncomes($login)
		{
			$result = $this->db->query("SELECT id FROM Users WHERE login = '$login'");
            if ($result->num_rows != 0)
            {
                $result = $result->result();
                $id = $result[0]->id;
            }
			// Выберем доходы с нужным id
			$result = $this->db->query("SELECT period, summary FROM Periodic_incomes WHERE user_id = '$id'");
            if ($result->num_rows != 0)
            {
                return $result->result();
            }    
		}
		
        function getPeriodicOutcomes($login)
		{
			$result = $this->db->query("SELECT id FROM Users WHERE login = '$login'");
            if ($result->num_rows != 0)
            {
                $result = $result->result();
                $id = $result[0]->id;
            }
			// Выберем доходы с нужным id
			$result = $this->db->query("SELECT period, summary FROM Periodic_outcomes WHERE user_id = '$id'");
            if ($result->num_rows != 0)
            {
                return $result->result();
            }    			
		}
    }
?>
