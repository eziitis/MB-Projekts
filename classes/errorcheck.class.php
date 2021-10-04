<?php

class ErrorCheck {
  
  private $error;

  public function __construct ($error) {
    $this->error = $error;
  }

  public function determineError() {
    $newscheck = $this->error;
    if ($newscheck == 'empty') {
      return 'Email address is required';
    } else if ($newscheck == 'invalidemail') {
      return 'Please provide a valid e-mail address';
    } else if ($newscheck == 'Colombianemail') {
      return 'We are not accepting subscriptions from Colombia emails';
    } else if ($newscheck == 'notchecked') {
      return 'You must accept the terms and conditions';
    }

  } 

}