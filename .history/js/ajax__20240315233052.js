function add_presc(med,pat,qty,error){
    var med_=document.getElementById(med).value;
    var pat_=document.getElementById(pat).value;
    var qty_=document.getElementById(qty).value;
    var error_=document.getElementById(error);

    fetch('../actions/add_presc.php',{
        method:'POST',
        body:JSON.stringify({med:med_,pat:pat_,qty:qty_}),
        headers: {'content-type':'application/json'}
    }).then(response=>{
        if (!response.ok) {
            // If the response status is not ok (e.g., 404 Not Found, 500 Internal Server Error)
            response.text().then(text => {
                console.log(text); // Log the response text
            });
        }
        return response.json();
    }).then(data=>{
        if(data.status==200){
            error.innerHTML=data.message;
        }else{
            error.innerHTML=data.message;
        }
    });
}