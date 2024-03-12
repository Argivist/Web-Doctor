require '../actions/get_all_medicines.php';

function invlist(){
    echo "[";
    foreach(getAllMeds() as $med){
        echo "{";
        echo "\"id\": \"".$med['id']."\",";
        echo "\"name\": \"".$med['name']."\",";
        echo "\"quantity\": \"".$med['quantity']."\"";
        echo "},";
    }
    echo "]";
}