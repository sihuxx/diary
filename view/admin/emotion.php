<?php
$emotion = db::fetchAll("select * from emotion");
?>

<main class="table-box">
  <h3>감정 관리</h3>
  <table>
    <thead>
      <th>이름</th>
      <th>색상</th>
      <th>생성일</th>
      <th>관리</th>
    </thead>
    <tbody>
      <tr>
        <?php foreach ($emotion as $emo) { ?>
        <tr>
          <td><?= $emo->title ?></td>
          <td>
            <div>
              #<?= $emo->color ?><span style="background-color:#<?= $emo->color ?>"></span>
            </div>
          </td>
          <td><?= $emo->create_at ?></td>
          <td>
            <form action="/emoEdit" method="post">
              <input type="hidden" name="idx" value="<?=$emo->idx?>">
              <button>수정</button>
            </form>
          </td>
        </tr>
      <?php } ?>
      </tr>
    </tbody>
  </table>
</main>