function sendMailtosupporters(email,p_title){
    var tempParams={
        from_name:document.getElementById("fromname").value,
        subject:document.getElementById("subject").value,
        message:document.getElementById("msg").value,
        email:email,
        name:p_title,
    }
    emailjs.send('service_a5xtsoa','template_sjzsm9m',tempParams)
    .then(function(res){
        console.log("success", res.status)
    })
}
