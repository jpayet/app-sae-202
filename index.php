  <?php
    require 'lib.php';

 ?>   

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xz/fonts@1/serve/cascadia-code.min.css"> 
        <link rel="stylesheet" href="css/style.css">
        <title>index</title>
    </head>
    <body style="background-image: url('img/background.png'); background-color: #a6a6a5;">

        <main class="index-main">

            <div class="index-robot"> <img src="img/PCv3.png" alt="" class="robot"> </div>


            <div class="index-mission"> 
                <div class="carrousel car">
                  
                    
                        <input checked id="one" name="multiples" type="radio" value="1">
                        <label class="lab" for="one">1</label>
                
                        <input id="two" name="multiples" type="radio" value="2">
                        <label for="two">2</label>
                
                        <input id="three" name="multiples" type="radio" value="3">
                        <label for="three">3</label>
                
                        <input id="four" name="multiples" type="radio" value="4">
                        <label for="four">4</label>
                
                        <input id="five" name="multiples" type="radio" value="5">
                        <label for="five">5</label>
                
                        
                
                        <div class="container">
                            <div class="carousel    ">
                                <img src="images/1.jpg" id="img1" alt="Landscape 1" onclick="redir()">
                                <img src="images/2.jpg" id="img2" alt="Landscape 2">
                                <img src="images/3.jpg" id="img3" alt="Landscape 3">
                                <img src="images/4.jpg" id="img4" alt="Landscape 4">
                                <img src="images/5.jpg" id="img5" alt="Landscape 5">
                                 
                            </div>
                        </div>

                        
                </div> 

                <div class="socle"><img src="img/tableau_de_bord.png" alt="" class="tab"></div> 
            </div>

            
            <div class="index-dashboard"> 
                
                 <?php $co=conn();
                    dashboard($co);
                    disconnection(); ?> 

            </div>

        </main>
        
<!-- yo -->





<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="js/script.js"></script>
    </body>
    </html>