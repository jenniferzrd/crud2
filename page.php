<?php include("inc/header.php"); ?>

<h1 class="title">CRUD 2 - Créer une liste</h1>



<form action="api.php" method="post">
  <input type="text" class="input" id="title" name="titre" placeholder="saisir un titre" >
  <textarea name="sauvegarde" id="content">Ici mon champ de texte à insérer</textarea>
  <a href="index.php" id="url"><input type="submit" class="input" name="create_page" value="créer !"></a>
</form>

<?php include("inc/footer.php"); ?>
