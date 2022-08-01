<?php

   if(isset($_GET["intvalue"])) {

      echo "Value =  ". $_GET['intvalue']. "<br />";


      exit();

   }

?>

<html>

   <body>

      <form action = "<?php $_PHP_SELF ?>" method = "GET" id="task3">
        <div class="alert">The value has been saved</div>

         Value: <input type = "text" name = "intvalue" id="intvalue" />


         <input type = "submit" />

      </form>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script>
          <script >
          const firebaseConfig = {
            apiKey: "AIzaSyD4QHLnZtXYZTgq4PR2zshddCpMxSqb5aE",
            authDomain: "task3-12a1a.firebaseapp.com",
            databaseURL: "https://task3-12a1a-default-rtdb.firebaseio.com",
            projectId: "task3-12a1a",
            storageBucket: "task3-12a1a.appspot.com",
            messagingSenderId: "399264187966",
            appId: "1:399264187966:web:90619a15ce6a4da0fe736f",
            measurementId: "G-P89MN910RF"
          };

          // initialize firebase
          firebase.initializeApp(firebaseConfig);
          // reference your database
          var vFormDB = firebase.database().ref("task3");

          document.getElementById("task3").addEventListener("submit", submitForm);

          function submitForm(e) {
            e.preventDefault();

            var intvalue = getElementVal("intvalue");

            saveMessages(intvalue);

            //   enable alert
            document.querySelector(".alert").style.display = "block";

           //   remove the alert
          setTimeout(() => {
          document.querySelector(".alert").style.display = "none";}, 3000);



          }
          const saveMessages = (intvalue) => {
            var newvForm = vFormDB.push();

            newvForm.set({
              intvalue: intvalue,

            });
          };


          const getElementVal = (id) => {
            return document.getElementById(id).value;
          };

          // on() method to retrieve data
          var ref = firebase.database().ref('task3');

         ref.on("value", function(snapshot) {
          console.log(snapshot.val());
          }, function (error) {
         console.log("Error: " + error.code);
          });

          </script>
   </body>
<style>
.alert{
    width: 100%;
    background: rgb(0, 255, 106);
    padding: 10px 20px;
    border-radius: 5px;
    text-align: center;
    font-size: 18px;
    font-weight: 900;
    display: none;
}
</style>
</html>
