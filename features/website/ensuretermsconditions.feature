Feature: Terms and Conditions
  As the Corporate Lawyer
  I want to ensure that in addition to entering their details the user agrees to the Terms of Service when signing up
  To ensure that we can justifiably suspend the account if they break the Terms
  
  @javascript
  Scenario Outline: Display a message if terms and conditions not set
    Given "<user>" is on the signup page
    And they complete the signup form but do not agree to the terms of service
    Then they should see a warning message telling them to accept the terms of service
    And should be on the signup page

  Examples:
  |user|
  |Larry|
  |Sergei|
