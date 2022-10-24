<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Iniciar Sesión</title>
  <script src="js/jquery.1.9.1.min.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/login.css">
</head>


<body>
  <script type="text/javascript" language="javascript">
  window.history.forward()
  </script>
<div  style="margin-bottom:-3rem"><img style="width:60%;"  src="img/HeaderLogo.png" alt="header"></div>




<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/logos-01.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form class="login-form validate-form" id="frmLogin" action="loginSession.php" method="post">
      <input type="text" id="Usuario" name="Usuario" class="fadeIn second" placeholder="Usuario">
      <input type="text" id="Password" name="Password" class="fadeIn third" placeholder="Contraseña">
      <input type="submit" class="fadeIn fourth" value="Ingresar">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Coordinación de Desarrollo Tecnológico</a>
    </div>

  </div>
</div>

<!--<script src="passData.js"></script>-->
</body>
</html>
