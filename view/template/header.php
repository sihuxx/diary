<!DOCTYPE html>
<html lang="en">

<?php 
  $user = ss();
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php if(!$user) { ?>
    일기장
    <?php } else if($user->admin) { ?>
    관리자 사이트
    <?php } else { ?>
      <?=$user->name?>의 일기장
    <?php } ?>
  </title>
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <header>
    <div class="header-content">
      <a href="/" class="logo">
        <img src="/img/logo.png" alt="">
      </a>
      <nav class="nav">
        <?php if(!$user) { ?>
        <a href="/reg">회원가입</a>
        <a href="/login">로그인</a>
        <?php } else if($user->admin) {?>
        <a href="/emotionAdmin">감정 관리</a>
        <a href="/userAdmin">회원 관리</a>
        <a href="/logout">로그아웃</a>
        <?php } else {?>
        <a href="/logout">로그아웃</a>
        <?php }?>
      </nav>
    </div>
  </header>