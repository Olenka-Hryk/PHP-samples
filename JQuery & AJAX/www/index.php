<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title> Косметика/Відгуки </title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="jquery-1.5.1.min.js"></script>

  <script type="text/javascript">
  //************************************************************************************* оцінювання продукту
    function getXmlHttp(){
       var xmlhttp;
                  try {
                     xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                       } 
                  catch (e) {
                    try {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        } 
                    catch (E) {
                        xmlhttp = false;
                        }
                  }
             if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
                  xmlhttp = new XMLHttpRequest();
                  }
             return xmlhttp;
    }

   function vote() {
        var req = getXmlHttp() // (1) створюємо обєкт для запиту на сервер
                               // (2) span біля кнопки в ній буде відображатися хід подій
        var statusElem = document.getElementById('vote_status') 
    req.onreadystatechange = function() {  // onreadystatechange активується за допомогою відповіді сервера
      if (req.readyState == 4) {  // якщо запит закінчився виконуватися
       statusElem.innerHTML = req.statusText; // Показати статус(Not Found, ОК..)
      if(req.status == 200) {  // якщо статус 200 (ОК) - видають відповідь користувачу
          alert("Відповідь сервера: "+req.responseText);
         }
      }
    } 
   req.open('GET', '/content.php', true);  // (3) задаємо адресу підключення
                     // обєкт запиту підготовлено: вказано адресу та створену функцію onreadystatechange
                     // для обработки ответа сервера    
   req.send(null);  // (4) відправити запит    
   statusElem.innerHTML = 'Очікується відповідь сервера...' // (5)
 }
  //****************************************************************************************************************
  //  $(document).ready(function(){
  //   $("#otsinka").bind("click", function(){
  //       $.ajax({
  //         url: "content.php",//то куди будемо відправляти данні
  //         type: "GET",// то яким чином будемо відправляти данні (2 види POST i GET - методи відправки)
  //         //data: ({name:"Admin"}),// данні що відправляємо
  //         dataType: "text",// оприділяємо що ми передаєми чи текст чи html
  //         //beforeSend: funcBefore, //буде виконуватися функція поки загрузка
  //         //success: funcSuccess
  //       });
  //   });
  // });
  //****************************************************************************************************************

  //****************************************************************************************** читання XML
  function loadDoc(url) {
        var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
              document.getElementById('A1').innerHTML = xhttp.status;
              document.getElementById('A2').innerHTML = xhttp.statusText;
              document.getElementById('A3').innerHTML = xhttp.responseText;
           }
      };
     xhttp.open("GET", url, true);
     xhttp.send();
  }
  //****************************************************************************************************************
   </script>
</head>

<body background="tlo.jpg" > 

  <header>
   <font size="5" face="SEGOE PRINT">
   	  <h1 style="color: MediumVioletRed;" align="center"> ✿ Відгуки </h1></font>
   <font size="5" face="SEGOE PRINT"style="color: Black;" align="center">
      <h2> Палетка тіней від Urban Dekay "Naked 3"</h2></font>
  </header>

  <section>
     <img id="image" src="Naked3.jpg" align="center" width="1000" height="500" vspace="0" hspace="160" >
  </section>

    <input id="otsinka" style="cursor:pointer" align="center" type="button" class="button" value="Оцінити продукт" vspace="20" hspace="600" onclick="vote()">
    <div id="vote_status" style="color: DimGray; font-size:15pt;  font-weight:800; background-color: rgba(255, 228, 245,0.8); margin: 0px 350px 5px 350px;" align="center" vspace="20" hspace="600"> Відповідь сервера </div>

 <div style="color: DarkSlateGray; font-size:15pt;  font-weight:800; background-color: rgba(211, 211, 211,0.8); margin: 0px 350px 5px 350px;" align="left">   
  <font size="3" face="SEGOE PRINT"style="color: DimGray;" align="center">

   <h2>Отримання даних з файлу XML:</h2></font>
   <p><b>Status:</b> <span id="A1"></span></p>
   <p><b>Status text:</b> <span id="A2"></span></p>
   <p><b>Text:</b> <span id="A3"></span></p>  
   <input style="cursor:pointer" align="center" type="button" class="button" value="Отримати данні" vspace="20" hspace="250" onclick="loadDoc('data.xml')">
 </div>

</body>
</html>