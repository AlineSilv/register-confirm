<?php

use Theop\Fullphp\emailsend;
use Theop\Fullphp\Persons;
use Theop\Fullphp\disparatemail;


//inejção do arquivo de classes de conexão.
require_once 'classes/persons.php';
//require 'vendor/autoload.php';

//autoload composer
require_once __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/config.php';
//use fullphp\classes;   //diretório emailsend.php

$email= new emailsend();



/*$email->send("Seu Novo Registro", 
"<h1>Um novo registro foi efetuado</h1> Os novos dados são: (???)",
"Aline S.",
"alinealv.silv@gmail.com"
);
*/

//disparado por um botão de submit

$email = new disparatemail();
$email->disparate($_POST['alinealv.silv@gmail.com']);

//inejção da classe de conexão, class Person.
//parâmetros da conexão com valores de campo do db.
$class=new Persons("persons", "localhost", "root", "");
//todas as informações do db estão nesta variável, para return.
//$data = $class->searchdata();
?>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="form/min.js"></script>
<!--<script>
$.ajax({
    method:"POST",
    url:"cadastro.php",
    data:{
        nome:"Cleide"
        email:"cleide@uol.com.br"
    },
    beforeSend:function(){
        $("#resultado").html("Espera, estamos enviando..");
    }
})
.done(function(msg){
    $("#resultado").html(msg);
})
.fail(function(jqXHR, textStatus,msg)){
    alert(msg)
}
</script>-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--BTS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <!--JQ-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

  <title>RegisterInForm</title>
</head>

<body class=row style="background-color: aquamarine;">
  <span style="display: flex;justify-content:left; margin-bottom:1%; padding-left:5%;"><h1>Register</h1></span>
  <header>
    <nav>
    <!-- Header Table No PHP -->
    </nav>
    <?php
    // Se temos o array _post, 'name' (se o usuário clicou me cadastrar e o name existe)
    //colheremos as informações em variáveis, protegidas pelo método 'addslashes($_POST[''])'.
    if(isset($_POST['firstname'])){
            //método de proteção, não permite códigos nos campos de preenchimento
      $firstname = addslashes($_POST['firstname']);
      $lastname = addslashes($_POST['lastname']);
      $phone = addslashes($_POST['phone']);
      $gender = addslashes($_POST['gender']);
      $workinperson = addslashes($_POST['workinperson']);
      $email = addslashes($_POST['email']);
      $password = addslashes($_POST['password']);
      $address = addslashes($_POST['address']);
      $city = addslashes($_POST['city']);
      $state = addslashes($_POST['state']);
      $district = addslashes($_POST['district']);
    
      //Condicionais para requerimento de todos os campos preenchidos e impedimento de email reutilizado.
      if(!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($gender) && !empty($workinperson) && !empty($email) && 
      !empty($password) && !empty($address) 
      && !empty($city) && !empty($state) && !empty($district)){
        if (!$class->Register($firstname, $lastname, $phone, $gender, $workinperson, $email, $password, $address, $city,
         $state, $district)){

          echo"Este e-mail foi cadastrado anteriormente e não pode ser reutilazado.";
        }
        
      }
      else{
        echo"Para prosseguir é necessário preencher todos os campos do formulário.";
      }
    }
    ?>

    <script>
    
    </script>
  </header>

  <main style="display: flex; justify-content: center; flex-direction: row; background-color: azure;">
    <section  class="col-md-6" style="display: flex; justify-content:left;flex-direction: row; background-color: azure;">
    <form style=" margin-left: 7%; margin-top: 5%;" method="POST" action="" id="formjq"> <!--DIR-->
      <!--First Name And Last Name-->
      <label for="name"> Enter Your Full Name:
        <div class="row g-3">
          <div class="col">
            <input name="firstname" type="text" class="form-control" placeholder="First name" aria-label="First name">
          </div>
          <div class="col">
            <input name="lastname" type="text" class="form-control" placeholder="Last name" aria-label="Last name">
          </div>
        </div>
      </label> 
      <!--Phone-->
      <div style="margin-top:2%; max-width:60%;" class="input-group mb-3">
        <label for="phone" class="input-group-text" id="basic-addon1">DDI+</label>
        <input name="phone" type="text" class="form-control" placeholder="(ddd)+" aria-describedby="basic-addon1">
      </div>
      <!--GENDER-->
      <div class="form-check">
        <input name="gender" class="form-check-input" type="radio" value="female" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
          Female
        </label>
        <div class="form-check">
          <input name="gender" class="form-check-input" type="radio" value="indeterminate" id="flexRadioDefault1">
          <label class="form-check-label" for="flexCheckIndeterminate" cheked>
            Indeterminate
          </label>
        </div>
      </div>
      <div class="form-check">
        <input name="gender" class="form-check-input" type="radio" value="male" id="flexRadioDefault">
        <label class="form-check-label" for="flexCheckChecked">
          Male
        </label>
      </div>
      <!--Availiable To Work Personation-->
      <label for="workinperson"> Are you available to work in person?
        <div class="form-check">
          <input name="workinperson" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">
            <em>-I am availiable to work in person.</em>
          </label>
        </div>
        <div class="form-check">
          <input name="workinperson" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
            checked>
          <label class="form-check-label" for="flexRadioDefault2">
            <em>-I am <strong>not</strong> availiable to work in person.</em>
          </label>
        </div>
      </label>
      <!--E-mail-->
      <div style="width: 60%;" class="col-md-6">
        <label name="email" for="inputEmail4" class="form-label">Enter Your Email:</label>
        <input name="email" type="email" class="form-control" id="inputEmail4">
      </div>
      <div style="width: 60%;" class="col-md-6">
        <!--Password-->
        <label name="password" for="inputPassword4" class="form-label">Password:</label>
        <input name="password" type="password" class="form-control" id="inputPassword4">
      </div>
      <!--Address-->
      <div style="max-width:60%;" class="col-12">
        <label name="address" for="inputAddress" class="form-label">Address:</label>
        <input name="address"type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
      </div>
      <!--City-->
      <div style="width:60%;" class="col-md-6">
        <label name="city" for="inputCity" class="form-label">City:</label>
        <input name="city" type="text" class="form-control" id="inputCity">
      </div>
      <!--State-->
      <div style="width:60%;" class="col-md-4">
        <label name="state" for="inputState" class="form-label">State:</label>
        <select name="state" id="inputState" class="form-select">
          <option selected>Choose...</option>
          <option value="Other">Other</option>
          <option value="MG"> Minas Gerais </option>
          <option value="RJ"> Rio de Janeiro </option>
          <option value="MT"> Mato Grosso </option>
          <option value="MS"> Mato Grosso do Sul </option>
          <option value="SP"> São Paulo </option>
          <option value="AC"> Acre </option>
        </select>
      </div>
      <!--District-->
      <div style="width:50%;" class="col-md-2">
        <label for="inputZip" class="form-label">District</label>
        <input name="district" type="text" class="form-control" id="inputZip">
      </div>
      <!--Introduce-->
      <div style="max-width:60%;" class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Introduce Yourself:</label>
        <textarea name="introduce" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <!--Curriculum-->
      <div style="max-width:60%;" class="mb-3">
        <label for="formFile" class="form-label"> Include Your Curriculum:</label>
        <input name="curriculum" class="form-control" type="file" id="formFile">
      </div>
      <!--I CONFIRM THE INFORMATION-->
      <div class="col-12">
        <div class="form-check">
          <input name="confirm" class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            I confirm the informations above.
          </label>
        </div>
      </div>
      <div style="margin-top:5%; margin-bottom:5%;" class="col-12">
        <button id="submit" type="submit" class="btn btn-primary">Register</button>
      </div>
    </form>

    </section>
    <!--- ASIDE LOGIN -->
  <aside class="col-md-6;" style="display: flex; flex-direction:row; justfy-content:right; background-color:white">
  <section style="margin-top:20%;">
    <img src="https://i.pinimg.com/474x/f9/a8/7d/f9a87d258d134093ffd3178ddf80c784.jpg" style="max-width:100%; max-height:100%">
    <div style="background-color:aquamarine; border-radius:10%;margin-top:30%;">
    <div>
  <span style="color:black;"><h2><strong>Login</strong></h2></span>
    <span style="font-style:italic;color:black;"><p><strong>-Members Only.</strong></p></span>
  </div>
    <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><h3 style="color:gray;"><strong>Email address</strong></h3></label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><h3 style="color:gray;"><strong>Password</strong></h3></label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" style="display:flex; justfy-content:center">Sing In</button>
