<?php
  include("db.php");
  if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email2 = $_POST['email2'];
    $email = $_POST['email'];
    $isittaken=("SELECT * FROM users WHERE email=$email");
    $reg_query=("INSERT INTO users (firstname, lastname, email, password)
                  VALUES('$firstname','$lastname','$email','$password')");
        if (mysqli_query($conn, $reg_query)) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $reg_query . "<br>" . mysqli_error($conn);
      }

  }

  if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $res=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    $row=mysqli_fetch_array($res);
    if($row['password']==$password)
    {
      session_start();
     $_SESSION['user'] = true;
     $_SESSION['userid']=$row['id'];
    ?> 
           <script type="text/javascript">
                     window.location = "userpage.php?id=<?php echo $_SESSION['userid'];?>";
                </script>
                <?php
    }
    else
    {
     ?>
           <script>alert('wrong details');</script>
           <script type="text/javascript">
                     window.location = "index.php"
                </script>
           <?php
    }
  }


?>
