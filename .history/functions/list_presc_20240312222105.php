
<?php
function displayPresc($mid, $url, $med_name, $medicine_qty, $medicine_desc)
{
    $cart_item = "

<tr>
<input type='text' name='med_id' value='" . $mid . "' hidden/> 

                    <td class='product-thumbnail'>
                    <a href='../view/shop-single.php?med_id=" . $mid . "&url=" . $url . "&name=" . $med_name . "&qty=" . $medicine_qty . "&desc=" . $medicine_desc . "'>
                      <img src=" . $url . " alt='Image' class='img-fluid'>
                      </a>
                    </td>
                    <td class='product-name'>
                    <a href='../view/shop-single.php?med_id=" . $mid . "'>
                      <h2 class='h5 text-black'>" . $med_name . "</h2>
                      </a>
                    </td>
                    
                    <td>
                    <a href='../view/shop-single.php?med_id=" . $mid . "'>
                        <h2 class='h5 text-black'>" . $medicine_qty . "</h2>
                        </a>
                    
                    </td>
                    
                      </tr>";
                  return $cart_item;
}