</form>
  </div>
  <div>
    <span style="font-style:italic;color:gray;"><p><strong>If you're alredy has an account, come sing in!</strong></p></span>
  </div>
    </section>
  </aside>
  </main>

 <!-- TABLE MEMBERS -->
<section style="display: flex; flex-direction:row; justfy-content:center; background-color:white">

<table class="table">
  <!--titulos ficam acima do código php-->
  <thead>
    <tr>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Phone</th>
      <th scope="col">Gender</th>
      <th scope="col">Work In Person</th>
      <th scope="col">E-mail</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">District</th>
    </tr>
  </thead>
  
<!-- Váriavel contem todos os dados do banco de dados.-->
<?php $data = $class->searchdata(); 
//echo "<pre>"
//var_dump();
//echo "</pre>"
//-------------
//se a contagem de dados for >0.
if(count($data) >0){
  //for cria uma linha 0 para os valores e posteriormente retorna ao valor 1 e assim por diante.
  // se $i =0, a partir de $i contamos $data, assim por diante.
  for($i=0; $i < count($data); $i++){
    echo"<tbody>
    <tr>";
    //$data é um array, de chave e valores.
    foreach ($data[$i] as $key => $value){
      //excluindo o id da amostra.
      
      //diferente de 'introduce', diferente de confirm
      if($key != "id"){
        echo"<td>".$value."</td>";
      }

      else{ //se não tem cadastros
        echo"Ainda não há registros de cadastro.";
      }
    }
    ?>
    <!-- BOTÕES -->  
    <td><a href="index.php?id_up=<?php echo "$dados[$i]['id'];"?>">Edit</td> 
    <!--criando método get, com '?=id'.-->
    <td><a href="index.php?id=<?php echo "$dados[$i]['id'];"?>">Exclude</td>
    
    <?php
    echo"</tr>
    </tbody>";
  }


}; ?>

  
  <tbody>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td colspan="2"></td>
      <td></td>
    </tr>
  </tbody>
</table>


</section>
</body>

<footer style="display: flex; justify-content:center;">
  <p>Created by Aline.S</p>


</footer>

</html>
