<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $setings["title"]??"Filmovi-SSR DEMO"?></title>
    <link rel="stylesheet" href="css/poo_filmovi_screen.css" media="screen">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="<?$setings["script"]??''?>"></script>
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
  