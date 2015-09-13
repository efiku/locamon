<?php

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
    private $locaMonClass;
    private $monthNumbers;
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
        $this->locaMonClass = new LocaMon();
        $this->monthNumbers = [];
        $this->localizedMonths = [];
    }

    /**
     * @Given I have few month numbers:
     */
    public function iHaveFewMonthNumbers(TableNode $table)
    {
        foreach ($table->getHash() as $index => $month) {
            $this->monthNumbers[] = $month;
        }

    }

    /**
     * @When I call method setLocale with parameter :arg1
     */
    public function iCallMethodSetlocaleWithParameter($arg1)
    {
        $this->locaMonClass->setLocale($arg1);
    }

    /**
     * @When call method setFormat with parameter :arg1
     */
    public function callMethodSetformatWithParameter($arg1)
    {
        $this->locaMonClass->setFormat($arg1);
    }

    /**
     * @When I call method setData and my month number from table as timestamp
     */
    public function iCallMethodSetdataAndMyMonthNumberFromTableAsTimestamp()
    {
        foreach ($this->monthNumbers as $index => $monthNumbersArray) {
            $timestamp = mktime(0, 0, 0, $monthNumbersArray["month_number"]);
            $this->localizedMonths [] =
                $this->locaMonClass->setData($timestamp)->getResult();
        }
    }


    /**
     * @Then I should get:
     */
    public function iShouldGet(TableNode $table)
    {
        foreach ($table->getHash() as $row) {
            if (!in_array($row['localized_month'], $this->localizedMonths)) {
                throw new Exception("Localized month did not match");
            }
        }

    }
}
