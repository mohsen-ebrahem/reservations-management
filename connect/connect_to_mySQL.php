<?php

  require __DIR__."../db_controller.php";
  
    $mysqlDp =new dbController("localhost","root","");
    $connected=$mysqlDp->getConnection();
    mysqli_select_db($connected,'hotel');
