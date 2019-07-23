<?php


namespace App\Enums;

class StatusEnum
{
    const INVACTIVE = 'INATIVO';
    const ACTIVE = 'ATIVO';

    public static function getStatus()
    {
        return ['1' => self::ACTIVE, '0' => self::INVACTIVE];
    }
}