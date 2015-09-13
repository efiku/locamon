Feature: Change month numbers to localized names
  In order to easily manipulate time locale.
  As an developer
  I want to get localized name using month number.

  Background:
    Given I have few month numbers:
      | id | month_number |
      | 1  | 2            |
      | 2  | 5            |
      | 3  | 11           |
      | 4  | 12           |

  Scenario: Receive localized month name
    When I call method setLocale with parameter "pl_PL"
    And  call method setFormat with parameter "LLLL"
    And I call method setData and my month number from table as timestamp
    Then I should get:
      | id | localized_month |
      | 1  | luty            |
      | 2  | maj             |
      | 3  | listopad        |
      | 4  | grudzień        |
