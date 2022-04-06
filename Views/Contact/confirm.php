<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/base.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
<section>
  <div class="contact_box">
    <h2>お問い合わせ 確認画面</h2>
    <form action="/contact/complete/" method="post">
      <p>下記の内容をご確認の上送信ボタンを押してください</p>
      <p>内容を訂正する場合は戻るを押してください。</p>
      <dl class="confirm">
        <dt>氏名</dt>
          <dd>
            <?php
                echo htmlspecialchars($name, ENT_QUOTES, "UTF-8");
            ?>
          </dd>
        <dt>フリガナ</dt>
          <dd>
              <?php
                echo htmlspecialchars($kana, ENT_QUOTES, "UTF-8");
              ?>
          </dd>
        <dt>電話番号</dt>
        <dd>
          <?php
            echo htmlspecialchars($tel, ENT_QUOTES, "UTF-8");
         ?>
        </dd>
        <dt>メールアドレス</dt>
        <dd>
          <?php
            echo htmlspecialchars($email, ENT_QUOTES, "UTF-8");
          ?>
        </dd>
        <dt>お問い合わせ内容</dt>
        <dd>
          <?php
            // nl2brを使って改行させる
            echo  nl2br(htmlspecialchars($body, ENT_QUOTES, "UTF-8"));
          ?>
        </dd>
        <dd class="confirm_btn">
          <button type="submit">送　信</button>
          <button type="button" onclick=history.back()>戻 る</a>
        </dd>
      </dl>

      <input type="hidden" name="name" value="<?php echo $name ?>">
      <input type="hidden" name="kana" value="<?php echo $kana ?>">
      <input type="hidden" name="tel" value="<?php echo $tel ?>">
      <input type="hidden" name="email" value="<?php echo $email ?>">
      <input type="hidden" name="body" value="<?php echo $body ?>">
    </form>
  </div>

</section>
</body>
</html>


