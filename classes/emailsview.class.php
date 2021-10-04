<?php

class EmailsView extends Emails {

  public function showEmail ($email) {
    $results = $this->getEmail($email);
    foreach ($results as $re) {
      echo $re['id'].'  '.$re['email_address'].'  '.$re['date'].'<br>';
    }
    return $results;
  }

  public function showEmailListDefault() {
    $results = $this->getEmailListDefault();
    return $results;
  }

  public function showEmailListEA() {
    $results = $this->getEmailListEA();
    return $results;
  }

  public function filterList ($filter) {
    if ($filter == 'name') {
      $results = $this->showEmailListEA();
      return $results;
    } else if ($filter == 'date') {
      $results = $this->showEmailListDefault();
      return $results;
    }
  }

  public function customFilter($filter) {
    $results = $this->customList($filter);
    return $results;
  }

  public function providerList() {
    $list = $this->getEmailListDefault();
    $provider_list = array();
    foreach ($list as $elem) {
      preg_match("/@[a-zA-Z]+\./", $elem['email_address'], $variable); // "/^[^ ]+\.co$/"  /^@.*\.$/
      $provider = $variable[0];
      array_push($provider_list,$provider);
    }
    $provider_list = array_unique($provider_list);
    return $provider_list;
  }

  public function sortFilter($sort,$filter) {
    $results = $this->sortFilterList($sort,$filter);
    return $results;
  }
}
