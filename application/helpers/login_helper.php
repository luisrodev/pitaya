<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('isLogin'))
{
    function isLogin($var = '')
    {
        return $var;
    }
}

if ( ! function_exists('clearSession'))
{
    function clearSession()
    {
        $this->session->unset_userdata('isLog', 'true');
        $this->session->unset_userdata('nombre', $res['data']['nombre']);
        $this->session->unset_userdata('username', $res['data']['username']);
        $this->session->unset_userdata('rol', $res['data']['rol']);
    }
}