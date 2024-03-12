
<?php
function displayPresc($mid, $url, $med_name, $medicine_qty)
{
    $cart_item = "

<tr>
<input type='text' name='med_id' value='" . $mid . "' hidden/> 

                    <td class='product-thumbnail'>
                    <a href='../views/medicine.php?med_id=" . $mid . "'>
                      <img src=" . $url . " alt='Image' class='img-fluid'>
                      </a>
                    </td>
                    <td class='product-name'>
                    <a href='../views/medicine.php?med_id=" . $mid . "'>
                      <h2 class='h5 text-black'>" . $med_name . "</h2>
                      </a>
                    </td>
                    
                    <td>
                    <a href='../views/medicine.php?med_id=" . $mid . "'>
                        <h2 class='h5 text-black'>" . $medicine_qty . "</h2>
                        </a>
                    
                    </td>
                    
                      </tr>";
                  return $cart_item;
}
