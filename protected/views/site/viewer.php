
<?php 


  print_r($this->viewer);die();?>
  <!---  <a href="http://localhost/final/Viewer.js/#../ab.pdf">click me pdf </a>
    <br/>
    <a href="http://localhost/final/Viewer.js/#../encryption.odt">click me odt </a>
    <br/>--->
    <iframe id="viewer" src = "http://localhost/final/Viewer.js/#../odpp.odp" 
    width='800' height='500' allowfullscreen webkitallowfullscreen></iframe>
    
     <iframe id="viewer" src = "http://localhost/final/Viewer.js/#../encryption.odt" 
    width='800' height='500' allowfullscreen webkitallowfullscreen></iframe>
    
     <iframe id="viewer" src = "http://localhost/final/Viewer.js/#../ab.pdf" 
    width='800' height='500' allowfullscreen webkitallowfullscreen></iframe>
   
<?php ?>