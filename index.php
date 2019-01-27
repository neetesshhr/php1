<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Voters Regitration Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

 <link rel="icon" href="download.jpg">
      <link rel="stylesheet" href="css/style.css">


</head>

<body>

  <div class="user">
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
        <h1 class="user__title">Voter's Registration form</h1>
    </header>
    <?php
    if (isset($_GET['error'])) {
     if ($_GET['error'] == "emptyfields") {
     echo '<p class="signuperror">Fill in all fields</p>';
     }
     elseif ($_GET['error'] == "invalidemailcitizenshipidvotingcoderollno") {
     echo '<p class="signuperror">Fill in all fields</p>';
     }
     elseif ($_GET['error'] == "invalididemailcitizenshipvotingcoderollno") {
     echo '<p class="signuperror">Invalid e-mail  and citizenshipid and votingcode and  rollno </p>';
     }
      elseif ($_GET['error'] == "invalidemail") {
       echo '<p class="signuperror">invalid email</p>';
       }
        elseif ($_GET['error'] == "invalidcitizenshipid") {
         echo '<p class="signuperror">invalid citizenshipid</p>';
         }
         elseif ($_GET['error'] == "invalidvotingcode") {
           echo '<p class="signuperror">Invalid votingcode</p>';
           }
           elseif ($_GET['error'] == "invalidrollno") {
           echo '<p class="signuperror">invalid roll no</p>';
           }
    }

     ?>

    <form class="form" method="POST" action="includes/signup.inc.php">
        <div class="form__group">
            <input type="text" placeholder="First Name" name="first-name" class="form__input" />
        </div>
        <div class="form__group">
            <input type="text" placeholder="Last Name" name="last-name" class="form__input" />
        </div>
         <div class="form__group">
            <input type="email" placeholder="Email" name="email" class="form__input" />
        </div>
        <div class="form__group">
            <input type="number" placeholder="Contact Number"  name="contact" class="form__input" />
        </div>
        <div class="form__group">
            <input type="text" placeholder="Roll Number"  name="rollno" class="form__input" />
        </div>
        <div class="form__group">
            <input type="text" placeholder="citizenship-ID" name="citizenshipid"  class="form__input" />
        </div>

        <div class="form__group">
            <input type="text" placeholder="votercode" name="votingcode" class="form__input" />
        </div>

        <button class="btn" name="register"  type="submit">Register</button>
    </form>
</div>



    <script  src="js/index.js"></script>




</body>

</html>
