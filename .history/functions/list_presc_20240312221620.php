
<?php
function displayPresc($mid, $url, $med_name, $medicine_qty)
{
    $cart_item = "
    <a href='../views/medicine.php?med_id=" . $mid . "'>
<tr>
<input type='text' name='med_id' value='" . $mid . "' hidden/> 
                    <td class='product-thumbnail'>
                      <img src=" . $url . " alt='Image' class='img-fluid'>
                    </td>
                    <td class='product-name'>
                      <h2 class='h5 text-black'>" . $med_name . "</h2>
                    </td>
                    
                    <td>
                        <h2 class='h5 text-black'>" . $medicine_qty . "</h2>
                    
                    </td>
                    
                      </tr></a>";
                  return $cart_item;
}
