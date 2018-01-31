<?php
print_r($_POST['testtt']);
   // connect to mongodb
   $m = new MongoClient();
   echo "Connection to database successfully";
	
   // select a database
   $db = $m->mydb;
   $collection = $db->mycol;
   echo "Database mydb selected";
   $collection->batchInsert(json_decode($_POST['testtt']));
   
?>
