<?php 
     function escape($string) {
          return htmlentities(trim($string), EN_QUOTES, 'UTF-8');
     }
?>