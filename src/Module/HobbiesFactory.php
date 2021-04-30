<?php
namespace App\Module;

use App\Module\Hobbies;
use App\Module\Hobbie;

class HobbiesFactory
{
    public static function hobbiesCreate(): Hobbies
    {
        $hobbies = new Hobbies();

        $caption = "Дрифт";
        $text = "Дрифт — техника прохождения поворотов и вид автоспорта, характеризующийся использованием управляемого заноса на максимально возможных для удержания на трассе скорости и угла к траектории.";
        $hobbies->addHobbie($caption, $text);

        $caption = "Yo-yo";
        $text = "Йо-йо — игрушка, состоящая из двух одинаковых по размеру и весу дисков, скреплённых между собой осью, на которую петелькой надета верёвка.";
        $hobbies->addHobbie($caption, $text);

        $caption = "Фингерборд";
        $text = "Фингерборд (англ. fingerboard < finger «палец» + board «доска») — уменьшенная копия (в масштабе примерно 1 : 8) скейтборда, предназначенная для катания на пальцах и выполнения трюков, идентичных скейтборду, дома.";
        $hobbies->addHobbie($caption, $text);

        $caption = "Велосипед";
        $text = "Велосипе́д (стар. фр. vélocipède, от лат. vēlōx «быстрый» и pes «нога») — колёсное транспортное средство (или спортивный снаряд), приводимое в движение мускульной силой человека через ножные педали или (крайне редко) через ручные рычаги.";
        $hobbies->addHobbie($caption, $text);

        return $hobbies;
    }
}