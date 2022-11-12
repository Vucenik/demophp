
<?php
require "header_filmovi.php";
// class Liste{

//     public static array $Zanrovi= [
//         "Komedija",
//         "Pustolovni film",
//         "Melodrama",
//         "Vestern",
//         "Muzički film",
//         "Film strave",
//         "Znanstveno fantastični film",
//         "Kriminalistički film",
//         "Ostalo"

//     ];
// };

// class Filmovi{
//     public int $id_film;
//     public string $naziv;

//     public string $godina_izlaska;
//     public string $zanr;
//     public float $cijena;
// };
/*$film = new Filmovi();
$film->id_film=3;
$film->naziv="Macina proba";
$film->godina_izlaska="20/12/1976";
$film->zanr="komedija";
$film->cijena= 10.30;

/// model tima polje sa vilm objektima
*/
$model=$setings["model"]??array(
    new Filmovi()
);

?>
  <h2 class="naslov">Demo server-side rendering  aplikacije upotrebom php-a</h2>
<p class="naslov"> Primjer upotrebe Php-a na strani servera uptrebom MVC obrasca bez uptrebe razvojnih okvira i vanjskih ovisnosti. MVC obrazac je inspiriran ASP.NET core 6 endpoint routing sistem, a template sa Razor Pages</p>
  
  <nav class="selekcija">

<ul>
  <li>
<form action="trazi_po_zanru" method="GET">

  <fieldset>
    <label for="">
      Traži po žanru
     <select name="zanr" id="">

           <?php


        
foreach (Liste::$Zanrovi as $value) {
 
  echo '    <option value="'.$value.'">'.$value.' </option>';

};

?>
     </select>
   
    </label>
  </fieldset>

<footer>
      <button id="gumb_post">Traži</button>

  </footer>
  </form>
</li><!--Kraj forme traži po žanru-->
<li>
  <form action="trazi_po_nazivu" method="GET">
   
    </header>
    <fieldset>
      <label for="">
        Traži po naslovu
        <input type="search" name="dio_naslova" id="">
      </label>
    
    </fieldset>
    <footer>
      <button>Traži</button>
    </footer>
  </form>
</li><!--Kraj traži po naslovu-->
</ul>
</nav><!--kraj nav selekcija-->

    <table class="ucenici" id="ucenici">
            <caption><a href=<?=DOC_ROOT.'Filmovi'?>> Filmovi </a></caption>

      <thead>
        <tr>
        
         <th scope="col">Naslov</th>
         <th scope="col">Godina izdanja</th>
         <th scope="col">Žanr</th>
         <th scope="col">Cijena</th>
         <th scope="col">Uredi</th>
         <th scope="col">Obriši</th>
        </tr>
      </thead>
      <tbody>
    
        <?php
      foreach ($model as $item) {
          echo'
          <tr>
        
          <td>
            '.$item->naziv.'
            </td>
          <td>
            '.date_format(date_create($item->godina_izlaska), 'd.m.Y').'
            </td>
          <td>
           '.$item->zanr.'
             </td>
          <td>
            '.$item->cijena.' &euro;
             </td>
          <td><a href="Filmovi-edit?id_film='.$item->id_film.'">Uredi</a></td>
          <td><a href="Filmovi-delete?id_film='.$item->id_film.'">Obriši</a></td>
        </tr>
        ';
      };


?>
      </tbody>
      <tr>
      <td colspan="6">
        <a href=" Filmovi-dodaj">Dodaj novi film</a>
      </td>

      </tr>
      

    </table>
<?php
require "footer_filmovi.php";
?>