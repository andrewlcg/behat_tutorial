<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;

class User {

  public $first_name;
  public $last_name;
  public $email;
  public $password;
  
	public function __construct($first_name, $last_name, $email, $password) {
		$this->first_name = $first_name;
		$this->last_name = $last_name;
    $this->email = $email;
    $this->password = $password;
	}

	static function load($name) {
    $user = NULL;
		$file_path = __DIR__ . '/Resources/Users/' . strtolower($name) . '.yaml';

    if (file_exists($file_path)) {
      try {
        $user_data = Yaml::parse(file_get_contents($file_path));
        $user = new User($user_data['first_name'], $user_data['last_name'], $user_data['email'], $user_data['password']);
      } 
      catch (ParseException $e) {
        printf("Unable to parse the YAML string: %s", $e->getMessage());
      }
    }
		
		return $user;
	}


}
