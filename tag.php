<!DOCTYPE html>
<html>
<head>
  <title>タグ作成ツール</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-6">
  <div class="max-w-3xl mx-auto">
    <p class="font-bold text-lg mb-2">HTMLタグ</p>

<?php
/*店舗URLを入力する▼*/
$shopId = 'brandacross';

mb_regex_encoding('UTF-8');

$link = strtolower($_POST['url']);
$link = explode( "\n", $link );

$itemname = explode( "\n", $_POST['name'] );

$cnt = count( $link ) -1 ;
?>

    <textarea rows="35" cols="100" class="w-full border border-black p-2">
<?php for ($i = 0; $i <= $cnt; $i++) :?>
<?php $link[$i] = str_replace(array("\r\n","\r","\n"), '', $link[$i]); ?>
<?php

  $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?applicationId=1006586760768214421&shopCode='.$shopId.'&keyword=' . $link[$i] .'+'. urlencode($itemname[$i]);
  $html_source = file_get_contents($url);

  /*商品URL　<?php echo $match1[1]?>　*/
  $pattern1 = '/itemUrl":"(.*?)"/';
  preg_match($pattern1, $html_source, $match1);

  /*商品名　<?php echo $name?>　*/
  $pattern2 = '/itemName":"(.*?)",/';
  preg_match($pattern2, $html_source, $match2);
  $name = mb_strimwidth( $match2[1] , 0, 65, "...", "UTF-8" );

  /*画像URL　<?php echo $match3[1]?>　*/
  $pattern3 = '/imageUrl":"(.*?)?_ex/';
  preg_match($pattern3, $html_source, $match3);

  /*販売価格　<?php echo $price?>　*/
  $pattern4 = '/itemPrice":(.*?),/';
  preg_match($pattern4, $html_source, $match4);
  $price = number_format($match4[1]);

  /*商品コード（お気に入り登録用）　<?php echo $price?>　*/
  $pattern5 = '/itemCode":"';
  $pattern5 .= $shopId;
  $pattern5 .= ':(.*?)",/';
  preg_match($pattern5, $html_source, $match5);


  sleep(1);
?>
    <table cellpadding="0" cellspacing="0" class="box">
      <tr id="rank2">
        <td class="productImg">
          <a href="<?php echo $match1[1];?>" target="_top">
          <img src="<?php echo $match3[1];?>_ex=190x190" class="rankImg">
          </a>
        </td>
        <td>
          <div class="name">
            <a href="<?php echo $match1[1];?>" target="_top"><?php echo $itemname[$i]; ?></a>
          </div>
          <div class="price"><?php echo $price;?>円</div>
        </td>
      </tr>
    </table>

<?php endfor; ?>
    </textarea>
  </div>
</body>
</html>
