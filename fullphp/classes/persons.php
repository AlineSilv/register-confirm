<?php

namespace Theop\Fullphp;
use Theop\Fullphp\searchdata;
use Theop\Fullphp\Register;
use Theop\Fullphp\ExcludePerson;
use Theop\Fullphp\UpdatePerson;


// Class - Classes de Conexão com construtores, 6 funções.
//Public Function - função construtora,pública.
//__ Construct- primeiro código a ser executado é o código dentro do contrutor.

Class Persons{ //Conexão com o banco de dados, orientada a objetos.
// variável private - do pdo, (no topo da classe), outros não tem acesso a esta variável.
private $pdo;
// campos de parâmetros do construtor, são os campos do db.
public function __construct($dbname, $host, $user, $senha){

try{
    // acessando a variável pdo, com $this e instanciando-a com o db.
    //var_dump("mysql:dbname=".$dbname."host=".$host,$user,$senha);
    //die;
    $this->pdo =new \PDO("mysql:host=".$host.";dbname=".$dbname, $user, $senha);

}
catch(PDOException $e){
echo "Error with DB:".$e->getMessage;
}
catch(Exception $e){
echo "Generic Error:".$e->getMessage;
}
}
//Colhendo informações do banco de dados, para incluir na tela.
public function searchdata(){
//Craindo a variável como array, caso o db esteja vazio, não teremos erro.
$searchId=array();
$searchdata = $this->pdo->query("SELECT * FROM persons ORDER BY id DESC");
//criamos uma váriavel, para conectar o pdo no médoto de array- fetchall, com pârametro - fetch_assoc, nós abriremos o array.
$searchId =$searchdata->fetchAll(\PDO::FETCH_ASSOC);
//vamos printar essa variável
return $searchId;
}

//-------------   FUNÇÃO DE CADASTRO   -----------------------
// Função para colher informações de registro. OBS: Falta "Introduce", "ID", "Confirm".
public function Register($firstname,$lastname,$phone,$gender,$workinperson,$email,$password,$address,$city,$state,$district){
    // primeiro ato é verificar s eo email no campo já é cadastrado.
    $registry=$this->pdo->prepare("SELECT id FROM persons WHERE email=:email");
    $registry->bindValue(":email", $email);
    $registry->execute();

    // Verificando se o dado de email já existe.
    if($registry->rowCount() > 0){

        return false;
    }
    //caso contrário, email não cadastrado, realizamos o insert.
    else{
        // Adendo, observar que no banco de dados, os campos de registro que temos em coluna estão nomeados com letra maiúscula.
        $registry=$this->pdo->prepare("INSERT INTO persons 
        (firstname, lastname, phone, gender, workinperson, email, password, address, city, state, district) VALUES 
        (:firstname, :lastname, :phone, :gender, :workinperson, :email, :password, :address, :city, :state, :district)");

        $registry->bindValue(":firstname",$firstname);
        $registry->bindValue(":lastname",$lastname);
        $registry->bindValue(":phone",$phone);
        $registry->bindValue(":gender",$gender);
        $registry->bindValue(":workinperson",$workinperson);
        $registry->bindValue(":email",$email);
        $registry->bindValue(":password",$password);
        $registry->bindValue(":address",$address);
        $registry->bindValue(":city",$city);
        $registry->bindValue(":state",$state);
        $registry->bindValue(":district",$district);
    var_dump($registry->execute());DIE;
    $registry->execute();

        return true;
    }
}
// EXCLUDE
public function ExcludePerson($id){

    $exclude=$this->pdo->prepare("DELETE FROM person WHERE id= :id");
    $exclude->bindValue(":id",$id);
    $exclude->execute();

}
// UPDATE
public function UpdatePerson($id){
    $update=array();
    $updatePerson=$this->pdo->prepare("UPDATE FROM person WHERE id =:id");
    $updatePerson->bindValue(":id",$id);
    $updatePerson->execute();
    $update=$updatePerson->fetch(PDO::FETCH_ASSOC);
    return $update;

}



}




?>