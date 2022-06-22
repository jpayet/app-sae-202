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
                        <label class="lab" for="one">-</label>
                
                        <input id="two" name="multiples" type="radio" value="2">
                        <label for="two">1</label>
                
                        <input id="three" name="multiples" type="radio" value="3">
                        <label for="three">2</label>
                
                        <input id="four" name="multiples" type="radio" value="4">
                        <label for="four">3</label>
                
                        <input id="five" name="multiples" type="radio" value="5">
                        <label for="five">4</label>
                
                        
                
                        <div class="container">
                            <div class="carousel    ">
                                <img src="img/Bienvenue.png" id="img1" alt="Landscape 1" >
                                <img src="img/activite_1.png" id="img2" alt="Landscape 2" onclick="redir1()">
                                <img src="img/activite_2.png" id="img3" alt="Landscape 3" onclick="redir2()">
                                <img src="img/activite_3.png" id="img4" alt="Landscape 4" onclick="redir3()">
                                <img src="img/activite_4.png" id="img5" alt="Landscape 5" onclick="redir4()">
                                 
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