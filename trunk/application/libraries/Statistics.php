<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/** 
* Библиотека для обработки данных для дальнейшей отрисовки на графиках
* @package tests
* @author Mehonoshin Stanislav
* @version 1.0
*/	

class Statistics 
{
	/**
	* Основной метод, вовращающий попроцентное отношение категорий выплат
	* Получает коллекцию объектов, превращает их в массив, сортирует и вовращает в json формате
	* @param array $sqlResult
	* @access public
	* @return string
	*/
	public function getPercentage($sqlResult)
	{
		$array = $this->fetchArray($sqlResult);
		$array = $this->distinctCategories($array);
		$array = $this->categoryPercentage($array);
		$str = $this->genPercentJson($array);
		return $str;
	}
	
	/**
	* Метод превращающий коллекцию объектов в массив
	* @param array $sqlResult
	* @access private
	* @return array
	*/
	private function fetchArray($sqlResult)
	{
		$array = array();
		foreach($sqlResult as $obj)
		{
			$tmp = array();
			$tmp[] = $obj->category;
			$tmp[] = $obj->summary;
			$array[] = $tmp;
		}
		return $array;
	}
	
	/**
	* Метод вычисляющий процентное отношение категорий выплат
	* @param array $array
	* @access private
	* @return array
	*/
	private function categoryPercentage($array)
	{
		// Получаем проценты
		$sum = 0;
		foreach ($array as $cat)
		{
			$sum += $cat[1];
		}
		for ($i = 0; $i < count($array); $i++)
		{
			@$array[$i][1] = round((@$array[$i][1] / $sum) * 100, 1);
		}
		return $array;
	}
	
	/**
	* Метод генерирующий json строку результата
	* @param array $array
	* @access private
	* @return string
	*/
	private function genPercentJson($array)
	{
		// Генерируем строку
		$str = '[';						
		foreach ($array as $cat)
		{
			@$str .= "['".$cat[0]."', ".$cat[1]."],";
		}
		$str .= ']';
		return $str;						
	}
	
	/**
	* Метод суммирующий количество выплат каждой категории
	* @param array $sqlResult
	* @access private
	* @return array
	*/
	private function distinctCategories($array)
	{
		// Самописный Distinct по атрибуту Category
		for ($i = 0; $i < count($array); $i++)
		{
			$num = 0;
			for ($j = 0; $j < count($array); $j++)
			{
				if (@$array[$i][0] == @$array[$j][0])
				{
					$num++;
					if ($num > 1)
					{
						$array[$i][1] += $array[$j][1];
						unset($array[$j]);
					}
				}
			}
		}						
		return $array;
	}
	
	/**
	* Метод превращающий коллекцию объектов в массив
	* @param array $sqlResult
	* @access public
	* @return array
	*/
	public function fetchPeriodic($sqlResult)
	{
		$array = array();
		foreach($sqlResult as $obj)
		{
			$tmp['sum'] = $obj->summary;
			$tmp['per'] = $obj->period;
			$array[] = $tmp;
		}
		return $array;
	}
	
	/**
	* Метод превращающий коллекцию объектов в массив
	* @param array $arr1, array $arr2
	* @access public
	* @return int
	*/
	public function getMaxPeriod($arr1, $arr2)
	{
		$maxPeriod = 0;
		$arr = array_merge($arr1, $arr2);
		foreach($arr as $item)
		{
			if ($item['per'] > $maxPeriod)
			{
				$maxPeriod = $item['per'];
			}
		}
		return $maxPeriod;
	}
	
	/**
	* Метод превращающий коллекцию объектов в массив
	* @param array $array, int $maxPeriod
	* @access public
	* @return string
	*/
	public function buildPeriodicJson($array, $maxPeriod)
	{
		$str = '[';
		for ($i = 1; $i <= $maxPeriod; $i++)
		{
			$sum = 0;
			foreach($array as $item)
			{
				if (($i % $item['per']) == 0)
				{
					$sum += $item['sum'];
				}
			}
			$str .= $sum.',';
		}
		$str .= ']';
		return $str;
	}

}

?>