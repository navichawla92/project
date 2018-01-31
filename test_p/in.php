<div class="fynd-space-itms">
<?php
$classarr = array("item-exhibitation maploc", "item-parking maploc", "item-offices maploc", "item-storage maploc");
$sql="select * from category order by id desc";
 $catdata=$dbobj->db_get_data($sql);
$counter=0;
foreach ($catdata as $v) {
?>
<div class="col-sm-3">
<a href="javascript:void(0)" class="<?php echo $classarr[$counter];?>" onClick="keepSection('<?php echo $v['id']; ?>');"><?php echo $v['name'] ?></a><!-- activemap1 -->
</div>
<?php
    $counter++;
if($counter==4){
    $counter=0;
}
}

?>
<button class="btn nextbtnbgdiv open2" type="button">Next <span class="fa fa-arrow-right"></span></button>
<div class="fyndspacecategory fyndsheightsubc nano">
    <div class="nano-content">
      <?php
        echo $_SESSION['cid'];

    ?>
</div>
</div
