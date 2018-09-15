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
      }''
  }

  // робимо анімаційний надпис
  function animateText(id, text, i) 
  {
    document.getElementById(id).innerHTML = text.substring(0, i);
    i++;
    if (i > text.length) i = 0;
    setTimeout("animateText('" + id + "','" + text + "'," + i + ")", 100);
  }



