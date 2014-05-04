<!doctype html>
<html>
  <head>
    <title>Talk Hipster to me BBY</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <style>
      html, body {
        height: 100%;
        padding: 0;
        margin: 0;
        font-family: 'Lobster', cursive;
      }
    
      body {
        background: url(sativa.png);
        text-align: center;
      }
      
      img {
        margin-top: 10px;
        border-radius: 100px;
      }
      
      #talk-pls {
        padding: 24px;
        background-color: #076451;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
        width: 202px;
        margin: 20px auto;
      }
      
      #talk-pls.loading {
        background-color: #044236;
        color: #ddd;
      }
      
      .ughnnn {
        color: #999;
        position: fixed;
        bottom: 10px;
        left: 50%;
        margin-left: -240px;
        width: 480px;
      }
    </style>
  </head>
  <body>
    <h1>TALK HIPSTER TO ME (BETA)</h1>
    <h3>Site works on Chrome ONLY obviously</h3>
    <div id="hipler"><img src="literally-hipler.png"></div>
    <div id="hipler2" style="display: none;"><img src="literally-hipler-two.png"></div>
    <div id="talk-pls">Ugghhn talk hipster to me</div>
    <div class="ughnnn">Powered by the unholy marriage of <a href="http://TTS-API.COM" target="blank">TTS-API.COM</a> and <a href="http://hipsterjesus.com/" target="blank">hipsterjesus.com</a></div>
    <audio id="audio-container">
      <source src="" type="audio/mp3">
    </audio>
    <script type="text/javascript">
      var mouthToggle = true;
      var rapidlyMouth = function() {
        mouthToggle = !mouthToggle;
        if(mouthToggle) {
          $('#hipler').show();
          $('#hipler2').hide();
        } else {
          $('#hipler2').show();
          $('#hipler').hide();
        }
      };
      
      var playing = false;
      $('#talk-pls').click(function(){
        if(playing == true) {
          return;
        } else {
          playing = true;
        }
      
        $(this).addClass('loading').html('Loading...');
        $.getJSON('http://hipsterjesus.com/api/?paras=1&html=false&type=hipster-centric', function(data) {
          var audio = ($('#audio-container')[0]);
          $('#audio-container source').attr('src', 'http://tts-api.com/tts.mp3?q=' + encodeURIComponent(data.text));
          audio.load();
          audio.play();
          $('#talk-pls').html('talking...');
          var talkIntvAnim = setInterval(rapidlyMouth, 700);
          $(audio).bind("ended", function(){ 
            $('#talk-pls').html('Ugghhn talk hipster to me again...').removeClass('loading');
            playing = false;
            clearInterval(talkIntvAnim);
          });
        });
      });
    </script>
  </body>
</html>