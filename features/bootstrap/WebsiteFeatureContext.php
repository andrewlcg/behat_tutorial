<?php
use Behat\Behat\Event\StepEvent;
use Behat\Behat\Event\FeatureEvent;

use Behat\Behat\Context\BehatContext;
use Behat\Behat\Context\Step\Then;
use Behat\Behat\Context\Step\When;
use Behat\Behat\Context\ClosuredContextInterface;
use Behat\Behat\Context\TranslatedContextInterface;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Features context.
 */
class WebsiteFeatureContext extends BehatContext
{

  /**
   * The user (if any) we're pretending we are
   */
   var $user = NULL;

  /**
   * Initializes subcontexts by interating over each file in the Subcontexts director
   *
   * @param array $parameters context parameters (set them up through behat.yml)
   */
  public function __construct(array $parameters)
  {
    //Load all of our subcontexts
    $dir = new DirectoryIterator(dirname(__FILE__) . '/Subcontexts/');
    foreach($dir as $file) {
      if ($file->isFile() && ((pathinfo($file->getFilename(), PATHINFO_EXTENSION) == 'php'))) {
        //we'll attempt to load this as a subcontext using the the filename as 
        //a basis for the class
        $alias = strtolower($file->getBasename('.php') . '_context');
        $class = $file->getBasename('.php');
        $this->useContext($alias, new $class());
      }
    }
  }

  /**
   * @Then /^they should see a warning message$/
   */
  public function theyShouldSeeAWarningMessage()
  {
    throw new PendingException();
  }

  /**
   * @Given /^should be on the "([^"]*)" page$/
   */
  public function shouldBeOnThePage($arg1)
  {
    throw new PendingException();
  }


}
