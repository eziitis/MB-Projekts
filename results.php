<?php
  include 'includes/class-autoloader.inc.php';
  error_reporting(E_ALL);

  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/results.css">
  <title>Document</title>
</head>
<body>
  <div class="flex">
    <form class="flex" action="includes/deleteandexport.inc.php" method="POST">
      <table class="results flex-elem">
        <tr>
          <th class="table_data">Date</th>
          <th class="table_data">E-mail Address</th>
          <th class="table_data">ID</th>
          <th class="table_data"></th>
        </tr>

        <?php
        

        if (!isset($_GET['sort']) && !isset($_GET['filter']) && !isset($_GET['search'])) {
          $results = new EmailsView;
          $list = $results->showEmailListDefault();
        } else {
          if (isset($_GET['sort'])) {
            
            $obj1 = new ValueFinder ($_GET);
            $usableValues = $obj1->giveUsable();
            if ((!($usableValues['filter'] == '') && !($usableValues['filter'] == null)) && (!($usableValues['search'] == '') && !($usableValues['search'] == null)) ) {

              $results = new EmailsView;
              $realsort = $usableValues['sort'];
              $realfilter = $usableValues['filter'];
              $list = $results->sortFilter($realsort,$realfilter);
              $express  = '/'.$usableValues['search'].'/';
              $counter = 0;
              foreach ($list as $elem) {
                $element = $elem['email_address'];
                if (!preg_match($express,$element)) {
                  unset($list[$counter]);
                  $counter++;
                }
              }

            } else if (!($usableValues['filter'] == '') && !($usableValues['filter'] == null)) {
              $results = new EmailsView;
              $realsort = $usableValues['sort'];
              $realfilter = $usableValues['filter'];
              $list = $results->sortFilter($realsort,$realfilter);

            } else if (!($usableValues['search'] == '') && !($usableValues['search'] == null)) {
              $results = new EmailsView;
              $realsort = $usableValues['sort'];
              $realsearch = $usableValues['search'];
              $list = $results->sortFilter($realsort,$realsearch);
            }else {
              $sort = $_GET['sort'];
              $sort = substr_replace($sort ,"", -1);
              $sort = ltrim($sort, $sort[0]);
              $results = new EmailsView;
              $list = $results->filterList($sort);
            }

          } else if (isset($_GET['filter'])) {

            $obj1 = new ValueFinder ($_GET);
            $usableValues = $obj1->giveUsable();
            if ((!($usableValues['sort'] == '') && !($usableValues['sort'] == null)) && (!($usableValues['search'] == '') && !($usableValues['search'] == null)) ) {

              $results = new EmailsView;
              $realsort = $usableValues['sort'];
              $realfilter = $usableValues['filter'];
              $list = $results->sortFilter($realsort,$realfilter);
              $express  = '/'.$usableValues['search'].'/';
              $counter = 0;
              foreach ($list as $elem) {
                $element = $elem['email_address'];
                if (!preg_match($express,$element)) {
                  unset($list[$counter]);
                  $counter++;
                }
              }

            } else if (!($usableValues['sort'] == '') && !($usableValues['sort'] == null)) {
              $results = new EmailsView;
              $realsort = $usableValues['sort'];
              $realfilter = $usableValues['filter'];
              $list = $results->sortFilter($realsort,$realfilter);

            } else if (!($usableValues['search'] == '') && !($usableValues['search'] == null)) {
              $results = new EmailsView;
              $realsearch = $usableValues['search'];
              $list = $results->customFilter($realsearch);
              $express  = '/'.$usableValues['filter'].'/';
              $counter = 0;

              foreach ($list as $elem) {
                $element = $elem['email_address'];
                if (!preg_match($express,$element)) {
                  unset($list[$counter]);
                  $counter++;
                }
              }
            }else {
              $filter = $_GET['filter'];
              $results = new EmailsView;
              $list = $results->customFilter($filter);
            }
          } else if (isset($_GET['search'])) {

            $obj1 = new ValueFinder ($_GET);
            $usableValues = $obj1->giveUsable();
            if ((!($usableValues['filter'] == '') && !($usableValues['filter'] == null)) && (!($usableValues['sort'] == '') && !($usableValues['sort'] == null)) ) {
              $results = new EmailsView;
              $realsort = $usableValues['sort'];
              $realfilter = $usableValues['filter'];
              $list = $results->sortFilter($realsort,$realfilter);
              $express  = '/'.$usableValues['search'].'/';
              $counter = 0;

              foreach ($list as $elem) {
                $element = $elem['email_address'];
                if (!preg_match($express,$element)) {
                  unset($list[$counter]);
                  $counter++;
                }
              }

            } else if (!($usableValues['filter'] == '') && !($usableValues['filter'] == null)) {
              $results = new EmailsView;
              $realfilter = $usableValues['filter'];
              $list = $results->customFilter($realfilter);
              $express  = '/'.$usableValues['search'].'/';
              $counter = 0;

              foreach ($list as $elem) {
                $element = $elem['email_address'];
                if (!preg_match($express,$element)) {
                  unset($list[$counter]);
                  $counter++;
                }
              }
            } else if (!($usableValues['sort'] == '') && !($usableValues['sort'] == null)) {
              $results = new EmailsView;
              $realsort = $usableValues['sort'];
              $realsearch = $usableValues['search'];
              $list = $results->sortFilter($realsort,$realsearch);
            }else {
              $search = $_GET['search'];
              $search = substr_replace($search ,"", -1);
              $search = ltrim($search, $search[0]);
              $results = new EmailsView;
              $list = $results->customFilter($search);
            }
          }
        }

        foreach ($list as $elem) {
        ?>

        <tr>
            <td class="table_data"><?php echo $elem['date'] ?></td>
            <td class="table_data"><?php echo $elem['email_address'] ?></td>
            <td class="table_data"><?php echo $elem['id'] ?></td>
            <td class="table_data"><input type="checkbox" name="checkbox[]" value="<?php echo $elem['id']; ?>"></td>
          </tr>

        <?php
        }  
        ?>
      </table>
      <div class=flex-elem>
        <button class="delete" name="delete">Delete entries</button>
        <button class="export" name="export">Export entries</button>
      </div>

    </form>


    <div class="button_stack mar_left">
      <form class="mar_top" action="includes/list.inc.php" method="POST">
        <button name ="default">Full List</button>
      </form>

      <form action="includes/filters.inc.php" method="POST">
        <?php
          echo '<div class="mar_top">';
          $newSortObj = new ValueFinder($_GET);
          $sortbuttonvalue = $newSortObj->buttonValue();

          echo '<button name="filter1" value = "'.$sortbuttonvalue.'">Sort by name</button>';
          echo '<button name="filter2" value = "'.$sortbuttonvalue.'">Sort by date</button>';

          echo '</div>';
        
          $newObj = new EmailsView;
          $providers = $newObj->providerList();

          $newFilterObj = new ValueFinder($_GET);
          $newFilterObj->removeFilter();
          $filterbuttonvalue = $newFilterObj->buttonValue();

          echo '<div class="mar_top">';
          foreach ($providers as $pro) {

            echo '<button name="button" value = "'.$pro.$filterbuttonvalue.'">'.$pro.'</button>';
      
          }
          echo '</div>';

          $newSearchObj = new ValueFinder($_GET);
          $newSearchObj->removeSearch();
          $filterbuttonvalue = $newSearchObj->buttonValue();

          echo '<div class="mar_top">';
          if (isset($_GET['search'])) {
            $searchinput = $_GET['search'];
            echo '<input type="text" id="search" name="search" placeholder="Search for email" value="'.$searchinput.'">' ;
          } else {
            echo '<input type="text" id="search" name="search" placeholder="Search for email">';
          }
          echo '</div>';  
        ?>
        <button name="filter3" value="<?php echo $filterbuttonvalue;?>">Search</button>
      </form>
    </div>  
  </div>  

</body>
</html>