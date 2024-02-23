<?php

include "../action/get_all_medicines.php";

function displayChores($cid,$chore){
    $chores="
    <tr>
                        <td>".$cid."</td>
                        <td>".$chore."</td>
                        
                        <td class='action' style='padding-left:35%;'>
                        <form action='../action/edit_chore_action.php'  method='GET'>
                            <button class='btn' id='edit'   name='edit' value='".$cid."'>
                                <img src='https://img.icons8.com/ios/50/000000/edit.png' width='20px'/>
                            </button>
                            </form>
                            <form action='../action/delete_chore_action.php' method='GET'>
                            <button class='btn' id='remove' name='delete' value='".$cid."'> 
                                <img src='https://img.icons8.com/ios/50/000000/delete-sign.png' width='20px'/>
                            </button>
                            </form>
                        </td>
                    </tr>
    ";
return $chores;
}
$chore=getAllChores();

foreach($chore as $chores){
    echo displayChores($chores['cid'],$chores['chorename']);
}

?>