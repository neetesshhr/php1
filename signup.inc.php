<?php
if (isset($_POST['register'])) {
    require 'dbh.inc.php';
    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $citizenshipid = $_POST['citizenshipid'];
    $votingcode = $_POST['votingcode'];
    $rollno = $_POST['rollno'];
    //error handlers
    if (empty($firstname) || empty($lastname) || empty($email) || empty($contact) || empty($citizenshipid) || empty($votingcode) || empty($rollno)) {
      header("Location: ../index.php?error=emptyfields&first-name=".$firstname."&last-name=".$lastname."&email".$email."&contact".$contact."&citizenshipid".$citizenshipid."&votercode".$votingcode."&rollno".$rollno);
      exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) &&  !preg_match("/^[a-zA-Z0-9]*$/",$citizenshipid,$votingcode,$rollno)) {
      header("Location: ../index.php?error=invalididemailcitizenshipvotingcoderollno");
      exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../index.php?error=invalidemail".$citizenshipid);
      exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/",$citizenshipid)) {
      header("Location: ../index.php?error=invalidcitizenshipid=".$votingcode);
      exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/",$votingcode)) {
      header("Location: ../index.php?error=invalidvotingcode=".$rollno);
      exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/",$rollno)) {
      header("Location: ../index.php?error=invalidrollno=".$votingcode);
      exit();
    }

    else {
      $sql = "SELECT * FROM votersid WHERE citizenshipid=votingcode=rollno=?"; //check weather the username is already taken
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "sss",$citizenshipid,$votingcode,$rollno);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck=mysqli_stmt_num_rows($stmt);
        if($resultCheck > o){
          header("Location: ../index.php?error=sorry".$email);
          exit();
        }
        else {
          $sql ="INSERT INTO votersid(first-name,last-name,email,contact,citizenshipid,votingcode,rollno) VALUES(?,?,?,?,?,?,?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {

          mysqli_stmt_bind_param($stmt, "sssssss",$firstname,$lastname,$email,$citizenshipid,$votingcode,$rollno);
          mysqli_stmt_execute($stmt);
          header("Location: ../index.php?signup=sucess");
          exit();
          }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: ../index.php");
  exit();
}
