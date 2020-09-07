<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <title>CSS Template</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

  <body>

    <div id="capture" style="padding: 10px; background: #f5da55">
      <h4 style="color: #000; ">Hello world!</h4>
    </div>





    <button onclick="myCaptureFunction()">캡쳐</button>

    <a id="target" style="display: none"></a>



    <script type="text/javascript">

    function myCaptureFunction() {

      html2canvas(document.querySelector("#capture")).then(canvas => {  //해당 태그의 범위안에것을 다 캡쳐


      var el = document.getElementById("target");

       el.href = canvas.toDataURL("image/jpeg");  //이미지파일을 다운로드 다른포멧도 가능함

       el.download = '파일명.jpg';   //다운로드 파일명 지정

       el.click();

        });
    }

    </script>

  </body>
</html>
