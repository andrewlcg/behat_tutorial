<?php
use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;
use Behat\Behat\Event\StepEvent;
use Behat\Behat\Context\BehatContext;
use Behat\Behat\Context\Step\Then;
use Behat\Behat\Context\Step\When;
use Drupal\DrupalExtension\Context\DrupalContext;
use Behat\Behat\Context\ClosuredContextInterface;
use Behat\Behat\Context\TranslatedContextInterface;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

require_once __DIR__.'/../User.php';

/**
 * Features context.
 */
class SignupPageContext extends PageObjectContext 
{

  /**
   *
   */
   var $user = NULL;

  /**
   * @Given /^"([^"]*)" is on the signup page$/
   */
  public function isOnTheSignupPage($name) {
    if (!$this->user = User::load($name)) {
      throw new Exception("Failed to load user for {$name}");
    }
    $this->getPage("Signup Page")->open();
  }

  /**
   * @Given /^they complete the signup form but do not agree to the terms of service$/
   */
  public function theyCompleteTheSignupFormButDoNotAgreeToTheTermsOfService() {
    if (!$this->user) {
      throw new Exception("User not loaded");
    }

    $this->getPage("Signup Page")->enterUserDetailsOnSignupForm($this->user);
    $this->getPage("Signup Page")->doNotAgreeWithTermsAndConditionsOnSignupForm();
    $this->getPage("Signup Page")->submitSignupForm();

  }

  /**
   * @Given /^should be on the signup page$/
   */
  public function shouldBeOnTheSignupPage() {
    throw new PendingException();
  }

  /**
   * @Then /^they should see a warning message telling them to accept the terms of service$/
   */
  public function theyShouldSeeAWarningMessageTellingThemToAcceptTheTermsOfService() {
    expect($this->getPage("Signup Page")->hasATermsOfServiceWarningMessage());
  }

}
