Feature: A the jogging man

  @javascript
  Scenario: A the jogging man
    Given I am on "/"
    Then I should see "New Luma Yoga Collection"
    And wait 1 seconds
    Given I am on "/men/tops-men/jackets-men.html"
    Then I should see "Jackets"
    And wait 1 seconds
    When I check "Polyester" checkbox
    And wait 1 seconds
    When I click any product
    And wait 2 seconds
    When I chose any size
    And wait 2 seconds
    When I chose any color
    And wait 2 seconds
    When I add product to cart
    And wait 1 seconds
    Given I am on "/men/bottoms-men/pants-men.html"
    Then I should see "Pants"
    And wait 1 seconds
    And I open "4" filter
    And wait 3 seconds
    When I check "Sweatpants" checkbox
    And wait 3 seconds
    When I click any product
    And wait 3 seconds
    When I chose any size
    And wait 3 seconds
    When I chose any color
    And wait 1 seconds
    When I add product to cart
    Given I am on "/checkout/"
    And wait 4 seconds
    And I fill in the following:
      |     customer-email     |     johndoe@smile.fr     |
    When I fill in "firstname" with "John"
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
    And wait 3 seconds
