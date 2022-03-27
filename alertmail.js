function sendalert(alertnum, petition_name, owner_email){
    
    var tempParams={
        petition_name:petition_name,
        alert_signatures:alertnum,
        to_email:owner_email,

    }
    emailjs.send('service_78pjhbs','template_bdrvkod',tempParams)
    .then(function(res){
        console.log("success", res.status)
        console.log(tempParams)
    })
   
   
}