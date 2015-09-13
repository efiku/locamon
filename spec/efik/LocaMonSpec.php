<?php

namespace spec\efik;

use efik\LocaMon;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LocaMonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('efik\LocaMon');
    }

    function let(){
        $this->beConstructedWith('\efik\LocMon');
    }

    function it_set_locale_for_intl_dateFormatter(){
        $this->setLocale('pl_PL')->shouldReturnAnInstanceOf('\efik\LocaMon');

    }

    function it_set_formatter_for_intl_dateFormatter(){
        $this->setFormat('LLLL')->shouldReturnAnInstanceOf('\efik\LocaMon');
    }

    function it_set_data_to_localize_for_intl_dateFormatter(){
        $time = mktime(0,0,0,2);
        $this->setData($time)->shouldReturnAnInstanceOf('\efik\LocaMon');
    }
    function it_localize_data_for_specific_locale(){
        $monthNumber = 3;
        $timestamp = mktime(0,0,0,$monthNumber);
        $this->setLocale('pl_PL')
            ->setFormat('LLLL')
            ->setData($timestamp);
        $this->getResult()->shouldReturn("marzec");
    }
}
