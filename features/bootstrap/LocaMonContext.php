<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use efik\LocaMon;

/**
 * Defines application features from the specific context.
 */
class LocaMonContext implements Context, SnippetAcceptingContext
{
    /**
     * @var LocaMon
     */
    private $locMonClass;
    /**
     * @var ArrayObject
     */
    private $monthNumbers;
    /**
     * @var ArrayObject
     */
    private $localizedMonths;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->locMonClass = new LocaMon();
        $this->monthNumbers = new ArrayObject();
        $this->localizedMonths = new ArrayObject();
    }

    /**
     * @Given I have few month numbers:
     */
    public function iHaveFewMonthNumbers(TableNode $table)
    {
        foreach ($table->getHash() as $month) {
            $this->monthNumbers->append($month);
        }

    }

    /**
     * @When I call method setLocale with parameter :arg1
     */
    public function iCallMethodSetlocaleWithParameter($arg1)
    {
        $this->locMonClass->setLocale($arg1);
    }

    /**
     * @When call method setFormat with parameter :arg1
     */
    public function callMethodSetformatWithParameter($arg1)
    {
        $this->locMonClass->setFormat($arg1);
    }

    /**
     * @When I call method setData and my month number from table as timestamp
     */
    public function iCallMethodSetdataAndMyMonthNumberFromTableAsTimestamp()
    {
        foreach($this->monthNumbers as $index => $monthNumbersArray){
            print_r($monthNumbersArray);
        }
    }

}
