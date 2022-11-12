<?php
require "header_filmovi.php";

$model=$setings["model"]?? new Filmovi();

?>




<form action="Filmovi-save-delete"  method="post" id="form_delete_sudionici"  enctype="application/x-www-form-urlencoded">
      <header>
        <h2>Obrišem film ?</h2>
        <a  href="Filmovi" class="agumb">x</a>
      </header>
    <fieldset>
      <label for="">
        Naziv filma:
        <input type="text" name="naziv" id="naziv" required placeholder="Kum 1"  maxlength="30" value="<?=$model->naziv??''?>" disabled>
      </label>
      <label for="">
        Godina izlaska:
        <input type="date" name="godina_izlaska" id="godina_izlaska" required value="<?=$model->godina_izlaska??''?>" disabled>
      </label>
      <label for="">
        Žanr:
        <input type="text" name="zanr" id="naziv" required placeholder="Kriminalistički film"  maxlength="30" value="<?=$model->zanr??''?>" disabled>
      </label>
      <label for="">
        Cijena:
        <input type="number" name="cijena" required step="0.01" min="0" placeholder=" 10.00 " value="<?=$model->cijena??''?>" disabled>
        </label>
        <input type="hidden" name="id_film" value=<?=$model->id_film??''?>>
    </fieldset>
    <span calss="greska"> <?=$setings["poruka"]??''?></span>
    <footer>
      <button id="gumb_delete_form">Obriši</button> 
      <a href="Filmovi" class="agumb">Cancle</a>
  </footer>
 </form>






<?php
require "footer_filmovi.php";
?>