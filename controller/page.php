<?php

get("/", function () {
  view("home");
});
get("/reg", function () {
  view("auth/reg");
});
get("/login", function () {
  view("auth/login");
});
get("/logout", function () {
  session_destroy();
  move("/", "로그아웃 되었습니다");
});
get("/diaryAdd", function() {
  view("diary/form");
});
get("/calendar", function() {
  view("diary/calendar");
});
post("/signUp", function () {
  extract($_POST);
  if (db::fetch("select * from user where id = '$id'")) {
    back("이미 존재하는 아이디입니다");
  } else {
    [$h_psw, $salt] = hashPsw($psw);
    db::exec("insert into user(id, psw, salt, email, name) values ('$id', '$h_psw', '$salt', '$email', '$name')");
    move("/login", "회원가입 성공");
  }
});
post("/signIn", function () {
  extract($_POST);
  $user = db::fetch("select * from user where id = '$id'");
  if ($user) {
    $h_psw = hash("sha256", $psw . $user->salt);
    if ($h_psw == $user->psw) {
      $_SESSION["ss"] = $user;
      move("/", "로그인 성공");
    } else {
      back("비밀번호가 일치하지 않습니다");
    }
  } else {
    back("존재하지 않는 아이디입니다");
  }
});
post("/diaryAdd", function () {
  extract($_POST);
  $file = $_FILES["file"];
  $up_path = "./img/diary/" . $file["name"];
  $path = "/img/diary/" . $file["name"];
  $user = ss();
  if (move_uploaded_file($file["tmp_name"], $up_path)) {
    db::exec("insert into diary (text, img, user_idx, emotion) values ('$text', '$path', '$user->idx', '$emotion')");
  } else {
    db::exec("insert into diary (text, user_idx, emotion) values ('$text', '$user->idx', '$emotion')");
  }
  move("/", "일기 작성 성공");
});
get("/diary/{idx}", function($idx)) {
  view("diary/detail");
}