
<?php
function displayCart($mid, $url, $med_name, $medicine_qty, $medicine_price,$total)
{
    $cart_item = "
<tr>
<input type='text' name='med_id' value='" . $mid . "' hidden/> 
                    <td class='product-thumbnail'>
                      <img src=" . $url . " alt='Image' class='img-fluid'>
                    </td>
                    <td class='product-name'>
                      <h2 class='h5 text-black'>" . $med_name . "</h2>
                    </td>
                    <td>" . $medicine_price . " cedis</td>
                    <td>
                      <div class='input-group mb-3' style='max-width: 120px;'>
                        <div class='input-group-prepend'>
                        <a href='../actions/update_qty.php?action=0&m_id=".$mid."'><button class='btn btn-outline-primary js-btn-minus' type='button'>&minus;</button></a>
                        </div>
                        <input type='text' class='form-control text-center' value='" . $medicine_qty . "' placeholder=''
                          aria-label='Example text with button addon' aria-describedby='button-addon1'>
                        <div class='input-group-append'>
                        <a href='../actions/update_qty.php?action=0&m_id=".$mid."'><button class='btn btn-outline-primary js-btn-plus' type='button'>&plus;</button></a>
                        </div>
                      </div>
    
                    </td>
                    <td>".$total."</td>
                    <td><a href='../actions/delete_from_cart.php?del=".$mid."' class='btn btn-primary height-auto btn-sm'>X</a></td>
                  </tr>";
                  return $cart_item;
}
