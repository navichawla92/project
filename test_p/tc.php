 <?php 
foreach (glob("test".date('Y_m_d')."*.csv") as $filename) { 
   echo "$filename size " . filesize($filename) . "\n"; 
} 
?> 
