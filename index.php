<html>
  <head>
    <title>#WIJWEL</title>
    <style>
    @font-face {
      font-family: 'Big-Noodle-Titling-Oblique';
      src: url('big_noodle_titling_oblique.ttf');
    }
    #wrap {
      width: 689px!important;
      height: 487px!important;
      margin: auto!important;
      background: url('img/bg.jpg');
      text-align: center!important;
    }
    #text {
      position: relative!important;
      width: 100%!important;
      height: 100px!important;
      top: 70px!important;
      
    }
    textarea {
      border: none!important;
      background-color: transparent!important;
      font-family: Big-Noodle-Titling-Oblique!important;
      font-size: 65px!important;
      color: #FACA06!important;
      resize: none!important;
      text-align: center!important;
      width: 100%!important;
      overflow: hidden!important;
      outline: none!important;
      -webkit-box-shadow: none!important;
      -moz-box-shadow: none!important;
      box-shadow: none!important;
    }
    input {
      font-size: 40px!important;
      font-family: Big-Noodle-Titling-Oblique!important;
    }
    
    .header { background-color: #003399 !important; }
    </style>
    <link rel='stylesheet' id='mmenu-css'  href='https://geenpeil.nl/wp-content/themes/geenpeil/assets/components/jQuery.mmenu/dist/css/jquery.mmenu.css?ver=4.7.2' type='text/css' media='all' />
    <link rel='stylesheet' id='mmenu.positioning-css'  href='https://geenpeil.nl/wp-content/themes/geenpeil/assets/components/jQuery.mmenu/dist/extensions/positioning/jquery.mmenu.positioning.css?ver=4.7.2' type='text/css' media='all' />
    <link rel='stylesheet' id='slick-carousel-css-css'  href='https://geenpeil.nl/wp-content/themes/geenpeil/assets/components/slick-carousel/slick/slick.css?ver=4.7.2' type='text/css' media='all' />
    <link rel='stylesheet' id='stylesheet-css'  href='https://geenpeil.nl/wp-content/themes/geenpeil/style.css?ver=49' type='text/css' media='' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <?php
    if(count($_GET))
    {
    ?>
    <meta property="og:image" content="https://poster.geenpeil.nl/poster/<?=htmlspecialchars(base64_decode(urldecode(key($_GET))), ENT_QUOTES)?>.jpg" />
    <meta property="og:title" content="Poster" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://poster.geenpeil.nl/?<?=urlencode(htmlspecialchars(key($_GET), ENT_QUOTES))?>" />
    <meta property="og:description" content="<?=htmlspecialchars(str_replace("-", " ", str_replace("--", " ", base64_decode(urldecode(key($_GET))))))?>" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@GeenPeil">
    <meta name="twitter:creator" content="@GeenPeil">
    <meta name="twitter:title" content="Poster">
    <meta name="twitter:description" content="<?=htmlspecialchars(str_replace("-", " ", str_replace("--", " ", base64_decode(urldecode(key($_GET))))))?>">
    <meta name="twitter:image" content="https://poster.geenpeil.nl/poster/<?=htmlspecialchars(base64_decode(urldecode(key($_GET))), ENT_QUOTES)?>.jpg" />
    <?php
    }
    ?>
  </head>
  <body>
    <div class="navigation navigation--mobile">
      <div class="nav-wrap">
        <img class="logo" src="https://geenpeil.nl/wp-content/themes/geenpeil/assets/images/geenpeil.svg" alt="GeenPeil">
      </div>
    </div>
    <main class="container container--page">
      <header class="header header--page">
        <div class="row">
          <a href="https://geenpeil.nl">
            <img src="https://geenpeil.nl/wp-content/themes/geenpeil/assets/images/geenpeil.png" alt="GeenPeil" class="logo">
          </a>                             
        </div>
      </header>
      <section class="container container--content">
        <div class="default-page">
          <div class="row">
            <div class="large-8 columns">
              <div class="post-content" style="text-align: center;">
                <div class="page__content">
                  <div id="wrap">
                    <div id="text">
                      <textarea placeholder="TYPE HIER JE TEKST..." maxlength="48" rows="2" id="slogan" onkeydown="return limitLines(this, event);"><?=(count($_GET) ? htmlspecialchars(str_replace("-", " ", str_replace("--", PHP_EOL, base64_decode(urldecode(key($_GET)))))) : "")?></textarea>
                    </div>
                  </div>
                  <BR />
                  <input type="submit" value="GENEREER JOUW POSTER!" onClick="renderPoster();" />
                </div>
              </div>
            </div>
            <div class="large-4 columns sticky-element">
              <div class="sidebar" id="sbi">
                <div class="sidebar__item sidebar__item--action-block" id="renderDiv" style="text-align:center;">
                  <h3>Je eigen #WIJWEL-poster!</h3>
                  <p><?=(count($_GET) ? "Klik op de tekst om zelf een poster met je eigen tekst te genereren.": "Vul jouw creatieve slogan in en druk op de knop hieronder om je poster te genereren.")?></p>
                  <p><input type="checkbox" disabled checked style="position:relative;top:3px;"><small style="font-size:11px;">GeenPeil mag de door mij gemaakte poster ook gebruiken</small></p>
                  <input type="submit" value="GENEREER JOUW POSTER!" onClick="renderPoster();" />
                  <br /><br />
                  <?php
                  if(count($_GET))
                  {
                    ?>
                  <div style="margin-top: 15px; " class="social">
                    <h3>Deze poster delen? Dat mag.</h4>
                    <div style="text-align: center;">
                      <a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fposter.geenpeil.nl%2F%3F<?=urlencode(htmlspecialchars(key($_GET), ENT_QUOTES))?>" target="_blank" id="soc_fb"><img src="https://mijnstempakket.geenpeil.nl/icon-facebook.png" alt="Deel deze poster op Facebook!" width="64" height="64"></a>
                      <a style="margin-left: 10px;" href="https://twitter.com/intent/tweet/?hashtags=GeenPeil,WijWel&amp;url=https%3A%2F%2Fposter.geenpeil.nl%2F%3F<?=urlencode(htmlspecialchars(key($_GET), ENT_QUOTES))?>&amp;text=Mijn%20poster" target="_blank" id="soc_tw"><img src="https://mijnstempakket.geenpeil.nl/icon-twitter.png" alt="Deel deze poster op Twitter!" width="64" height="64"></a>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <script type="text/javascript">
    var keynum, lines = 1;

    function limitLines(obj, e) {
      if(window.event) {
        keynum = e.keyCode;
      } else if(e.which) {
        keynum = e.which;
      }

      if(keynum == 13) {
        if(lines == obj.rows) {
          return false;
        }else{
          lines++;
        }
      }
    }
    
    function renderPoster(text)
    {
      document.getElementById('renderDiv').innerHTML = "<img src=\"img/ajax-loader.gif\" /><div id=\"base64str\" style=\"display:none;\"></div>";
      $( "#base64str" ).load( "render.php?t="+encodeURI(document.getElementById('slogan').value), function() {
        document.getElementById('renderDiv').innerHTML = "<h3>Klaar! Wil je 'm opslaan?</h3><img src=\"data:image/jpeg;base64,"+document.getElementById('base64str').innerHTML+"\" /><br /><br /><h3>Delen mag ook! Is gratis.</h4><div style=\"text-align: center;\"><a href=\"https://www.facebook.com/sharer.php?u=https%3A%2F%2Fposter.geenpeil.nl%2F%3F"+encodeURI(btoa(document.getElementById('slogan').value.replace("\n", "--").replace(" ", "-")))+"\" target=\"_blank\" id=\"soc_fb\"><img src=\"https://mijnstempakket.geenpeil.nl/icon-facebook.png\" alt=\"Deel deze poster op Facebook!\" width=\"64\" height=\"64\"></a><a style=\"margin-left: 10px;\" href=\"https://twitter.com/intent/tweet/?hashtags=GeenPeil,WijWel&amp;url=https%3A%2F%2Fposter.geenpeil.nl%2F%3F"+encodeURI(btoa(document.getElementById('slogan').value.replace("\n", "--").replace(" ", "-")))+"&amp;text=Mijn%20poster\" target=\"_blank\" id=\"soc_tw\"><img src=\"https://mijnstempakket.geenpeil.nl/icon-twitter.png\" alt=\"Deel deze poster op Twitter!\" width=\"64\" height=\"64\"></a></div></div>";
      });
    }
    </script>
  </body>
</html>
