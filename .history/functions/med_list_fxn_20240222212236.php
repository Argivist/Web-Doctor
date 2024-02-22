<?php

include "../actions/get_all_medicines.php";

function displayChores($cid,$url,$med_name,$medicine_qty,$medicine_price,$desc){
    $medicine="  <div class='col-sm-6 col-lg-4 text-center item mb-4'>
    <a href='shop-single.php?url=".$url."&name=".$med_name."&desc=".$desc."'> <img src='".$url."' alt='Image'></a>
    <h3 class='text-dark'><a href='shop-single.php?url=".$url."&name=".$med_name."&desc=".$desc."'>".$med_name."</a></h3>
    <p class='price'><del>95.00</del> &mdash;".$medicine_price." cedis</p>
    <p class='inventory'>Inventory: ".$medicine_qty."</p>
    <button class='btn btn-primary buy-button' data-drug='.$med_name.' data-prescription-required='true'>Buy .$med_name.</button>
    <input type='file' class='prescription d-none'>
  </div>";
return $medicine;
}
$meds=getAllMeds();

$count=0;
foreach($meds as $med){
    $item+=1;
    if($count==0){
        echo "<div class='row'>";
    }
    $count+=1;
    echo displayChores($med['medicine_id'],$med['img_url'],$med['medicine_name'],$med['medicine_qty'],$med['medicine_price'],$med['desc']);
    if($count==3){
        $item=0;
        echo "</div>";
        $count=0;
    }
}
if($item==0){
    echo "<h3>No medicine found</h3>";
}
if($count!=0){
    echo "</div>";
    $count=0;
}

?>