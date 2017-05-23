<?php
include_once("utility.php");

$db = connectDatabase();

if (isset($_POST["create_user"])) {
  createUser();
  header("Location: index.php");

} elseif (isset($_POST["update_user"])) {
  updateUser();
  header("Location: index.php");

} elseif (isset($_POST["delete_users"])) {
  deleteUsers();
  header("Location: index.php");
}

function createUser() {
  global $db;
  // debugX($_POST);
  $req = $db->prepare("INSERT INTO utilisateurs (nom, prenom, email) VALUE (:nom, :prenom, :email)");
  $req->bindParam(":nom", $_POST["nom"]);
  $req->bindParam(":prenom", $_POST["prenom"]);
  $req->bindParam(":email", $_POST["email"]);

  $res = $req->execute();
  return $res;
}

function readUser($id) {
  global $db;
  $req = $db->prepare("SELECT * FROM utilisateurs WHERE id = :id");
  $req->bindParam(":id", $id);
  $req->execute();
  $res = $req->fetch(PDO::FETCH_OBJ);
  return $res;
}

function readUsers() {
  global $db;
  $req = $db->prepare("SELECT * FROM utilisateurs");
  $req->execute();
  $res = $req->fetchAll(PDO::FETCH_OBJ);
  return $res;
}

function updateUser() {
  global $db;
  $req = $db->prepare("UPDATE `utilisateurs` SET `nom` = :nom, `prenom` = :prenom, `email` = :email WHERE id = :id");
  $req->bindParam(":id", $_SESSION["current_user_id"]);
  $req->bindParam(":nom", $_POST["nom"]);
  $req->bindParam(":prenom", $_POST["prenom"]);
  $req->bindParam(":email", $_POST["email"]);

  $res = $req->execute();
  // debugX($res);
  unset($_SESSION["current_user_id"]);
  return $res;
}

function deleteUsers() {
  global $db;
  // debugX($_POST);
  if (isset($_POST["users_id"])) {
    foreach ($_POST["users_id"] as $key => $id) {
      $req = $db->prepare("DELETE FROM `utilisateurs` WHERE id = :id");
      $req->bindParam(":id", $id);
      $req->execute();
    }
  }
}

// ----- pages ------

if (isset($_POST["create_page"])) {
  createPage();
  header("Location: page.php");

} elseif (isset($_POST["update_page"])) {
  updatePage();
  header("Location: page.php");

} elseif (isset($_POST["delete_page"])) {
  deletePage();
  header("Location: page.php");
}


function createPage() {
  global $db;
  // debugX($_POST);
  $req = $db->prepare("INSERT INTO pages (id, id_parent, title, content, url, position) VALUE (:id, :id_parent, :title, :content, :url, :position)");
  $req->bindParam(":id", $_POST["id"]);
  $req->bindParam(":id_parent", $_POST["id_parent"]);
  $req->bindParam(":title", $_POST["title"]);
  $req->bindParam(":content", $_POST["content"]);
  $req->bindParam(":url", $_POST["url"]);
  $req->bindParam(":position", $_POST["position"]);
  $res = $req->execute();
  return $res;
}

function readPage($id) {
  global $db;
  $req = $db->prepare("SELECT * FROM pages WHERE id = :id");
  $req->bindParam(":id", $id);
  $req->execute();
  $res = $req->fetch(PDO::FETCH_OBJ);
  return $res;
}

function readPages() {
  global $db;
  $req = $db->prepare("SELECT * FROM pages");
  $req->execute();
  $res = $req->fetchAll(PDO::FETCH_OBJ);
  return $res;
}

function updatePage() {
  global $db;
  $req = $db->prepare("UPDATE `pages` SET `id` = :id, `id_parent` = :id_parent, `title` = :title, 'content' = :content, 'url' = :url, 'position' = :position WHERE id = :id");
  $req->bindParam(":id", $_SESSION["current_page_id"]);
  $req->bindParam(":id", $_POST["id"]);
  $req->bindParam(":id_parent", $_POST["id_parent"]);
  $req->bindParam(":title", $_POST["title"]);
  $req->bindParam(":content", $_POST["content"]);
  $req->bindParam(":url", $_POST["url"]);
  $req->bindParam(":position", $_POST["position"]);

  $res = $req->execute();
  // debugX($res);
  unset($_SESSION["current_page_id"]);
  return $res;
}

function deletePage() {
  global $db;
  // debugX($_POST);
  if (isset($_POST["pages_id"])) {
    foreach ($_POST["pages_id"] as $key => $id) {
      $req = $db->prepare("DELETE FROM `pages` WHERE id = :id");
      $req->bindParam(":id", $id);
      $req->execute();
    }
  }
}
