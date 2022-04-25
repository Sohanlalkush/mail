<style>
.success{
    color: green ;
    font-weight: 700;
    padding: 5px;
    text-align: center;
}
.failed{
    color: red;
    font-weight: 700;
    padding: 5px;
    text-align: center;
}
</style>

<?php  
 
if(isset($_POST['submit'])) {
 $mailto = "work4sohan@gmail.com";  //My email addres
 $mailtoo = "no_reply@pharmalite.in"; //confirmation email
 //getting customer data
 $name = $_POST['name']; //getting customer name
 $fromEmail = $_POST['email']; //getting customer email
 $phone = $_POST['tel']; //getting customer Phome number
 $subject = $_POST['subject']; //getting subject line from client
 $subject2 = "Confirmation: Message was submitted successfully | HMA WebDesign"; // For customer confirmation
 
 //Email body I will receive
 $message = "Cleint Name: " . $name . "\n"
 . "Phone Number: " . $phone . "\n\n"
 . "Client Message: " . "\n" . $_POST['message'];
 
 //Message for client confirmation
 $message2 = "Dear" . $name . "\n"
 . "Thank you for contacting us. We will get back to you shortly!" . "\n\n"
 . "You submitted the following message: " . "\n" . $_POST['message'] . "\n\n"
 . "Regards," . "\n" . "- HMA WebDesign";
 
 //Email headers
 $headers = "From: " . $fromEmail; // Client email, I will receive
 $headers2 = "From: " . $mailtoo; // This will receive client
 
 //PHP mailer function
 
  $result1 = mail($mailto, $subject, $message, $headers); // This email sent to My address
  $result2 = mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
 
  //Checking if Mails sent successfully
 
  if ($result1 && $result2) {
    $success = " Your message was sent Successfully!";
  } else {
    $failed = "Sorry! Message was not sent, Try again Later.";
  }
 
}

   if ($result1 && $result2) {
      echo "<p class='success' >Your message was sent successfully..!🙂   <button style='color:green;'  onclick='openQ()'>view Question </button>

      </p>";
}
else
{
   echo "<p class='failed'>Sorry!  message was  sent,Try again Later . 😕   <button style='color:red;'  onclick='back()'>Go back on previous page</button>

   </p>";

}



?>

<script>
var sst = <?=json_encode($subject)?>; // Don't forget to sanitize

 function openQ () {
     window.open('https://qna.pharmalite.in/search?q='+sst,) ;
     
     }
</script>
<script>
    function back() {
      window.history.back()
    }
      
</script>