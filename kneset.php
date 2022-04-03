<?php
  
$user = 'nofarrei_user';
$password = '12345'; 
$database = 'nofarrei_Petition'; 
$servername='localhost';
$mysqli = new mysqli($servername, $user, 
                $password, $database);
  
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
  
// SQL query to select data from database
$sql = "SELECT * FROM Knesset_Member ORDER BY full_name DESC ";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script type="text/javascript">
        (function () {
            emailjs.init("qZZh-2WKTlDaP8qY3");
        })();
    </script>
    <script>
       var  flag=0;
        function email_choesen(clicked_id){
            document.getElementById("toemail").value=clicked_id;
            flag=1;
        }
    </script>
    <link rel="stylesheet" href="kneset.css">
</head>

<body>

       <!-- IMPORT BOOTSTRAP SCRIPTS-->
       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        <link href="petitions_errors.css" rel="stylesheet">

    <!-- nav bar for the website -->
    <br>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../NavBar/UcanClaim.png" width="125" height="60" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../home.php">Home<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../Petition_options.html">Petition<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../index.html">Shop<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../kneset.php">Contact Knesset Member<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../my_petition.php">My petitions<span class="sr-only"></span></a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <h1>Send Email to a Knesset Member</h1>
    <br>
    <form class="col-7">

         <div class="form-control ">
        <lable>To:</lable> 
        <input name="to" type="text" id="toname" placeholder="Recipient name" required  >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
</svg>
        <small> Error message </small>
    </div>
    <div class="form-control">
        <label>name:</label>  <input type="text" id="fromname" placeholder="Your name" required name="userName"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
        <small> Error message </small>
    </div>
    <div class="form-control ">
        <lable>Message:</lable> <br>
        <textarea name="msg" id="msg" placeholder="Your message" rows="10" cols="50" required ></textarea>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-quote-fill" viewBox="0 0 16 16">
  <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm7.194 2.766a1.688 1.688 0 0 0-.227-.272 1.467 1.467 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 5.734 4C4.776 4 4 4.746 4 5.667c0 .92.776 1.666 1.734 1.666.343 0 .662-.095.931-.26-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01 1.334-1.329 1.37-2.758.941-3.706a2.461 2.461 0 0 0-.227-.4zM11 7.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01 1.334-1.329 1.37-2.758.942-3.706a2.466 2.466 0 0 0-.228-.4 1.686 1.686 0 0 0-.227-.273 1.466 1.466 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 10.07 4c-.957 0-1.734.746-1.734 1.667 0 .92.777 1.666 1.734 1.666.343 0 .662-.095.931-.26z"/>
</svg>
        <small> Error message </small>
</div>
<div class="form-control ">
<p style="color:blue;"> Click on a Member of Knesset in the table below</p>
<label> Recipient Email address:</label>  <input type="text" name="tomail" id="toemail" required disabled>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-thumb-fill" viewBox="0 0 16 16">
  <path d="M8.5 1.75v2.716l.047-.002c.312-.012.742-.016 1.051.046.28.056.543.18.738.288.273.152.456.385.56.642l.132-.012c.312-.024.794-.038 1.158.108.37.148.689.487.88.716.075.09.141.175.195.248h.582a2 2 0 0 1 1.99 2.199l-.272 2.715a3.5 3.5 0 0 1-.444 1.389l-1.395 2.441A1.5 1.5 0 0 1 12.42 16H6.118a1.5 1.5 0 0 1-1.342-.83l-1.215-2.43L1.07 8.589a1.517 1.517 0 0 1 2.373-1.852L5 8.293V1.75a1.75 1.75 0 0 1 3.5 0z"/>
</svg>
        <small> Error message </small>
        </div> 
   
        <button onclick=" return kneset_validate()" class="btn btn-outline-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
</svg> | Send Email</button> 
        <button type="reset" value="Reset" name="reset" class="btn btn-outline-secondary">           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
  <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
</svg> | Reset</button>

    </form>


    

    <section>
        <h1>Contact Members</h1>
        <!-- TABLE CONSTRUCTION-->
        <div class="tableFixHead">
        <table>
        <thead>    
        <tr>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Party</th>
                
        </tr>
        </thead>
        <tbody>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
                    $res=$rows['Email'];
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['full_name'];?></td>
                <!-- the specific mail -->
                <td> <button onclick="email_choesen('<?php echo $res; ?>')"><?php echo $rows['Email'];?> </button></td>
                <td><?php echo $rows['Party'];?></td>
               
            </tr>
            <?php
                }
             ?>
        </tbody>
        </table>
        </div>
    </section>
    <br>

    <!-- validation form -->
    <script>
        
        function kneset_validate(){
    
   var  to_send= document.getElementById("toname");
     var msg=document.getElementById("msg");
     var tomail=document.getElementById("toemail");
     var userName=document.getElementById("fromname");
     var counter=0;
     var blacklist=/["';`]+/;
     
    

    if(to_send.value.match(/\D/) === null){
        
        setErrorFor(to_send,"\n" +"You must enter some content.");
        
    }
    else if(blacklist.test(to_send.value)){
    setErrorFor(to_send,"\n" +"You can not enter spacial characters.");
}
    else{
     setSuccessFor(to_send);
     counter++;
    }
 if(msg.value.match(/\D/) === null){
    
         setErrorFor(msg,"\n" +"You must enter some content to your message.");
     }
     else if(blacklist.test(msg.value)){
    setErrorFor(msg,"\n" +"You can not enter spacial characters.");
     }
     
     else if(msg.value.length<5) {
         setErrorFor(msg,"\n" +"Message content must be longer than 5 characters.");
     }
     else{
 setSuccessFor(msg);
 counter++;}

 if(userName.value.match(/\D/) === null ){
   
         setErrorFor(userName,"\n" +"You must enter some content to the name.");
     }
     else if(blacklist.test(userName.value)){
    setErrorFor(userName,"\n" +"You can not enter spacial characters.");
     }
     
     else{
 setSuccessFor(userName);
 counter++;
 }

 if(flag==0){
    setErrorFor(tomail,"\n" +"You must select an Email address from the table below.");
 }
 else{
    setSuccessFor(tomail);
 counter++;
 }
if(counter==4){
 sendMail();
 alert("Your message was sent successfully.")
 return true;
}
else{
    return false;
}
}
        function setErrorFor(input, msg){
           
    const formControl=input.parentElement;
          const small=formControl.querySelector("small");
          small.innerText=msg;
          formControl.className='form-control error';
  }
  
  function setSuccessFor(input){
      const formControl=input.parentElement;
      formControl.className='form-control success';
  }
        </script>

</body>

</html>



