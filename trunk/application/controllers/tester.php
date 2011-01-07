<?php
/**
 * Тестирующий контроллер
 *
 * @package tests
 * @author Mehonoshin Stanislav
 */
	class Tester extends Controller
	{
		function Tester()
		{
			parent::Controller();
			$this->load->model('graphic_reports_model');
			$this->load->library('unit_test');
			$this->load->library('statistics');			
		}
		
		function testIncomes()
		{
			$objects = $this->graphic_reports_model->getIncomes('Chaos');
			$result = $this->statistics->getPercentage($objects);
			$this->unit->run($result, "[['Находка', 8.9],['Дар', 2.2],['Продажа', 31.1],['Таксист', 13.3],['Продукты', 44.4],]", 'Incomes model');
		}
		
		function testOutcomes()
		{
			$objects = $this->graphic_reports_model->getOutcomes('Chaos');
			$result = $this->statistics->getPercentage($objects);
			$this->unit->run($result, "[['Продукты', 3.7],['Транспорт', 0.8],['Книги', 80.2],['Развлечения', 12],['Разное', 3.3],['', 0],]", "Outcomes model");
		}
		
		function testPeriodic()
		{
			$Objects = $this->graphic_reports_model->getPeriodicIncomes('Chaos');	
			$arr1 = $this->statistics->fetchPeriodic($Objects);
			$Objects = $this->graphic_reports_model->getPeriodicOutcomes('Chaos');
			$arr2 = $this->statistics->fetchPeriodic($Objects);
			
			// Найдем максимальный период платежа
			$maxPeriod = $this->statistics->getMaxPeriod($arr1, $arr2);

			// Получим json для графиков
			$incomeRes = $this->statistics->buildPeriodicJson($arr1, $maxPeriod);
			$outcomeRes = $this->statistics->buildPeriodicJson($arr2, $maxPeriod);
			
			$this->unit->run($incomeRes, "[0,0,0,0,0,0,200,0,0,0,0,0,0,200,0,0,0,0,0,0,200,0,0,0,0,0,0,200,0,1100,]", "Periodic Incomes model");
			$this->unit->run($outcomeRes, "[96,96,96,96,96,96,396,96,96,96,96,96,96,396,96,96,96,96,96,96,396,96,96,96,96,96,96,396,96,596,]", "Periodic Outcomes model");
			
		}
		
		function models()
		{
			$this->testIncomes($this->graphic_reports_model, $this->statistics);
			$this->testOutcomes();
			$this->testPeriodic();
			
			echo $this->unit->report();
			
		}

 
	}
?>
