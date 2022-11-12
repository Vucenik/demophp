<?php
require "header_filmovi.php";

//$model=$setings["model"]?? new Filmovi();

?>



 <form action="insert_filmovi"  id="form_unos_sudionika"   enctype="application/x-www-form-urlencoded" method="POST">
      <header>
        <h2>Unos podataka o filmovima</h2>
        <a href="Filmovi"class="agumb">x</a>
      </header>
    <fieldset>
      <label for="">
        Naziv filma:
        <input type="text" name="naziv" id="naziv" required placeholder="Kum 1"  maxlength="30"  >
      </label>
      <label for="">
        Godina izlaska:
        <input type="date" name="godina_izlaska" id="godina_izlaska" required >
      </label>
      <!-- <label for="">
        Žanr:
        <input type="text" name="zanr" id="zanr" required placeholder="Kriminalistički film"  maxlength="30"  >
      </label>
      -->
         <label for="">
        Žanr:
  <select name="zanr" id="zanr_id">
  <?php

foreach (Liste::$Zanrovi as $value) {
  
  echo '    <option value="'.$value.'">'.$value.' </option>';

};

?>
       </select>

      
      </label>
      
      <label for="">
        Cijena:
        <input type="number" name="cijena" required step="0.01" min="0" placeholder=" 10.00 ">
        </label>
    </fieldset>
    <span class="greska"><?=$setings["poruka"]??''?></span>
    <footer>
      <button id="gumb_post">Unesi</button>
  </footer>
      
    </form>

    <?php
require "footer_filmovi.php";
?>