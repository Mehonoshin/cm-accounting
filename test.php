<?php
	error_reporting(E_ALL);
	$system_folder = "system";
	$application_folder = "application";
if (strpos($system_folder, '/') === FALSE)
{
	if (function_exists('realpath') AND @realpath(dirname(__FILE__)) !== FALSE)
	{
		$system_folder = realpath(dirname(__FILE__)).'/'.$system_folder;
	}
}
else
{
	// Swap directory separators to Unix style for consistency
	$system_folder = str_replace("\\", "/", $system_folder); 
}
define('EXT', '.php');
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('FCPATH', str_replace(SELF, '', __FILE__));
define('BASEPATH', $system_folder.'/');

if (is_dir($application_folder))
{
	define('APPPATH', $application_folder.'/');
}
else
{
	if ($application_folder == '')
	{
		$application_folder = 'application';
	}

	define('APPPATH', BASEPATH.$application_folder.'/');
}

require_once BASEPATH.'codeigniter/CodeIgniter'.EXT;

echo "hello";
require_once('PHPUnit/Framework/TestCase.php');

class RegistratorTest extends PHPUnit_Framework_TestCase
{
	public function __constructor($name)
	{
		parent::__constructor($name);
	}
	
	public function testinputFiles()
	{
		$this->assertTrue("2" == "2");
	}
}


?>