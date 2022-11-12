<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUDIONICI-CSR DEMO</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/poo_screen.css">
    <script>
  const url_daj_sve ="<?= DOC_ROOT."daj-sve-sudionike";?>";

</script>
    <script src="./js/moduli/app.js" defer type="module"></script>
</head>
<body>
 <header class="glavni">

 <nav class="navigacija">
  <ul>
    <li>
      <a href="https://vlatko.live/">HOME</a>
      <a href=<?=DOC_ROOT?>>CSR DEMO</a>
      <a href=<?=DOC_ROOT."Filmovi"?>>SSR DEMO</a>
    </li>
  </ul>
</nav>
 
 <h1>Demo CSR i SSR stranica upotrebom PHP-a </h1>
 </header>
  <main>
<h2 class="naslov">Demo client-side rendering  aplikacije upotrebom php-a</h2>
<p class="naslov"> Primjer upotrebe Php-a kao servisa za dohvaćanje podataka iz baze te prikaza sadržaja putem javascripta bez uptrebe razvojnih okvira i bez vanjskih zavisnosti </p>
    <table class="ucenici" id="ucenici">
      <caption>Rezultati natjecanja</caption>

      <thead>
        <tr>
        
         <th scope="col">Ime i prezime</th>
         <th scope="col">Datum prijave</th>
         <th scope="col">Razred</th>
         <th scope="col">Uredi</th>
         <th scope="col">Obriši</th>
        </tr>
      </thead>
      <tbody>
       
        
      </tbody>
      <tr>
      <td colspan="5">
        <button id="gumb_table_dodaj">Dodaj novi redak</button>
      </td>

      </tr>
      

    </table>

    
</main>
<footer>
 
</footer>
<div class="modal ">
  <form action=<?=DOC_ROOT."insert-sudionici"?> method="post" id="form_unos_sudionika">
    <header>
      <h2>Unos podataka o sudionicima</h2>
      <button type="button" class="ukini_modal">x</button>
    </header>
  <fieldset>
    <label for="">
      Ime i prezime:
      <input type="text" name="ime" id="input_ime" required placeholder="Ivo Ivić" minlength="6" maxlength="30"  pattern="[A-ZČĆŠĐŽ][a-zčćžšđ]+\s+[A-ZČĆŽŠĐ][a-zčćžšđ]+">
    </label>
    <label for="">
      Datum prijave:
      <input type="date" name="datum" id="input_datum" required >
    </label>
    <label for="">
      Razred:
      <input type="text" name="razred" required placeholder=" 1 TR1">
      </label>
  </fieldset>
  <span class="greska"></span>
  <footer>
    <button type="submit" id="gumb_post">Unesi</button>
</footer>
    
  </form>
</div>

    <div class="modal">
  <form action=<?=DOC_ROOT."edit-sudionici"?> method="post" id="form_edit_sudionici">
    <header>
      <h2>Editiranje podataka o sudionicima</h2>
      <button type="button" class="ukini_modal">x</button>
    </header>
  <fieldset>
    <label for="">
      Ime i prezime:
    <!--  <input type="text" name="ime" id="input_ime" required placeholder="Ivo Ivić" minlength="6" maxlength="30" pattern="[A-Z][a-z]+\s+[A-Z][a-z]+">-->
      <input type="text" name="ime" id="input_ime" required placeholder="Ivo Ivić" minlength="6" maxlength="30" pattern="[A-ZČĆŠĐŽ][a-zčćžšđ]+\s+[A-ZČĆŽŠĐ][a-zčćžšđ]+">
    </label>
    <label for="">
      Datum prijave:
      <input type="date" name="datum" id="input_datum" required >
    </label>
    <label for="">
      Razred:
      <input type="text" name="razred" required placeholder=" 1 TR1">
      </label>
      <input type="hidden" name="id_sudionici">
  </fieldset>
  <span calss="greska"></span>
  <footer>
    <button type="submit" id="gumb_edit_form">Editiraj</button>
</footer>
    
  </form>
</div>

    <div class="modal">
  <form action=<?=DOC_ROOT."delete-sudionici"?> method="post" id="form_delete_sudionici">
    <header>
      <h2>Dali želite obrisati redak ?</h2>
      <button type="button" class="ukini_modal">x</button>
    </header>
  <fieldset>
   
      <input type="hidden" name="id_sudionici">
  </fieldset>
  <span calss="greska"></span>
  <footer>
    <button id="gumb_delete_form">Obriši</button> <button type="button" class="ukini_modal">Cancle</button>
</footer>
    
  </form>
</div>

</body>
</html>