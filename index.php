<html>
  <head>
    <title>contact</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <div class="contact-form">
    <h2> contact us</h2>
    <form method="post" action="">
      <input type="text" name="name" placeholder="your name" required>
      <input type="text" name="phone" placeholder="your phone no" required>
      <input type="email" name="email" placeholder="your email" required>
      <textarea name="message" placeholder="your message" required></textarea>
      
            <div class="g-recaptcha" data-sitekey="6LckAQ4eAAAAAC4AK6NfrEo4i9HTtS1wobkRVgIL"></div>
      
      <input type="submit" name="submit" value="send message" class="submit-btn"> 
    </form>
    <div class="status">
      <?php
      
      If(isset($_POST['submit']))
      {
          $user_name = $_POST['name'];
          $phone = $_POST['phone'];
          $user_email = $_POST['email'];
          $user_message = $_POST['message'];
          
          $email_from="noreply@srijandhungana.com.np";
          $email_subject="New form submission"
          $email_body= "Name": $user_name.\n".
                       "Phone No: $phone.\n".
                       "Email Id: $user_email.\n".
                       "User message: $user_message.\n".;
          $to_email="justforstudy@gmail.com";
          $headers= "From: $email_from\r\n";
          $headers .="Reply-To: $user_email\r\n";
          
          $secretkey="6LckAQ4eAAAAAAxDnXQmXtN16nXNwQNecu3RkaWI";
          $responseKey=$_Post['g-reaptcha-response'];
          $UserIP= $_SERVER['REMOTE_ADDR'];
          $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responseKey&remoteip=$UserIP";
          
          $response= file_get_contents($url);
          $response= json_decode($response);
          
          if ($response->success)
          {
            mail($to_email,$email_subject,$email_body,$headers);
            echo "Message sent successfully";
            
            
          }
          else{
              echo "<span>Invalid Captcha, please try again</span>"
          }
      }
      
      ?>
    </div>
    </div>
    
  </body>
</html>