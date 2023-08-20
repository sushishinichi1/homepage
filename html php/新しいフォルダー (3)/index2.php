<?php

//メッセージを保存するファイルのパス設定
define('FILENAME','./message.txt');
//タイムゾーンの設定
data_default_timezone_set('Asia/Tokyo');

//変数の初期化
$current_date=null;
$data=null;
$file_handle=null;
$split_data=null;
$message=array();
$message_array=array();

if( !empty($_POST['btn_submit'])){
    if($file_handle=fopen(FILENAME,"a")){

      //書き込み日時を取得
      $current_date=date("Y-m-d H:i:s");

      //書き込み日時を取得
      $data=
      "'".POST['view_name']."','".$_POST['message']."','".$current_date."'\n";
      //書き込み
      fwrite($file_handle,$data);
      //ファイルを閉じる
      fclose($file_handle);
    }
  }

  if($file_handle=fopen(FILENAME,'r')){
    while($data=fgets($file_handle)){

      $split_data=preg_split('/\'/',$data);

      $message =array(
        'view_name'=>$split_data[1],
        'message'=>$split_data[3],
        'post_date'=>$split_data[5],
      );
      array_unshift($message_array,$message);
    }
    fclose($file_handle);
  }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <style>


/*------------------------------
Reset Style

------------------------------*/
html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, figcaption, figure,
footer, header, hgroup, menu, nav, section, summary,
time, mark, audio, video {
  margin:0;
  padding:0;
  border:0;
  outline:0;
  font-size:100%;
  vertical-align:baseline;
  background:transparent;
}

body {
  line-height:1;
}

article,aside,details,figcaption,figure,
footer,header,hgroup,menu,nav,section {
  display:block;
}

nav ul {
  list-style:none;
}

blockquote, q {
  quotes:none;
}

blockquote:before, blockquote:after,
q:before, q:after {
  content:'';
  content:none;
}

a {
  margin:0;
  padding:0;
  font-size:100%;
  vertical-align:baseline;
  background:transparent;
}

/* change colours to suit your needs */
ins {
  background-color:#ff9;
  color:#000;
  text-decoration:none;
}

/* change colours to suit your needs */
mark {
  background-color:#ff9;
  color:#000;
  font-style:italic;
  font-weight:bold;
}

del {
  text-decoration: line-through;
}

abbr[title], dfn[title] {
  border-bottom:1px dotted;
  cursor:help;
}

table {
  border-collapse:collapse;
  border-spacing:0;
}

hr {
  display:block;
  height:1px;
  border:0;
  border-top:1px solid #cccccc;
  margin:1em 0;
  padding:0;
}

input, select {
  vertical-align:middle;
}

  </style>
  </head>
  <body>
    <h1>一言掲示板</h1>
    <form  method="post">
      <div>
        <label for="view_name">表示名</label>
        <input id="view_name" type="text" name="view_name" value="">
      </div>
      <div>
        <label for="message">一言メッセージ</label>
        <textarea id="message" name="message"></textarea>
      </div>
      <input type="submit" name="btn_submit"value="書き込む">
    </form>
    <hr>
    <section>
    
    </section>
  </body>
</html>
