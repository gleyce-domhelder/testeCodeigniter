<?php

namespace App\Libraries;
use App\Libraries\Permissao;
class Autenticar
{
    public static function setAutenticar($result)
    {
        $session = session();
        $array = ['logado' => true];
        $userData = $result;
        $session->set($array);
        $session->set('userData', $userData);
        return Permissao::setPermissao();
    }
    public static function id()
    {
        $session = session();
        if ($session->has('logado'))
            if ($session->has('userData'))
                return $session->get('userData')->id;
            else
                return null;
        else
            return null;
    }
    public static function check()
    {
        $session = session();
        return $session->has('logado');
    }
    public static function forget()
    {
        $session = session();
        $session->remove('logado');
        $session->remove('userData');
    }
    public static function user()
    {
        $session = session();
        if ($session->has('logado'))
            if ($session->has('userData'))
                return $session->get('userData');
            else
                return null;
        else
            return null;
    }
}
