<?php

include "../actions/search_med.php";

function displayChores($cid,$med_name,$medicine_qty,$medicine_price){
    $medicine="  <div class='col-sm-6 col-lg-4 text-center item mb-4'>
    <a href='shop-single.html'> <img src='..img/meds/product_01.png' alt='Image'></a>
    <h3 class='text-dark'><a href='shop-single.html'>".$med_name."</a></h3>
    <p class='price'><del>95.00</del> &mdash;".$medicine_price." cedis</p>
    <p class='inventory'>Inventory: ".$medicine_qty."</p>
    <button class='btn btn-primary buy-button' data-drug='.$med_name.' data-prescription-required='true'>Buy .$med_name.</button>
    <input type='file' class='prescription d-none'>
  </div>";
return $medicine;
}
function find($m){
$meds=getMed($m);
$count=0;
$item=0;
foreach($meds as $med){
    $item+=1;
    if($count==0){
        echo "<div class='row'>";
    }
    $count+=1;
    echo displayChores($med['medicine_id'],$med['medicine_name'],$med['medicine_qty'],$med['medicine_price']);
    $item+=1;
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
}
?>