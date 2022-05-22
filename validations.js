function ValidatePetitionForm(){
    
    var subject = document.petitionForm.subject;
    var img = document.petitionForm.img;
    var content = document.petitionForm.Content;
    var target = document.petitionForm.sign_num;
    var alertf = document.petitionForm.alert_sign.value;
    var alertn = document.petitionForm.alert_sign;
    var targetv=document.petitionForm.sign_num.value;
    var targetv_INT=parseInt(targetv);
    var alertf_INT=parseInt(alertf);
    var counter=0;
    var blacklist=/["';`]+/;
    
if(subject.value.match(/\D/) === null){
    setErrorFor(subject,"\n" +"You must enter some content.");
    
}
else if(blacklist.test(subject.value)){
    setErrorFor(subject,"\n" +"You can not enter spacial characters.");
}
   else if(subject.value.length>50 || subject.value.length<3){
        setErrorFor(subject, "Length: "+ subject.value.length + "\n" +"Title length must be between 3 to 50 characters."  );
       
    } 
    else{
        setSuccessFor(subject);
        counter++;
     }
     if(content.value.match(/\D/) === null){
        setErrorFor(content,"\n" +"You must enter some content.");
       
     }
     else if(blacklist.test(content.value)){
        setErrorFor(content,"\n" +"You can not enter spacial characters.");
    }
     else{
        
         if(content.value.length>65535 || content.value.length<10){
            setErrorFor(content,"Length: "+ content.value.length +  "\n" +"Your content must be between 10 to 65,535 characters.");
            
         }
         else{
            setSuccessFor(content);
            counter++;
         }
     }
     if(target.value.length===0){
        setErrorFor(target,"\n" +"You must pick a number.");
     }
     else if(targetv_INT<1){
        setErrorFor(target,"\n" +"Target signatures must be a positive number.");
        
     }
     else if (targetv_INT>999999999){
        setErrorFor(target,"\n" +"Please try to select a lower target signatures.");
       
     }
     else{
        setSuccessFor(target);
        counter++;
     }
     if(alertn.value.length===0){
        setErrorFor(alertn,"\n" +"You must pick a number.");
     }

     else if(alertf_INT>targetv_INT){
        setErrorFor(alertn,"\n" +"The number of signatures to be notified must be lower  or equal to the target signature.");
      
     } 
     else{
        setSuccessFor(alertn);
        counter++;
     }
     if(img.value===""){
         setErrorFor(img,"\n" +"You must upload a image.");
         
     }
     else{
          setSuccessFor(img);
        counter++;
     
     }
   if(counter==5){
       return true;
   }
   else{ return false;}



}


function sign_name(){
    var namef = document.signedForm.signName;
    var blacklist=/["';`]+/;
    if(namef.value.length===0){
        setErrorFor(namef,"\n" +"You must enter your name.");  
        return false;
    }
    else if(blacklist.test(namef.value)){
        setErrorFor(namef,"\n" +"You can not enter spacial characters.");
        return false;
    }
    else if(namef.value.length>100){
        alert("ggg")
        setErrorFor(namef,"\n" +"please enter a name length less than 100 charcters.");
        return false;
    }
    else{ 
        return true;
    }
}


function setErrorFor(input, msg){
    const formControl=input.parentElement;
          const small=formControl.querySelector('small');
          small.innerText=msg;
          formControl.className='form-control error';
  }
  
  function setSuccessFor(input){
      const formControl=input.parentElement;
      formControl.className='form-control success';
  }