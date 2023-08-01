<?php
  $name = $_POST["fullname"];
  $email = $_POST["email"];
  $number = $_POST["number"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  if (!empty($email) && !empty($message)) {
    if (filter_var($email , FILTER_VALIDATE_EMAIL)) {
      $receiver = "haymeemotoh22@gmail.com";
      $subj = $subject . " FROM $name <$email>";
      $body = "Name : $name\nEmail : $email\nNumber : $number\nSubject : $subject\n\nMessage : $message";
      $sender = "FROM : $email";
      
      if (mail($receiver, $subj, $body, $sender)) {
        echo "Message sent!";
      } else {
        echo "Sorry, Failed to send your Message";
      }
    } else {
      echo "Enter a Valid Email Address";
    }
  } else {
    echo "Email and Message Field is Required!";
  }
  