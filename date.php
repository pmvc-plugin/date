<?php
namespace PMVC\PlugIn\date;

// \PMVC\l(__DIR__.'/xxx.php');

${_INIT_CONFIG}[_CLASS] = __NAMESPACE__.'\date';

class date extends \PMVC\PlugIn
{
    public function getSeqKeys($days, $timestamp = null, $format = null)
    {
        if (is_null($timestamp)) {
            $timestamp = time();
        }
        $all = [];
        for ($i = $days-1; $i > 0; $i --) {
            $time = strtotime('-'.$i.' day', $timestamp);
            $all[] = $this->getDate($time, $format);
        }
        $all[] = $this->getDate($timestamp, $format);
        $all = array_reverse($all);
        return $all;
    }

    public function getDate($timestamp, $format = null)
    {
        if (is_null($format)) {
            $date = date('Y/n/d', $timestamp);
            return explode('/', $date);
        } else {
            return date($format, $timestamp);
        }
    }
}
