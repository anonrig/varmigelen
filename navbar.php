<?php include "config.php";
include "functions.php";
function navbargoster($name) {

echo"<div class='navbar navbar-static-top'><div class='navbar-inner'><div class='container'><ul class='nav'>";
        
if ($name == 'anasayfa') {
echo "<a class='brand'>varmigelen?</a><li class='active'><a href='index.php'>Anasayfa</a>";
}
else if ($name == 'Ilan Ver') {
echo "<li><a href='index.php'>Anasayfa</a><li class='active'><a href='add.php'>Ilan Ver</a></li><li><a href='list.php'>Aktif İlanlar</a></li>";
}
else if ($name == 'aktifilan') {
echo "<li><a href='index.php'>Anasayfa</a><li><a href='add.php'>Ilan Ver</a></li><li class='active'><a href='list.php'>Aktif İlanlar</a></li>";
}
else if ($name == 'kendiilanlarim'){
echo "<li><a href='index.php'>Anasayfa</a><li><a href='add.php'>Ilan Ver</a></li><li><a href='list.php'>Aktif İlanlar</a></li>";  
}
else if($name == 'admin'){
echo "<li><a href='index.php'>Anasayfa</a><li><a href='schools.php'>Okul Ilan Ver</a></li><li><a href='locations.php'>Yer Ilan Ver</a></li>";
}
else {
echo "<li><a href='index.php'>Anasayfa</a><li><a href='add.php'>Ilan Ver</a></li><li><a href='list.php'>Aktif İlanlar</a></li>";
};
if (isset($_SESSION['sessionemail'])){
  echo "</ul><ul class='nav pull-right'><li class='hidden-phone'><form class='navbar-search pull-left'><i class='icon-search'></i><input type='text' class='search-query' placeholder='Hızlı Arama'></form></li><li class='divider-vertical'></li><li><a href='profile.php'>Profilim(<b>" . ucwords(fnDecrypt($_SESSION['sessionname'], "6eb598ac1356f82a91efe59f0e17be57")) . "</b>)</a></li><li><a href='logout.php'>Çıkış yap</a></li></ul></div></div></div><div class='container'><div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Uyarı!</strong> Sitemiz şu anda beta aşamasında. Yaptığımız hataları bize bildirin ki, geliştirelim.</div></div>";
}else {
  echo "</ul><ul class='nav pull-right'><li class='hidden-phone'><form class='navbar-search pull-left'><i class='icon-search'></i><input type='text' class='search-query' placeholder='Hizli arama'></form></li><li class='divider-vertical'></li><li><a href='register.php'>Kayıt ol</a></li><li><a href='login.php'>Giriş yap</a></li></ul></div></div></div><div class='container'><div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Uyarı!</strong> Sitemiz şu anda beta aşamasında. Yaptığımız hataları bize bildirin ki, geliştirelim.</div></div>";
}

}?>