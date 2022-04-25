<?php

session_start();
include("db_conn.php");
?>
<script>
    var email = "<?php echo $_SESSION['user_name']; ?>";
    var password="<?php echo $_SESSION['password']?>";



function emailValidation(){


    var new_email = document.getElementById("new_email");
    var password_verification = document.getElementById("password_ver");
    var blacklist=/["';`]+/;
    var count=0;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(new_email.value.length===0){
        
        setErrorFor(new_email,"\n" +"You must enter your new Email.");      
    }
    else if (!filter.test(new_email.value))
         setErrorFor(new_email,"\n" +"You must enter a valid Email.");  
    
    else {
        setSuccessFor(new_email);
        count++;

    }
    if(password_verification.value.length===0){
        setErrorFor(password_verification,"\n" +"You must enter your password.");  
        
    }
    
    else{
        setSuccessFor(password_verification);
        count++; 
    }
   
   if (count==2)
   return true;

else
    return false;

}

function passwordValidation(){
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    var old_password = document.getElementById("old_password");
    var count=0;
    var flag=0;

    if(password1.value.length===0){
        
        setErrorFor(password1,"\n" +"You must enter your new password.");
        setErrorFor(password2,"\n" +"");      
    }
    else if(password1.value.length<5){
        setErrorFor(password1,"\n" +"Your password must be over 5 characters."); 
        flag=0;     
    }
    else{
        setSuccessFor(password1);
        count++;  
        flag=1;
    }
     if (flag==1){
    if(password2.value!=password1.value){
        setErrorFor(password2,"\n" +"The two passwords do not match.");
        setErrorFor(password1,"\n" +"");  
    }
    else{
        setSuccessFor(password1);
        setSuccessFor(password2);
        count++;
    }
}
    if(old_password.value.length===0)
    setErrorFor(old_password,"\n" +"You must enter your previous password.");   
 else{
    setSuccessFor(old_password);
    count++;
 }
    if (count==3)
    return true;

else{
    return false;
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
  </script>