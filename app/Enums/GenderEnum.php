<?php


namespace App\Enums;

class GenderEnum
{
    const MEN = 'MASCULINO';
    const FEMALE = 'FEMININO';

    public static function getGenders()
    {
        return ['M' => self::MEN, 'F' => self::FEMALE];
    }
}