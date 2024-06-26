<?php
$form = [
    'name' => '',
    'email' => ''
];
$error = [];

/* htmlspecialcharsを短くする */
function h($value) {
    return htmlspecialchars($value, ENT_QUOTES);
}

/*フォームの内容をチェック*/
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $form['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
      if($form['name'] === '') {
        $error['name'] = 'blank';
      }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員登録</title>

    <link rel="stylesheet" href="../style.css"/>
</head>

<body>
<div id="wrap">
    <div id="head">
        <h1>会員登録</h1>
    </div>

    <div id="content">
        <p>次のフォームに必要事項をご記入ください。</p>
        <form action="" method="post" enctype="multipart/form-data">
            <dl>
                <dt>ニックネーム<span class="required">必須</span></dt>
                <dd>
                    <input type="text" name="name" size="35" maxlength="255" value="<?php echo h($form['name']); ?>"/>
                     <?php if(isset($error['name']) && $error['name'] === 'blank'): ?> <!--issetで値が入っているか確認するか、初期化する必要があり -->
                        <p class="error">* ニックネームを入力してください</p>
                    <?php endif; ?>
                </dd>
                <dt>メールアドレス<span class="required">必須</span></dt>
                <dd>
                    <input type="text" name="email" size="35" maxlength="255" value=""/>
                    <?php  if() ?>
                    <p class="error">* メールアドレスを入力してください</p>
                    <p class="error">* 指定されたメールアドレスはすでに登録されています</p>
                <dt>パスワード<span class="required">必須</span></dt>
                <dd>
                    <input type="password" name="password" size="10" maxlength="20" value=""/>
                    <p class="error">* パスワードを入力してください</p>
                    <p class="error">* パスワードは4文字以上で入力してください</p>
                </dd>
                <dt>写真など</dt>
                <dd>
                    <input type="file" name="image" size="35" value=""/>
                    <p class="error">* 写真などは「.png」または「.jpg」の画像を指定してください</p>
                    <p class="error">* 恐れ入りますが、画像を改めて指定してください</p>
                </dd>
            </dl>
            <div><input type="submit" value="入力内容を確認する"/></div>
        </form>
    </div>
</body>

</html>