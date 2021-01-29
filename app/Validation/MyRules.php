<?php namespace App\Validation;

use CodeIgniter\I18n\Time;

class MyRules
{
    public function callback_birthday($date): bool
    {
        $time = Time::parse($date, 'Europe/Kiev', 'uk_UA');
        $birthdayYear = $time->getYear();
        $todayYear = Time::today('Europe/Kiev', 'uk_UA')->getYear();

        return (($todayYear - $birthdayYear) >= 18) ? true : false;

    }

}