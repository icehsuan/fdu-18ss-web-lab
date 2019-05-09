function setOpacity(elem, level) {  //设置透明度
  elem.setAttribute("style","opacity:"+level/100)
  }
function fadeIn(elem){
      setOpacity(elem,0);
      for(var i = 1;i<=20;i++){
        (function(i){
          var level = i * 4; //透明度每次变化值
          setTimeout(function(){
          setOpacity(elem, level)
        },i*50);
         })(i);
      }
    }

    function fadeOut(elem){
          setOpacity(elem,80);
          for(var i = 19;i>=0;--i){
            (function(i){
              var level = i * 4; //透明度每次变化值
              setTimeout(function(){
              setOpacity(elem, level)
            },(20-i)*50);
          })(i);
          }
        }


window.onload = function change(){
  var oImg = document.getElementById('featured').getElementsByTagName('img')[0];

  var figcaption = document.getElementById('featured').getElementsByTagName('figcaption')[0];
  var oChange = document.getElementById('thumbnails').getElementsByTagName('img');

  var picture = ['images/medium/5855774224.jpg','images/medium/5856697109.jpg','images/medium/6119130918.jpg','images/medium/8711645510.jpg','images/medium/9504449928.jpg'];

  var title = ['Battle','Luneburg','Bermuda','Athens','Florence'];

  oImg.setAttribute("onmouseover","fadeIn(document.getElementById('featured').getElementsByTagName('figcaption')[0])");
  oImg.setAttribute("onmouseout","fadeOut(document.getElementById('featured').getElementsByTagName('figcaption')[0])");

  for(var i=0;i<oChange.length;i++){
    oChange[i].setAttribute('onclick', 'document.getElementById("featured").getElementsByTagName("img")[0].setAttribute("src","'+ picture[i] + '");document.getElementById("featured").getElementsByTagName("img")[0].setAttribute("title","'+title[i]+'");document.getElementById("featured").getElementsByTagName("figcaption")[0].innerHTML = document.getElementById("thumbnails").getElementsByTagName("img")['+i+'].title;');

  }


}
