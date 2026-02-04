<main class="form-box">
  <form action="/signIn" method="post">
    <h3>로그인</h3>
    <div>
      <label for="id">아이디</label>
      <input type="text" name="id" id="id"placeholder="아이디를 입력해주세요" required>
    </div>
    <div>
      <label for="psw">비밀번호</label>
      <input type="password" name="psw" id="psw"placeholder="비밀번호를 입력해주세요" required>
    </div>
    <div>
      <p>계정이 없으신가요?</p>
      <a href="/reg">회원가입</a>
    </div>
    <button class="btn">로그인</button>
  </form>
</main>