 
    const copyText= [
     'this is the first line',
     'Simply put, the second line',
     'impressed by the third line.',
     'impressed ',
     'ipeedb th tidine.'
    ];


    // let but =  document.getElementById('skip'); 
    var i = 0      ;
    var texte = document.getElementById('text');
    var para = document.getElementById('parent');
    // if(but){
    // but.addEventListener('click',  next) ;
    // }else{
    //     console.log(but);
    // }
    console.log(i)
    function previous(){
    
        if(i>=0){
            i -= 1;
         $("#text").text(copyText[i]);
         
         console.log(i-1)
        }else{
            i = 0;
            para.style.display= "none";  
           
        }
    //   else{
    //       para.style.display= "none";  
    //       i = 0
    //   }
      }
   
    function next(){
      if(i>=0 && i<5){
       $("#text").text(copyText[i]);
       i += 1;
       console.log(i-1)
    }else{
        i = 0;
        para.style.display= "none";  
        
    }
    }
 
    function replay(){
      
        para.style.display= "block";
        $("#text").text(copyText[0]);
        console.log(i)
        return i
    }














  
  
    function redir(){
        window.location.href = " ";
    }
  
    // img1.onclick('click',  Done) ;
    
 
    //   function Done(){
    //      window.location.href = "../sign_up2.html";
    //  }
 

    

 
  
  
  

  
  
  
   


  

  