<?php
function getCheckbox($name, $default = False, $retValue = false, $submitname = "")
{
	$ret = $default;
	if(isset($_GET[$name])&&$_GET[$name]=="on")
	{
		$ret = True;
	}
	elseif((isset($_GET[$name])&&$_GET[$name]=="off")||isset($_GET[$submitname]))
	{
		$ret = False;
	}
	if($retValue==true)
	{
		if($ret==True)
		{
			return 'checked="checked"';
		}
		return '';
	}
	return $ret;
}
function getTextbox($name, $default = "", $retValue = false)
{
	$ret = $default;
	if(isset($_GET[$name]))
	{
		$ret = $_GET[$name];
	}
	if($retValue==true)
	{
		return 'value="'.$ret.'"';
	}
	return $ret;
}
function getSelect($name, $value, $default="", $retValue = true)
{
	$ret = getTextbox($name, $default);
	if($ret == $value)
	{
		if($retValue==true)
		{
			return 'selected="selected"';
		}
		return true;
	}
	else
	{
		if($retValue==true)
		{
			return '';
		}
		return false;
	}

}
function requestID()
{
	$string = "";
	$keyA = array("name", "ice", "ic", "d", "nv", "stunde", "minuten");
	foreach($_GET as $key => $value)
	{
		if(in_array($key, $keyA))
		{
			$string .= $key.":".$value.";";
		}
	}
	return md5($string);
	#var_dump($_GET);
}
