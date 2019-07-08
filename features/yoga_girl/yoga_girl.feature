Feature: A the yoga girl

  @javascript
  Scenario: A the yoga girl
    Given I am on "/"
    Then I should see "New Luma Yoga Collection"
    And wait 1 seconds
    Given I am on "/women/tops-women/tees-women.html"
    Then I should see "Tees"
    And wait 1 seconds
    When I check "Cotton" checkbox
    And wait 2 seconds
    When I click any product
    And wait 2 seconds
    When I chose any size
    And wait 2 seconds
    When I chose any color
    And wait 2 seconds
    When I add product to cart
    And wait 2 seconds
    Given I am on "/women/bottoms-women/pants-women.html"
    Then I should see "Pants"
    And wait 2 seconds
    And I open "4" filter
    And wait 3 seconds
    When I check "Leggings" checkbox
    And wait 3 seconds
    When I click any product
    And wait 5 seconds
    When I chose any size
    And wait 3 seconds
    When I chose any color
    And wait 2 seconds
    When I add product to cart
    And wait 1 seconds
    Given I am on "/checkout/"
    And wait 4 seconds
    And I fill in the following:
      |     customer-email     |     janedoe@smile.fr     |
    When I fill in "firstname" with "Jane"
    When I fill in "lastname" with "Doe"
    When I fill in "company" with "Smile"
    When I fill in "street[0]" with "Asnieres-sur-Seine"
    When I fill in "street[1]" with "rue des Jardins"
    When I fill in "street[2]" with "20"
    When I fill in "city" with "Paris"
    When I select "France" from "country_id"
    And wait 1 seconds
    When I select "Paris" from "region_id"
    When I fill in "postcode" with "92600"
    When I fill in "telephone" with "+33655579113"
    And wait 1 seconds
    When I chose any shopping method
    And wait 3 seconds
    When I press "Next"
    And wait 3 seconds
    When I press "Place Order"
    And wait 10 seconds
    Then I should see "Thank you for your purchase!"
