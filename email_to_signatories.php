
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signed a Petiton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <script src="email_to_supporters.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script type="text/javascript">
    (function() {
    emailjs.init("qZZh-2WKTlDaP8qY3");
    })();
    </script>
</head>
<body>

    <!-- IMPORT BOOTSTRAP SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <!-- nav bar for the website -->
    <br>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="/NavBar/UcanClaim.png" width="125" height="60" class="d-inline-block align-top" alt="">
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
                    <a class="nav-link" href="../index_react/index.html">Shop<span class="sr-only"></span></a>
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
    <link href="petitions_errors.css" rel="stylesheet">
    <br><br>

    <?php
    session_start();
include 'db_conn.php';
$id = $_GET['id'];
$id = mysqli_real_escape_string($conn,$id);
 
 $sql = "SELECT title, id_petition FROM all_petitions WHERE `id_petition`='" . $id . "'";
 $resultset = mysqli_query($conn,$sql); 
 if ($resultset === FALSE) {
    die(mysqli_error($conn));
  }
  else{
  // echo the title of the selected petition
while($row=mysqli_fetch_assoc($resultset)){
 ?> 
<h1> Send email to your supporters </h1>
<h6>Petition Subject: <?php echo'"'; echo $row['title']; ?>" </h6>


<?php 
}
}
//count number of signatures
$sql2= "SELECT count(*) AS total FROM signatures WHERE `id_petition`='" . $id . "'";
$result=mysqli_query($conn,$sql2);
 if ($result === FALSE) {
    die(mysqli_error($conn));
  }
  else{
  $data=mysqli_fetch_assoc($result);
  ?>

        <h6>Number of supporters: <?php echo $data['total']; ?> </h6>
<?php
  }
 ?>

    <br>
    <form class="col-7" method="POST">

    <div class="form-control">
        <label>Name:</label>  <input type="text" id="fromname" placeholder="Your name" required name="userName"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
        <small> Error message </small>
    </div>
    <div class="form-control ">
    <lable>Subject:</lable> 
    <input  type="text" id="subject" placeholder="Email's subject" required  >
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
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
   
        <button name="submit" onclick="return signatories_validate()" class="btn btn-outline-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
</svg> | Send Email</button> 
        <button type="reset" value="Reset" name="reset" class="btn btn-outline-secondary">           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
  <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
</svg> | Reset</button>

    </form>
   

    <!-- validation form -->
    <script>
        
        function signatories_validate(){
    
   var  subject= document.getElementById("subject");
     var msg=document.getElementById("msg");
     var userName=document.getElementById("fromname");
     var counter=0;
     
    
    if(subject.value.match(/\D/) === null){
        setErrorFor(subject,"\n" +"You must enter some content.");
    }
        
    else{
     setSuccessFor(subject);
     counter++;
    }
 if(msg.value.match(/\D/) === null){
    
         setErrorFor(msg,"\n" +"You must enter some content to your message.");
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
     
     else{
 setSuccessFor(userName);
 counter++;
 }

if(counter==3){
 //send Mail
 <?php
    $sql3 = "SELECT * FROM signatures WHERE `id_petition`='" . $id . "'";
    $result2 = mysqli_query($conn,$sql3);
    // retrieve petition title
    $sql4= "SELECT * FROM all_petitions WHERE `id_petition`='" . $id . "'";
    $record4= mysqli_query($conn,$sql4); 
    $result4 = mysqli_fetch_assoc($record4);
    $p_title = $result4['title'];
    while($record = mysqli_fetch_assoc($result2)){
        $email = $record['email_signed'];
  ?>
        // sending email to each supporter
            var email="<?php echo $email;?>";
            var p_title="<?php echo $p_title;?>";
            sendMailtosupporters(email,p_title); 
        
     <?php
    }
    ?>
 //alert("Your message was sent successfully.")
            alert ("Email was sent successfully.");
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

<?php
if(isset($_POST['submit'])){
    ?>
    <script>
     window.location='home.php';
     </script>
     <?php
}
?>
</body>
</html>

