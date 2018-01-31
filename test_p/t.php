<?php
function multi_diff($arr1,$arr2){
  $result = array();
  foreach ($arr1 as $k=>$v){
    if(!isset($arr2[$k])){
      $result[$k] = $v;
    } else {
      if(is_array($v) && is_array($arr2[$k])){
        $diff = multi_diff($v, $arr2[$k]);
        if(!empty($diff))
          $result[$k] = $diff;
      }
    }
  }
  return $result;
}
$t=array(
  "A"=>array(
    "A1"=>array('A1-0','A1-1','A1-2','A1-3'),
    "A2"=>array('A2-0','A2-1','A2-2','A2-3'),
    "A3"=>array('A3-0','A3-1','A3-2','A3-3')
  ),
  "B"=>array(
    "B1"=>array('B1-0','B1-1','B1-2','B1-3'),
    "B2"=>array('B2-0','B2-1','B2-2','B2-3'),
    "B3"=>array('B3-0','B3-1','B3-2','B3-3')
  ),
  "C"=>array(
    "C1"=>array('C1-0','C1-1','C1-2','C1-3'),
    "C2"=>array('C2-0','C2-1','C2-2','C2-3'),
    "C3"=>array('C3-0','C3-1','C3-2','C3-3')
  ),
  "D"=>array(
    "D1"=>array('D1-0','D1-1','D1-2','D1-3'),
    "D2"=>array('D2-0','D2-1','D2-2','D2-3'),
    "D3"=>array('D3-0','D3-1','D3-2','D3-3')
  )
);
echo "<pre>";
print_r($t);

echo"</pre>";

$t1=array(
  "A"=>array(
    "A1"=>array('A1-0','A1-1','A1-2','A1-3'),
    "A2"=>array('A2-0','A2-1','A2-2','A2-3'),
    "A3"=>array('A3-0','A3-1','A3-2')
  ),
  "B"=>array(
    "B1"=>array('B1-0','B1-2','B1-3'),
    "B2"=>array('B2-0','B2-1','B2-2','B2-3'),
    "B3"=>array('B3-0','B3-1','B3-3')
  ),
  "C"=>array(
    "C1"=>array('C1-0','C1-1','C1-2','C1-3'),
    "C3"=>array('C3-0','C3-1')
  ),
  "D"=>array(
    "D1"=>array('D1-0','D1-1','D1-2','D1-3'),
    "D2"=>array('D2-0','D2-1','D2-2','D2-3'),
    "D3"=>array('D3-0','D3-1','D3-2','D3-3')
  )
);

echo "<pre>";
print_r(multi_diff(
$t,$t1));
echo"</pre>";
?>
