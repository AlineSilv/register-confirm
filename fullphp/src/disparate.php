<script>

document.getElementById("submit").onclick = disparate;

//- Using an anonymous function:
document.getElementById("submit").onclick = function () { 
    
    



};

    const data = new URLSearchParams();
      for (const pair of new FormData(formjq)) {
       data.append('email', 'alinealv.silv@gmail.com');
       data.append();
       data.append();
       data.append();
       data.append();
       data.append();
       data.append();
       data.append();
       data.append();
       data.append();

      }

    fetch('/classes/index.php', {
    method: 'post',
    body: data,

  })


.then(response => {
console.log(response)

});
      
       ////////////


const data = new URLSearchParams(new FormData(formjq)) 

fetch("developer\fullphp\index.php", {
  method: "post",
  headers: {
    'Accept': 'fullphp/classes/registerform/',
    'Content-Type': 'registerform/register.json'    //json
  },

  //make sure to serialize your JSON body
  body: JSON.stringify({                //json
    name: myName,
    password: myPassword
  })

})

.then( (response) => { 
   
});




</script>



<?php
    

        function disparate(){
       
            $email->add(
                subject:"You have an important mail", 
                body:"<h1> Your register was alredy maded!</h1> <p> Congratulations <3 .</p>", 
                recipient_name:"Aline",
                recipient_email:"alinealv.silv@gmail.com",
                
                
                )->send();
                if(!$email->error()){
                 // header('Location: '.index.php);//login.php
                  return true;
                
                }
                else{
                  $email->error()->getMessage();
                }
           
        }
       
       





?>


<script>

</script>

       
       
