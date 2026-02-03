<?php

function move($page, $msg = false)
{
  if ($msg) {
    echo "<script>alert('$msg')</script>";
  }
  echo "<script>location.href = '$page'</script>";
}
function back($msg = false)
{
  if ($msg) {
    echo "<script>alert('$msg')</script>";
  }
  echo "<script>history.back()</script>";
}
function alert($msg)
{
  echo "<script>alert('$msg')</script>";

}
function view($page)
{
  require_once '../view/template/header.php';
  require_once "../view/$page.php";
  require_once '../view/template/footer.php';
}
function hashPsw($psw) {
  $salt = bin2hex(random_bytes(32));
  $h_psw = hash("sha256", $psw . $salt);
  return [$h_psw, $salt];
}
function ss() {
  return $_SESSION["ss"] ?? false;
}