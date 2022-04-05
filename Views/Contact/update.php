<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/base.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/table.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script defer src="/assets/js/contact.js"></script>
</head>

<body>
<section>
    <div class="contact_box">
        <h2>お問い合わせ 更新</h2>
        <form action="/contact/update/confirm/" method="post">
            <p><span class="required">*</span>は必須項目となります。</p>

            <dl>
                <!-- 氏名 -->
                <dt><label for="name">氏名</label><span class="required">*</span></dt>
                <?php
                    if (isset($errors) && isset($errors["name"])) {
                ?>
                        <dd class="error">
                            <?php echo $errors["name"];?>
                        </dd>
                <?php
                    }
                ?>
                <dd><input type="text" name="name" id="name" placeholder="山田太郎" <?php if(isset($name)) {echo 'value="'.$name.'"';}?>></dd>

                <!-- フリガナ -->
                <dt><label for="kana">フリガナ</label><span class="required">*</span></dt>
                <?php
                    if (isset($errors) && isset($errors["kana"])) {
                ?>
                        <dd class="error">
                            <?php echo $errors["kana"];?>
                        </dd>
                <?php
                    }
                ?>
                <dd><input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" <?php if(isset($kana)) {echo 'value="'.$kana.'"';}?>></dd>

                <!-- 電話番号 -->
                <dt><label for="tel">電話番号</label></dt>
                <?php
                    if (isset($errors) && isset($errors["tel"])) {
                ?>
                        <dd class="error">
                            <?php echo $errors["tel"];?>
                        </dd>
                <?php
                    }
                ?>
                <dd><input type="text" name="tel" id="tel" placeholder="09012345678" <?php if(isset($tel)) {echo 'value="'.$tel.'"';}?>></dd>

                <!-- メールアドレス -->
                <dt><label for="email">メールアドレス</label><span class="required">*</span></dt>
                <?php
                    if (isset($errors) && isset($errors["email"])) {
                ?>
                        <dd class="error">
                            <?php echo $errors["email"];?>
                        </dd>
                <?php
                    }
                ?>
                <dd><input type="text" name="email" id="email" placeholder="test@test.co.jp" <?php if(isset($email)) {echo 'value="'.$email.'"';}?>></dd>
            </dl>

            <!-- お問合せ -->
            <h3><label for="body">お問い合わせ内容をご記入ください<span class="required">*</span></label></h3>
            <dl class="body">
                <?php
                    if (isset($errors) && isset($errors["body"])) {
                ?>
                        <dd class="error">
                            <?php echo $errors["body"];?>
                        </dd>
                <?php
                    }
                ?>
                <dd><textarea name="body" id="body"><?php if(isset($body)) {echo $body;}?></textarea></dd>
                <dd><button id="submit" type="submit">送　信</button></dd>
            </dl>
            <dd class="confirm_btn">
            <input type="hidden" name="id" value="<?php echo $id ?>">
        </form>
    </div>
</section>
</body>
</html>
