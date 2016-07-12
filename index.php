<?php 
session_start();
require_once 'config.php';

$url = $_SERVER['REQUEST_URI'];
$kq = tach_url($url,$cname,$action,$params);
$cname = "Controller_".$cname;

if(class_exists($cname,true)==true)
{
    $c = new $cname($action,$params);
}
else die("Không có controller".$cname);
if(method_exists($c, $action))$c->$action();
else die("Không có action".$action);

function __autoload($class_name)
{
    $url = str_replace("_", "/", $class_name);
    $filename = $url.".php";
     if (file_exists($filename)) require_once($filename); 
    
}

function tach_url($url,&$cname,&$action,&$params)
{
    $arr = explode("/", $url);
    if(count($arr)<=1)
    {
        return false;
    }
    $cname = $arr[1];
    if($cname=="")
    {
        $cname = DEFAULT_CONTROLLER;
        $action = DEFAULT_ACTION;
        $params = null;
        return true;
    }
    if(isset($arr[2]))
    {
        $action = $arr[2];
    }
    else
    {
        $action="";
    }
    if($action =="")
    {
        $action = DEFAULT_ACTION;;
        $params = null;
        return true;
    }
    array_shift($arr);
    array_shift($arr);
    array_shift($arr);
    $params=$arr; 
    return TRUE;
}


