<?php

namespace efik;

class LocaMon
{
    private $locale;
    private $format;
    private $timestamp;

    public function __construct($argument1)
    {
        $this->locale = null;
        $this->format = null;
        $this->timestamp = null;
    }

    public function setLocale($argument1)
    {
       $this->locale = $argument1;
        return $this;
    }

    public function setFormat($argument1)
    {
        $this->format = $argument1;
        return $this;
    }

    public function setData($argument1)
    {
        $this->timestamp = (int) $argument1;
        return $this;
    }

    public function getResult()
    {
        $dateFormatter = new \IntlDateFormatter($this->locale,\IntlDateFormatter::FULL,\IntlDateFormatter::FULL);
        $dateFormatter->setPattern($this->format);
        $dateFormatter->format($this->timestamp);
    }
}
