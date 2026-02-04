<main class="form-box">
  <form action="/signUp" method="post">
    <h3>회원가입</h3>
    <div>
      <label for="id">아이디</label>
      <input type="text" name="id" id="id" placeholder="아이디를 입력해주세요">
    </div>
    <div>
      <label for="psw">비밀번호</label>
      <input type="password" name="psw" id="psw" placeholder="비밀번호를 입력해주세요">
    </div>
    <div>
      <label for="name">이름</label>
      <input type="text" name="name" id="name" placeholder="이름을 입력해주세요">
    </div>
    <div>
      <label for="email">이메일</label>
      <input type="email" name="email" id="email" placeholder="이메일을 입력해주세요">
    </div>
    <div>
      <p>이미 계정이 있으신가요?</p>
      <a href="/login" class="btn">로그인</a>
    </div>
    <button>회원가입</button>
  </form>
</main>