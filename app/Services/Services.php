<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 22.06.2022
 * Time: 13:44
 */
namespace App\Services;

abstract class Services   ///экземпляр класса не создается,поэтому делаем абстрактным
{
  public  $model = FALSE;

    public function One($id) {
        $result = $this->model->where('id',$id)->first();
        return $result;
    }

   public function setDate(){
        if (isset($_COOKIE['datestart']))
            $dstart = $_COOKIE['datestart'];
        else
            $dstart = date("d.m.Y", strtotime(Date("Y-m-d")));

        $dsled = date("Y-m-d", strtotime($dstart)+60*60*24);
        $dpredid = date("Y-m-d", strtotime($dstart)-60*60*24);
        return [
            'pic'=>$dstart,
            'bz'=>sprintf("%s-%s-%s",intval(date("Y", strtotime($dstart))),intval(date("m", strtotime($dstart))),intval(date("d", strtotime($dstart)))),
            'sl'=>sprintf("%s-%s-%s",intval(date("Y", strtotime($dsled))),intval(date("m", strtotime($dsled))),intval(date("d", strtotime($dsled )))),
            'pred'=>sprintf("%s-%s-%s",intval(date("Y", strtotime($dpredid))),intval(date("m", strtotime($dpredid))),intval(date("d", strtotime($dpredid)))),
            'sist'=> sprintf("%s-%s-%s",intval(date("Y", time())),intval(date("m", time())),intval(date("d", time()))),
            'nuni'=>mktime(0, 0, 0,
                date("m", strtotime($dstart)), date("d",strtotime($dstart)),date("Y", strtotime($dstart))),
            'kuni'=>mktime(23,59,59,
                date("m", strtotime($dstart)), date("d",strtotime($dstart)),date("Y", strtotime($dstart))),
            'nmesd'=>self::getMonRus(intval(date("m", strtotime($dstart)))-1,1),
            'nmes'=>self::getMonRus(intval(date("m", strtotime($dstart)))-1),
            'den'=>intval(date("d", strtotime($dstart))),
            'mes'=>intval(date("m", strtotime($dstart))),
            'god'=>intval(date("Y", strtotime($dstart))),
            'nagmes'=>sprintf("%s-%s-%s",intval(date("Y", strtotime($dstart))),intval(date("m", strtotime($dstart))),1),
            'konmes'=>sprintf("%s-%s-%s",intval(date("Y", strtotime($dstart))),intval(date("m", strtotime($dstart))),date("t",strtotime($dstart))),
        ];
    }

    public static function getDayRus()
    {
        $days = array(
            'Воскресенье', 'Понедельник',
            'Вторник', 'Среда',
            'Четверг', 'Пятница', 'Суббота'
        );
        $num_day = (date('w'));
        $name_day = $days[$num_day];
        return $name_day;
    }

    public static function getDaylRus($num_day)
    {
        $days = array(
            'Воскресенье', 'Понедельник',
            'Вторник', 'Среда',
            'Четверг', 'Пятница', 'Суббота'
        );
        $name_day = $days[$num_day];
        return $name_day;
    }

    public static function getMonRus($num_mon,$ok=false)
    {
        $mons =($ok)?['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня','Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'] :
            ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь','Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
        $name_mon = $mons[$num_mon];
        return $name_mon;
    }


}