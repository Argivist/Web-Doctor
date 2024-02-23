<?php

include "../action/get_all_medicines.php";

function displayChores($cid,$chore){
    $medicine="  <div class='col-sm-6 col-lg-4 text-center item mb-4'>
    <a href='shop-single.html'> <img src='images/product_01.png' alt='Image'></a>
    <h3 class='text-dark'><a href='shop-single.html'>Bioderma</a></h3>
    <p class='price'><del>95.00</del> &mdash; 55.00 cedis</p>
    <p class='inventory'>Inventory: 10</p>
    <button class='btn btn-primary buy-button' data-drug='Bioderma' data-prescription-required='true'>Buy Bioderma</button>
    <input type='file' class='prescription d-none'>
  </div>";
return $medicine;
}
$meds=getAllMeds();
$count=0;
foreach($meds as $med){
    if($count==0){
        echo "<div class='row'>";
    }
    $count+=1;
    echo displayChores($chores['cid'],$chores['chorename']);
    if($count==2){
        echo "</div>";
        $count=0;
    }
    

?>