<?php 
?>
<?php
 $b = "http://localhost/final/Viewer.js/#../".$a;
 echo $b;
 ?> 
 <iframe id="viewer" src = "<?php echo $b;?>"
  width='800' height='500' allowfullscreen webkitallowfullscreen></iframe>
<?php  
 echo $a;
?>
<?php 
if ($a == "odpp.odp") {?>	
    <iframe id="viewer" src = "http://localhost/final/Viewer.js/#../odpp.odp" 
    width='800' height='500' allowfullscreen webkitallowfullscreen></iframe>
<?php } else if ($a == "encryption.odt") {?>
     <iframe id="viewer" src = "http://localhost/final/Viewer.js/#../encryption.odt" 
    width='800' height='500' allowfullscreen webkitallowfullscreen></iframe>
<?php } else {?>
     <iframe id="viewer" src = "http://localhost/final/Viewer.js/#../ab.pdf" 
    width='800' height='500' allowfullscreen webkitallowfullscreen></iframe>
<?php }?>
<?php ?>