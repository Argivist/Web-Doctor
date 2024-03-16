function add_presc(med,pat,qty,error){
    var med=document.getElementById(med).value;
    var pat=document.getElementById(pat).value;
    var qty=document.getElementById(qty).value;
    var error=document.getElementById(error);

    fetch('../action/add_presc.php',{
        method:'POST',
        body:JSON.stringify({med:med,pat:pat,qty:qty}),
        headers: {'content-type':'application/json'}
    }).then(response=>{
        return response.json();
    }).then(data=>{
        if(data.status==200){
            error.innerHTML=data.message;
        }else{
            error.innerHTML=data.message;
        }
    });
}