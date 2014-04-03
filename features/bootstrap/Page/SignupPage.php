<?php

require_once 'WebsitePage.php';

class SignupPage extends WebsitePage {

  /**
   * @var string $path
   */
  protected $path = 'https://accounts.google.com/SignUp';

  public function enterUserDetailsOnSignupForm(User $user) {
    return $this->getElement('Signup Form')->enterUserDetails($user);
  }

  public function agreeToTermsAndConditionsOnSignupForm() {
    return $this->getElement('Signup Form')->agreeToTermsAndConditions();
  }

  public function doNotAgreeWithTermsAndConditionsOnSignupForm() {
    return $this->getElement('Signup Form')->doNotAgreeToTermsAndConditions();
  }

  public function submitSignupForm() {
    return $this->getElement('Signup Form')->submitForm();
  }

  public function hasATermsOfServiceWarningMessage() {
    return ($this->find('text', "In order to use our services, you must agree to Google's Terms of Service") !== NULL);
  }

}
