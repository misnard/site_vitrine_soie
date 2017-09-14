<?php
     session_start();
     // Plusieurs destinataires
     $to = "hello@mealit.me";

     // Sujet
     $subject = 'Reservation';

     // message
     $message = '
     <html>
      <head>
       <title>Vous avez recu une réservation</title>
      </head>
      <body>
       <p>De: ' . $_POST["name"] . ', tel : ' . $_POST["phone"] . ', Email : ' . $_POST["email"] . '</p>

       <p>' . $_POST["person"] . ' Personne(s)</p>
       <p>Date : ' . $_POST["date"] . '</p>
       <p>Heure : ' . $_POST["time"] . '</p>
       </table>
      </body>
     </html>
     ';

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     // En-têtes additionnels

     // Envoi
     mail($to, $subject, $message, $headers);
     $_SESSION['have_res'] = true;
     header("Location : index.php");

?>