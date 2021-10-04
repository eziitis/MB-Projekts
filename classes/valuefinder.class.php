<?php

class ValueFinder {
  private $sort;
  public $filter;
  private $search;

  public $result;

  public function __construct ($values) {
    if (isset($values['sort'])) {
      if (preg_match("/0[^ ]+0/",$values['sort'])) {
        preg_match("/0[^ ]+0/", $values['sort'], $variable);
        $sortvalue = $variable[0];
        $sortvalue = substr_replace($sortvalue ,"", -1);
        $sortvalue = ltrim($sortvalue, $sortvalue[0]);
        $this->sort = $sortvalue;

        if (preg_match("/9[^ ]+9/", $values['sort'])) {
          preg_match("/9[^ ]+9/", $values['sort'], $variableX);
          $sortvalue = $variableX[0];
          $sortvalue = rtrim($sortvalue, "9");
          $sortvalue = ltrim($sortvalue, $sortvalue[0]);
          $this->search = $sortvalue;
        }
        if (preg_match("/@[^ ]+\./", $values['sort'])) {
          preg_match("/@[^ ]+\./", $values['sort'], $variableY);
          $sortvalue = $variableY[0];
          $sortvalue = rtrim($sortvalue, ".");
          $sortvalue = ltrim($sortvalue, $sortvalue[0]);
          $this->filter = $sortvalue;
        }
      } else {
        $this->sort = $values['sort'];
      }
    }
    if (isset($values['filter'])) {
      if (preg_match("/@[^ ]+\./",$values['filter'])) {
        preg_match("/@[^ ]+\./", $values['filter'], $variable);
        $filtervalue = $variable[0];
        $filtervalue = rtrim($filtervalue, ".");
        $filtervalue = ltrim($filtervalue, $filtervalue[0]);
        $this->filter = $filtervalue;

        if (preg_match("/9[^ ]+9/", $values['filter'])) {
          preg_match("/9[^ ]+9/", $values['filter'], $variableX);
          $filtervalue = $variableX[0];
          $filtervalue = rtrim($filtervalue, "9");
          $filtervalue = ltrim($filtervalue, $filtervalue[0]);
          $this->search = $filtervalue;
        }
        if (preg_match("/0[^ ]+0/", $values['filter'])) {
          preg_match("/0[^ ]+0/", $values['filter'], $variableY);
          $filtervalue = $variableY[0];
          $filtervalue = substr_replace($filtervalue ,"", -1);
          $filtervalue = ltrim($filtervalue, $filtervalue[0]);
          $this->sort = $filtervalue;
        }
      } else {
        $this->filter = $values['filter'];
      }
    }
    if (isset($values['search'])) {
      if (preg_match("/9[^ ]+9/",$values['search'])) {
        preg_match("/9[^ ]+9/", $values['search'], $variable);
        $searchvalue = $variable[0];
        $searchvalue = rtrim($searchvalue, "9");
        $searchvalue = ltrim($searchvalue, $searchvalue[0]);
        $this->search = $searchvalue;

        if (preg_match("/@[^ ]+\./", $values['search'])) {
          preg_match("/@[^ ]+\./", $values['search'], $variableX);
          $searchvalue = $variableX[0];
          $searchvalue = rtrim($searchvalue, ".");
          $searchvalue = ltrim($searchvalue, $searchvalue[0]);
          $this->filter = $searchvalue;
        }
        if (preg_match("/0[^ ]+0/", $values['search'])) {
          preg_match("/0[^ ]+0/", $values['search'], $variableY);
          $searchvalue = $variableY[0];
          $searchvalue = substr_replace($searchvalue ,"", -1);
          $searchvalue = ltrim($searchvalue, $searchvalue[0]);
          $this->sort = $searchvalue;
        }
      } else {
        $this->search = $values['search'];
      }
    }  
  }
  
  public function buttonValue() {
    if (isset($this->sort)) {
      $this->sort = '0'.$this->sort.'0';
      $this->result = $this->result.$this->sort;
    } 
    if (isset($this->search) && !($this->search == '')) {
      $this->search = '9'.$this->search.'9';
      $this->result = $this->result.$this->search;
    } 
    if (isset($this->filter) && !($this->filter == '')) {

      $this->filter = '@'.$this->filter.'.';
      $this->result = $this->result.$this->filter;
    
    }
    return $this->result;
  }

  public function giveUsable() {
    $result = array();
    $result['sort'] = $this->sort;
    $result['filter'] = $this->filter;
    $result['search'] = $this->search;

    return $result;
  }

  public function removeFilter() {
    if (isset($this->filter)) {
      $this->filter = '';
    }
  }

  public function removeSearch() {
    if (isset($this->search)) {
      $this->search = '';
    }
  }

}