<?php 

function get($key, $valueDefault='')
{
	return isset($_GET[$key])?$_GET[$key]:$valueDefault;
}

function post($key, $valueDefault='')
{
	return isset($_POST[$key])?$_POST[$key]:$valueDefault;
}

function loadClass($c)
{
	if (is_file(ROOT."/classes/$c.class.php"))
		include ROOT."/classes/$c.class.php";
	else {
		echo "No class $c"; exit;
	}
}