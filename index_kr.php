<?php include('includes/init.php');
$current_page = "Home";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all"/>

  <title>Home</title>
</head>

<body>
  <div id="index_background">
    <?php include('includes/header.php'); ?>
  </div>
  <div class="body_width" >
    <h1 id="shimtah_header"> SHIMTAH </h1>

    <div class="index_dropdown">
      <button>언어 선택</button>
      <div class="index_dropdownstuff">
        <a href= index.php>ENGLISH</a>
        <a href= index_kr.php>한국어</a>
      </div>
    </div>

    <br/>
    <img class="img_index" alt="image" src="images/cornell_samul.jpg">
    <p class="body_index"> 심타는 코넬 대학교의 유일한 한국 사물놀이 동아리입니다.
      1999년에 설립된 이래로 심타는 30명 가량의 다양한 배경을 가진 멤버들과 함께 이타카와 업스테이트 뉴욕사회의 한국문화 전파를 위해 열심히 활동 해오고 있습니다.<br/>
      심타의 공연은 크게 두 가지, 사물놀이와 풍물놀이라는 장르의 한국 전통 타악기 퍼포먼스로 나뉘어집니다. 풍물놀이 혹은 풍물은 한국의 주된 산업이었던 농업에 그 뿌리가 있습니다. 옛 한국 선조들은 추수 시절이 되면 악기를 치며 내년에도 올해와 같은 풍년이 되기를 기원하는 마음으로 다같이 풍물을 연주하며 마을을 돌아다녔습니다. 풍물은 축제와 같이 신나고 여러가지의 선율과, 춤, 그리고 의식과 함께 공연이 됩니다. 각 지역마다 다른 버전의 풍물이 전해져 내려오기도 합니다. 심타 풍물은 한국의 남서쪽에 위치한 임실이라는 지역의 풍물을 바탕으로 하고 있습니다.
      <br/>풍물 공연에 이용되는 악기로는 북, 장구, 징, 꽹과리가 있고, 각각의 악기는 구름, 비, 바람, 그리고 천둥소리를 상징하고 다함께 연주되며 풍물의 농사풍경을 표현합니다. 더 나아가, 북과 장구는 가죽으로 만들어진 악기로서 음을 상징하고, 금속악기인 징과 쇠는 양을 의미합니다. 이는 풍물이 동아시아 우주론과 같은 철학을 담아내었다고 할 수 있습니다. 이 네 가지 악기 이외에도 작은 타악기인 소고나 플루트와 비슷한 태평소와 같은 악기들도 연주 되고는 합니다.</p>

      <h2 class="head_index"> 공연 스케줄 </h2>
      <p class="body_index"> KLP Karaoke night <br/> 5월 8일 골드윈 스미스 홀 </p>
      <h2 class="head_index"> 신입생 모집계획 </h2>
      <p class="body_index"> 상시 모집중이오니 관심 있으신 분들은 Contact 페이지를 통해 이보드 멤버에게 연락주세요! </p>
    </div>
    <?php include('includes/footer.php'); ?>
  </body>
  </html>
