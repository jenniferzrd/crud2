<?php include("inc/header.php");

$pages = createPage();
debug($pages);
?>

<!-- <div class="page" id="composant_page">
<h1 class="title">Page</h1>
<div class="tools">
<input type="text" id="li_name" name="" value="">
</div>

<ul id="my_list" class="lister"></ul>
</div> -->
<button type="button" name="update_page">Editer</button>
<button type="button" name="delete_page">Supprimer</button>

<?php include ("inc/footer.php");



// pages.php listes les pages insérées en base.
// Des boutons permettent de supprimer ou éditer les pages
