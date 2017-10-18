<?php 
function findUserByEmail($email) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute(array(strtolower($email)));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user;
}

function findUserById($id) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
  $stmt->execute(array($id));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user;
}

function createUser($fullname, $email, $password, $sdt) {
  global $db;
  $stmt = $db->prepare("INSERT INTO users (email, password, fullname, sdt) VALUE (?, ?, ?, ?)");
  $stmt->execute(array($email, $password, $fullname, $sdt));
  return $db->lastInsertId();
}

function updateUser($id, $fullname, $sdt) {
  global $db;
  $stmt = $db->prepare("UPDATE users SET fullname = ?, sdt = ? WHERE id = ? ");
  $stmt->execute(array($fullname, $sdt, $id));
  return true;
}

function changePassword($id, $pw) {
	global $db;
	$stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ? ");
	$stmt->execute(array($pw, $id));
	return true;
}

function countRow($tb){
  global $db;
  $stmt = $db->prepare("SELECT * FROM post");
  $stmt->execute();
  return $stmt->rowCount();
}

function getAllStatus(){
  global $db;
  $stmt = $db->prepare("SELECT * FROM post");
  $stmt->execute();
  return $stmt->fetchAll();
}

function getName($id){
  global $db;
  $stmt = $db->prepare("SELECT fullname FROM users WHERE id = ?");
  $stmt->execute(array($id));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user['fullname'];
}

function postStatus($id, $status){
  global $db;
  $stmt = $db->prepare("INSERT INTO post (id, status) VALUE (?, ?)");
  $stmt->execute(array($id, $status));
  return true;
}