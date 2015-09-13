<?php

namespace spec\efik;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LocaMonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('efik\LocaMon');
    }

    function let()
    {
        $this->beConstructedWith('\efik\LocMon');
    }

    function it_set_locale_for_intl_dateFormatter()
    {
        $this->setLocale('pl_PL')->shouldReturnAnInstanceOf('\efik\LocaMon');

    }

    function it_set_formatter_for_intl_dateFormatter()
    {
        $this->setFormat('LLLL')->shouldReturnAnInstanceOf('\efik\LocaMon');
    }

    function it_set_data_to_localize_for_intl_dateFormatter()
    {
        $time = mktime(0, 0, 0, 2);
        $this->setData($time)->shouldReturnAnInstanceOf('\efik\LocaMon');
    }

    /**
     * @dataProvider dataProvider
     */
    function it_convert_month_number_into_localized_string($month, $locale, $format, $result)
    {
        $timestamp = mktime(0, 0, 0, (int)$month);
        $this->setLocale($locale)
            ->setFormat($format)
            ->setData($timestamp);
        $this->getResult()->shouldReturn($result);
    }

    public function dataProvider()
    {
        return [
            [1, 'pl_PL', 'LLLL', 'styczeń'],
            [2, 'pl_PL', 'MMMM', 'lutego'],
            [3, 'en_EN', 'LLLL', 'March']

        ];
    }
}
