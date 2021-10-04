<?php

class EmailsContr extends Emails {
  
  public function addEmail($email, $terms) {
    $this->setEmail($email,$terms);
  } 

  public function deleteEmail($list) {
    $this->deleteEmailEntries($list);
  }

  public function returnDataByID($id) {
    $results = $this->emailByID ($id);
    return $results;
  }

  public function exportEmails($selected) {

    if (count($selected) > 0) {
      $delimiter = ",";
      $filename = "email_list.csv";

      $f = fopen('php://memory', 'w');
      $fields = array('id', 'email_address', 'terms', 'date'); 
      fputcsv($f, $fields, $delimiter);
      for($x=0;$x<count($selected);$x++){
        $id = $selected[$x];
        $row = $this->returnDataByID($id);

        $terms = ($row['terms'] == 1)?'Accepted':'Declined';
        $lineData = array($row['id'], $row['email_address'], $terms, $row['date']);
        fputcsv($f, $lineData, $delimiter);
      }
      fseek($f, 0);

      header('Content-Type: text/csv'); 
      header('Content-Disposition: attachment; filename="' . $filename . '";'); 

      fpassthru($f);
    }    
  }

}