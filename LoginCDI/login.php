<?php 

// CHECK LA SESSION EN FONCTION DE l'ID UNIQUE DANS LA BDD. Si c'est good, on renvoie sur l'index
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: registrecdi/index.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Application Tchat InterProjet </header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Adresse email</label>
          <input type="text" name="email" placeholder="Entrez votre email" required>
        </div>
        <div class="field input">
          <label>MotDePasse</label>
          <input type="password" name="password" placeholder="Entrez votre MDP" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continuez vers l'application Web ">
        </div>
      </form>
      <div class="link">Vous n'avez pas de compte? Referez-vous à Aymerick</div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
