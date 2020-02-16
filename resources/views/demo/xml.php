<?php
//print_r($demo);
if(empty($address))
  echo "There is no data";
else {
    // Display news items in table
    header("Content-type: application/xml;");
    echo '<?xml version="1.0" encoding="utf-8" ?>
    <address_book>';
        foreach($address as $row)
        {
          echo '<demo>
              <name>'.$row->name.'</name>
              <firstname>'.$row->firstname.'</firstname>
              <street>'.$row->street.'</street>
              <zip_code>'.$row->zip_code.'</zip_code>
              <city>'.$row->city.'</city>
            </demo>';
        }
        echo '</address_book>';
}
