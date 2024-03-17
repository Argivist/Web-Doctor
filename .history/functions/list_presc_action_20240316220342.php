
<?php
function displayPresc($pid,$mid, $url, $med_name, $medicine_qty, $medicine_desc,$medicine_price)
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
                    
                     <td>
                  
                        <h2 class='h5 text-black'>" . $medicine_qty . "</h2>
                    
                    </td>
                    <td>
                    <button class='btn btn-primary safer validate-button' data-product-id='".$pid."'>Validate Prescription</button><br/>
                    <button class='btn btn-primary  view-profile-button' data-toggle='modal' data-target='#profileModal' data-name='".
                    
                    ."' data-age='28'>View Buyer Profile</button><br/>
                    <button class='btn btn-primary danger reject-button' data-toggle='modal' data-target='#reasonModal' data-product-id='".$pid."'>Reject Prescription</button><br/>
            
                    </td>
                    
                      </tr>";
                  return $cart_item;
}
