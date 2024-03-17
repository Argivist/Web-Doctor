<?php
require '../actions/get_all_medicines.php';

function invlist(){
    echo "[";
    foreach(getAllMeds() as $med){
        echo "{";
        echo "\"id\": \"".$med['medicine_id']."\",";
        echo "\"name\": \"".$med['medicine_name']."\",";
        echo "\"quantity\": \"".$med['medicine_qty']."\"";
        echo "},";
    }
    echo "]";
}
invlist();