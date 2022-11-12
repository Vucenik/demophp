<?php
require "header_filmovi.php";

$model=$setings["model"]?? new Filmovi();

?>

<form action="Filmovi-save-edit"  method="post" id="form_edit_sudionici"  enctype="application/x-www-form-urlencoded">
      <header>
        <h2>Editiranje podataka o filmovima</h2>
        <a  href="Filmovi" class="agumb">x</a>
      </header>
    <fieldset>
      <label for="">
        Naziv filma:
       <!-- <input type="text" name="naziv" id="naziv" required placeholder="Kum 1"  maxlength="30" value=@Model.naziv >-->
        <input type="text" name="naziv" id="naziv" required placeholder="Kum 1"  maxlength="30" value="<?=$model->naziv??''?>" >
      </label>
      <label for="">
        Godina izlaska:
        <input type="date" name="godina_izlaska" id="godina_izlaska" required value="<?=$model->godina_izlaska??''?>" >
      </label>
     <!-- <label for="">
        Žanr:
        <input type="text" name="zanr" id="naziv" required placeholder="Kriminalistički film"  maxlength="30" value=@Model.zanr >
      </label>
      -->
   <label for="">
        Žanr:
  <select name="zanr" id="zanr_id" >
  <?php

$zanr=$model->zanr??'Komedija';
    foreach (Liste::$Zanrovi as $value) {
        if ($zanr==$value) {
            echo '    <option selected value="'.$value.'">'.$value.' </option>';
        } else {
            echo '    <option value="'.$value.'">'.$value.' </option>';
        }
    };

?>
       </select>
       </select>


      <label for="">
        Cijena:
      <!--  <input type="number" name="cijena" required step="0.01" min="0" placeholder=" 10.00 " value=@Model.cijena>-->
     <input type="number" name="cijena" required step="0.01" min="0" placeholder=" 10.00 " value="<?=$model->cijena??''?>">
        </label>
        <input type="hidden" name="id_film" value=<?=$model->id_film??''?>>
    </fieldset>
    <span calss="greska"> <?=$setings["poruka"]??''?></span>
    <footer>
      <button id="gumb_edit_form">Editiraj</button>
  </footer>
      
    </form>



<?php
require "footer_filmovi.php";
?>