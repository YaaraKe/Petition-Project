function sendMail(email){
    var tempParams={
        from_name:document.getElementById("fromname").value,
        to_name:document.getElementById("toname").value,
        message:document.getElementById("msg").value,
        to_email:email,
    }
    emailjs.send('service_a5xtsoa','template_uq2ksev',tempParams)
    .then(function(res){
        console.log("success", res.status)
    })
}
