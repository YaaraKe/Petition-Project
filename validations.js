function ValidatePetitionForm(){
    
    var subject = document.petitionForm.subject;
    var content = document.petitionForm.Content;
    var target = document.petitionForm.sign_num;
    var alertf = document.petitionForm.alert_sign;
    var counter=0;
    
if(subject.value.match(/\D/) == null){
    setErrorFor(subject,"\n" +"You must enter letters to your subject.");
}
   else if(subject.value.length>50 || subject.value.length<5){
        setErrorFor(subject, "Length: "+ subject.value.length + "\n" +"Title length must be between 5 and 50 characters."  );
        return false;
    } 
    else{
        setSuccessFor(subject);
        counter++;
     }
     if(content.value.match(/\D/) == null){
        setErrorFor(content,"\n" +"You must enter letters to your content.");
        return false;
     }
     else{
        
         if(content.value.length>65535 || content.value.length<10){
            setErrorFor(content,"Length: "+ content.value.length +  "\n" +"Your content must be between 10 to 65,535 characters.");
            return false;
         }
         else{
            setSuccessFor(content);
            counter++;
         }
     }
     if(target.value<1){
        setErrorFor(target,"\n" +"Target signatures must be a positive number.");
        return false;
     }
     else if (target.value>999999999){
        setErrorFor(target,"\n" +"Please try to select a lower target signatures.");
        return false;
     }
     else{
        setSuccessFor(target);
        counter++;
     }

     if(alertf.value>=target.value){
         alert( alertf.value + ">=" + target.value)
        setErrorFor(alertf,"\n" +"The number of signatures to be notified must be lower than the target signature. We will also notify you when you reach your full destination:" + "\n" +target.value +".");
        return false;
     } 
     else{
        setSuccessFor(alertf);
        counter++;
     }
   if(counter==4){
       return true;
   }



}

function sign_name(){
    var namef = document.signedForm.signName;
    if(namef.value.length>100){
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