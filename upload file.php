<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript">
function countdown() {

	var sec = 20; // здесь задаем начальное число секунд
        var tekst="Пожалуйста подождите, формируется ссылка для скачивания: ";
        var tekst2=" сек ...";
	var body = document.getElementsByTagName("body")[0];
	var divC = document.createElement('div'); // контейнер (округлой формы)
	var divS = document.createElement('div'); // секунды

	divS.innerHTML =tekst + sec + tekst2;
	divC.appendChild(divS);
	body.appendChild(divC);
var a=setInterval(function() {
	sec--;
	if (sec==0) {
		divS.innerHTML="<a href=#>Ваша ссылка готова. Нажмите, чтобы скачать.</a>" ; // здесь можно прописать ссылку, текст и т.п.
		clearInterval(a);
	}
	else divS.innerHTML = tekst + sec + tekst2;
	},1000);

	divC.align = "center";
        divS.style.marginTop = 400; // отступ сверху
        divS.style.marginLeft = 0; // отступ сверху
	divS.style.fontSize = 25; // размер шрифта
        divS.style.fontColor = blue;
}
</script>
</head>
<body>

<!--GOOGLE ADSENSE REKLAMA-->
<div style="position:absolute; margin:-300px 0 0 150px;">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6044329464812378";
/* нижняя реклама */
google_ad_slot = "5491495983";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<div style="position:absolute; margin:-300px 0 0 550px;">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6044329464812378";
/* нижняя реклама */
google_ad_slot = "5491495983";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<div style="position:absolute; margin:-300px 0 0 950px;">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6044329464812378";
/* нижняя реклама */
google_ad_slot = "5491495983";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<!------------------------------------------>
<!------------------------------------------>

<div>
<script type="text/javascript">
countdown();
</script>
</div>

<!--GOOGLE ADSENSE REKLAMA-->
<div style="margin:-300px 0 0 150px;">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6044329464812378";
/* Большой баннер */
google_ad_slot = "9240091095";
google_ad_width = 970;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<!------------------------------------------>
<!------------------------------------------>
</body> 
</html>