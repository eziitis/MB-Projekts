<?php

class Emails extends Dbh {

  protected function getEmail($email) {
    $sql = "SELECT * FROM emails WHERE email_address =?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email]);

    $results = $stmt->fetchAll();
    return $results;
  }
  
  protected function getEmailListDefault() {
    $sql = "SELECT * FROM emails ORDER by date DESC";
    $stmt = $this->connect()->query($sql);

    $results = $stmt->fetchAll();
    return $results;
  }

  protected function getEmailListEA() {
    $sql = "SELECT * FROM emails ORDER by email_address ASC";
    $stmt = $this->connect()->query($sql);

    $results = $stmt->fetchAll();
    return $results;
  }

  protected function customList($filter) {

    $sql = "SELECT * FROM emails WHERE email_address REGEXP ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$filter]);

    $results = $stmt->fetchAll();
    return $results;
  }


  protected function sortFilterList($sort,$filter) {

    if ($sort == 'name') {
      $sql = "SELECT * FROM emails WHERE email_address REGEXP ? ORDER BY email_address ASC";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$filter]);

      $results = $stmt->fetchAll();
      return $results;
    } else {
      $sql = "SELECT * FROM emails WHERE email_address REGEXP ? ORDER BY date DESC";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$filter]);

      $results = $stmt->fetchAll();
      return $results;
    }
    
  }

  protected function setEmail($email,$terms) {

    date_default_timezone_set("Europe/Riga");
    $datestamp = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO emails (email_address,date,terms) VALUES (?,'$datestamp','$terms');";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email]);
  }

  protected function deleteEmailEntries($id) {
    for($x=0;$x<count($id);$x++){
      $sql = "DELETE FROM emails WHERE id=".$id[$x];
      $stmt = $this->connect()->query($sql);
    }
  }

  protected function emailByID($id) {
    $sql = "SELECT * FROM emails WHERE id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    $results = $stmt->fetch();
    return $results;
  }

}

