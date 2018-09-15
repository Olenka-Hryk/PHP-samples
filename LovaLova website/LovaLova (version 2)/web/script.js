// використовую знання JavaScript
             // зміна картинки- початкової акції
 function changeImageActsia()
      {
        var image = document.getElementById("image");
        if (image.src.match ("pic1"))
        {
          image.src = "pic2.png";
        }
        else if (image.src.match ("pic2"))
        {
          image.src = "pic3.png";
        }
        else
        {
          image.src = "pic1.png";
        }
      }
    
    // коли натискаєм на картинку, збільшується її розмір
    var bigsizeh = "400"; //Розмір великої картинки
    var smallsizeh = "250"; //Розмір маленької картинки
    var bigsizew = "400";
    var smallsizew = "300";

  function changeSizeImage(im) 
    {
      if(im.height == bigsizeh) 
      {
        im.height = smallsizeh;
        im.width = smallsizew;
      }
     else 
      {
        im.height = bigsizeh;
        im.width = bigsizew;
      }
  }

  // робимо анімаційний надпис
  function animateText(id, text, i) 
  {
    document.getElementById(id).innerHTML = text.substring(0, i);
    i++;
    if (i > text.length) i = 0;
    setTimeout("animateText('" + id + "','" + text + "'," + i + ")", 100);
  }
//................................................................................................
jQuery(document).ready(function(){
    jQuery("h2").css("color", "DarkSlateGray");
});

// випадаюче меню входу 
  $(document).ready(function() {
      $('#open').click(function()
        {
           $('#login form').slideToggle(500);  
        });   
    });

 // випадаюче меню пошуку
$(document).ready(function(){
  $('a').on('click', function(e){
    e.preventDefault();
  });
    
  $('#ddmenu li').hover(function () {
     clearTimeout($.data(this,'timer'));
     $('ul',this).stop(true,true).slideDown(200);
  }, function () {
    $.data(this,'timer', setTimeout($.proxy(function() {
      $('ul',this).stop(true,true).slideUp(200);
    }, this), 100));
  });
});
//............ефект лупи
$(document).ready(function(){
  //  $('#img_01').imageLens(); // Ініціалізація плагіну
    $('#img01').imageLens({ lensSize: 200 }); // встановлюємо розмір лупи
    //$('#img01').imageLens({ borderSize: 8, borderColor: '#f00' }); // Рамка зображення і колір
});

//..........галерея фото
$(document).ready(function(){ 
     $("li2").on("click", function(){
     var item = $(this),
        pos = "-"+(item.index() * 515)+"px";
        item.addClass("active");
        item.siblings().removeClass("active");
     $("ul2").css("left", pos);
   });
});

//..................відображення новинок
$(document).ready(init);
function init(){
    $('#comments_block').hide();
}
function hideDiv(){
    $('#comments_block').hide();
}
function showDiv(){
    $('#comments_block').show();
}
