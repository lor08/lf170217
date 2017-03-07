<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 07.03.17
 * Time: 12:41
 */

if (!function_exists('putConfig')) {
	/**
	 * @param $group
	 * @param $items
	 * @param bool $update
	 */
	function putConfig($group, $items, $update = true)
	{
		$config = config($group);
		// Обновляем данные или вносим новые
		if ($update) {
			foreach ($items as $key => $item) {
				$config[$key] = $item;
			}
		} else $config = $items;
		$path = config_path() . DIRECTORY_SEPARATOR . $group . ".php";
		File::put($path, '<?php return ' . var_export($config, true) . ';');
	}
}
if (!function_exists('getDecline')) {
	/**
	 * Возврат окончания слова при склонении
	 * Функция возвращает окончание слова, в зависимости от примененного к ней числа
	 * Например: 5 товаров, 1 товар, 3 товара
	 * @param int $value - число, к которому необходимо применить склонение
	 * @param array $status - массив возможных окончаний
	 * @return mixed
	 */
	function getDecline($value = 1, $status = array('', 'а', 'ов'))
	{
		$array = array(2, 0, 1, 1, 1, 2);
		return $status[($value % 100 > 4 && $value % 100 < 20) ? 2 : $array[($value % 10 < 5) ? $value % 10 : 5]];
	}
}
if (!function_exists('getDeclineMonth')) {
	/**
	 * @param $month
	 * @return string
	 */
	function getDeclineMonth($month): string
	{
		$arrMonth = array(
			"1" => "января",
			"2" => "февраля",
			"3" => "марта",
			"4" => "апреля",
			"5" => "мая",
			"6" => "июня",
			"7" => "июля",
			"8" => "августа",
			"9" => "сентября",
			"10" => "октября",
			"11" => "ноября",
			"12" => "декабря",
		);
		return $arrMonth[$month];
	}
}
if (!function_exists('getMyRound')){
	/**
	 * @param $d
	 * @param int $r
	 * @param string $st
	 * @return float|int
	 */
	function getMyRound($d, int $r = 10, $st = "up")
	{
		$d = (int) $d;
		if ($st == "up"){
			if ($d % $r != 0) $d = ($d / $r) * $r + $r;
		}else{
			if ($d % $r != 0) $d = ($d / $r) * $r;
		}
		return $d;
	}
}
if (!function_exists('formatSizeUnits')){
	/**
	 * @param $bytes
	 * @return string
	 */
	function formatSizeUnits($bytes)
	{
		if ($bytes >= 1073741824)
			$bytes = number_format($bytes / 1073741824, 2) . ' GB';
		elseif ($bytes >= 1048576)
			$bytes = number_format($bytes / 1048576, 2) . ' MB';
		elseif ($bytes >= 1024)
			$bytes = number_format($bytes / 1024, 2) . ' kB';
		elseif ($bytes > 1)
			$bytes = $bytes . ' bytes';
		elseif ($bytes == 1)
			$bytes = $bytes . ' byte';
		else
			$bytes = '0 bytes';
		return $bytes;
	}
}
