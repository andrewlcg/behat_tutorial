<?php

require_once __DIR__.'/../../User.php';

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

/**
 * Features context.
 */
class SignupForm extends Element
{

  /**
   * @var array $selector
   */
  protected $selector = array('css' => '.signup-box');

  /**
   * enterUserDetails 
   * 
   * @param mixed $user 
   * @access public
   * @return void
   */
  public function enterUserDetails($user) {
    $this->fillField("First", $user->first_name);
    $this->fillField("Last", $user->last_name);
    $this->fillField("Choose your username", $user->email);
    $this->fillField("Create a password", $user->password);
    $this->fillField("Confirm your password", $user->password);
    $this->fillField("Your current email address", $user->email);
  }

  /**
   * agreeToTermsAndConditions 
   * 
   * @access public
   * @return void
   */
  public function agreeToTermsAndConditions() {
    $this->checkField("I agree to the Google Terms of Service and Privacy Policy");
  }

  /**
   * doNotAgreeToTermsAndConditions 
   * 
   * @access public
   * @return void
   */
  public function doNotAgreeToTermsAndConditions() {
    $this->uncheckField("I agree to the Google Terms of Service and Privacy Policy");
  }

  /**
   * submitForm 
   * 
   * @access public
   * @return void
   */
  public function submitForm() {
    $this->pressButton("Next step");
  }

}
