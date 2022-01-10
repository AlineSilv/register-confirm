<?php
namespace FULLPHP;

trait HasDynamicProperty{
    public function createProperty($name,$value){
        $this->{$name}=$value;
    }


}


Class Movie{
    use HasDynamicProperty;
    public function __construct(array $dbRow){
        foreach ($dbRow as $name => $value){
            $this->createProperty($name,$value);
        }
    }


public function getMovies()
{
    $con=$this->con;
    $rs=$con->prepare("SELECT * FROM filmes");
    if($rs->execute()){
        $movies = [];
        $rows=$rs->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($rows as $row){
        $movies[]=new Movies($row);
    }
    return $movies;
}
}

}
?>











<script>












//stract guru    

//////////// JQUERY //////////////

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
 integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



/// CAMPO DE BUSCA JQUERY QUICKSEARCH ///
https://www.devmedia.com.br/quicksearch-e-bootstrap-adicione-buscas-em-paginas-web/37629
// tentar usar a tabela de xml


 //////// SWEET ALERT LINK///////////

 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 /////// BOOTSTRAP ////////////

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
 integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

///////// COMPOSER /////////
Getcomposer.org
//terminal - > Abrir a pasta de inserção e dar start no 'composer init' dentro dela, digitar nome e email.
// 'Composer Update' na pasta referente quando terminar as edições.


////////// AJAX //////////

https://www.youtube.com/watch?v=yZaroycfU_E

/////////// ALERT COMPLETO ////////
<html>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
   crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">

<body>
<script>
Swal.fire(
    'The Internet?',
    'That thing is still around?',
    'question'
  )
</script>
</body>
</html>

</script>


?>


///// EMAILSEND PICKGIST ///////

<?php

namespace Theop\FULLPHP;
require_once __DIR__ . '/composer/autoload_real.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class emailsend{
    

    public function send(){
        $mail = new PHPMailer(true); //conexão

        try { // ACESSOS PARA CONECTAR SERVIDOR
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.gabrielhenriq.com.br';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'aulas@gabriel.com.br';                     //SMTP username
            $mail->Password   = '01020304@#$';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
         
            /// Linkando pontos de recebimento
            //Recipients
            $mail->setFrom('aulas@gabrielhenriq.com.br', 'Mailer');
            $mail->addAddress('alineas.study@gmail.com.br', 'Joe User');     //Add a recipient
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        


    }
}
<?php

namespace Theop\Fullphp;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

Class emailsend{ // namespace's
public function send($subject, $body, $recipient_name, $recipient_email){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = "mail.gabrielhenriq.com.br";                   //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "aulas@gabrielhenriq.com.br";                     //SMTP username
        $mail->Password   = "01020304@#$";                       //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom(MAIL['from_email'], MAIL['from_name']);
        $mail->addAddress("aulas@gabrielhenriq.com.br", "Aline"); 
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
    
        return $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
}



?>
