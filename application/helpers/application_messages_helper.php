<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$ci = get_instance();
$ci->lang->load('application_messages');

if(!function_exists('replaceSingleTag'))
{
    function replaceSingleTag($msg, $tag1)
    {
        return $str = str_replace('{0}',$tag1,$msg);
		
    }
}

if(!function_exists('replaceMultipleTag'))
{
    function replaceMultipleTag($msg, $tag1 , $tag2)
    {
        $str = str_replace('{0}',$tag1,$msg);
        return $str = str_replace('{1}',$tag2,$str);
    }
}



