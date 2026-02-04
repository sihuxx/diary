<?php
$user = db::fetchAll("select * from user");
?>

<main class="table-box">
  <h3>유저 관리</h3>
<table>
  <thead>
    <th>아이디</th>
    <th>비밀번호</th>
    <th>이름</th>
    <th>이메일</th>
    <th>가입일</th>
    <th>관리</th>
  </thead>
  <tbody>
    <?php foreach($user as $u) { ?>
      <tr>
        <td><?=$u->id?></td>
        <td><?=$u->psw?></td>
        <td><?=$u->name?></td>
        <td><?=$u->email?></td>
        <td><?=$u->date?></td>
        <td>
          <form action="/userDelete" method="post">
            <input type="hidden" name="idx" value="<?=$u->idx?>">
            <button class="btn" style="background-color:red;">탈퇴</button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</main>