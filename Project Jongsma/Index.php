<?php
session_start();
require('./Configuratie.php');
include 'Includes/TopPage.php';

function ConnectDB()
{
  try
  {
    $pdo = new PDO("mysql:host=".HOST."; dbname=".DBNAME,USERNAME,PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }

	return $pdo;
}

$pdo = connectDB();

if (isset($_GET['PaginaNr'])) {
    $paginaNr = $_GET['PaginaNr'];
} else {
    $paginaNr = 0;
}

?>
<ul class="sidenav">
    <li class="link"><a class="active" href="Index.php">Home</a></li>
    <li class="link"><a class="notactive" href="Trips.php">Rijzen</a></li>
    <li class="link"><a class="notactive" href="Login.php">Login</a></li>
</ul>
<?php

                switch ($paginaNr) {
                    case 1:
                        require('Modules/Reserveren.php');
                        break;
                    case 2:
                        require('Modules/Verwacht.php');
                        break;
                    case 3:
                        require('Modules/OverOns.php');
                        break;
                    case 4:
                        require('Modules/MijnProfiel.php');
                        break;
                    case 5:
                        require('Modules/Data.Tijden.php');
                        break;
                    case 6:
                        require('Modules/Registreren.php');
                        break;
                    case 7:
                        require('Modules/FilmToevoegen.php');
                        break;
                    case 8:
                        require('Modules/FilmAanpassenVerwijderen.php');
                        break;
                    case 10:
                        require('Modules/Besteloverzicht.php');
                        break;
                    case 11:
                        require('Modules/BestellingVerwerken.php');
                        break;
                    case 98:
                        require('Modules/Inloggen.php');
                        break;
                    case 99:
                        require('Modules/Uitloggen.php');
                        break;
                }
?>
Home

<div>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in ultricies odio. Etiam at sagittis tortor, ut ultricies sem. Vestibulum in ipsum ante. Donec sagittis purus in lorem eleifend, non bibendum lacus malesuada. Etiam fermentum finibus fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris volutpat bibendum risus, ut gravida urna placerat ut. Quisque porta nec mauris vel rutrum. Aliquam molestie varius leo at laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec at metus nisl. Praesent dignissim tincidunt massa ac ultrices. Cras id pharetra dui.

    Morbi imperdiet leo a tortor consectetur, sed posuere leo aliquet. Nam convallis arcu in eros accumsan pretium. Proin bibendum vestibulum dolor. Nunc non erat nulla. Phasellus eget tortor id ipsum rhoncus congue at consectetur justo. Nulla eu odio nec urna dignissim ornare. Etiam suscipit dui at vulputate maximus. Suspendisse volutpat, risus eget venenatis eleifend, mauris ipsum faucibus sapien, ut commodo erat dui nec felis. Morbi non lectus tincidunt, pellentesque orci in, dapibus diam.

    Nunc viverra dapibus metus vitae ullamcorper. In a euismod enim. Aliquam tempor est id neque sagittis, id porta diam finibus. Donec sit amet massa ac nisl iaculis egestas. Phasellus sollicitudin velit vel vehicula pellentesque. In hac habitasse platea dictumst. Nam in varius augue. Pellentesque venenatis ligula elit, eget euismod urna ultrices a. Nulla maximus rutrum gravida. Nulla a nulla quis ex vulputate malesuada nec ut elit. Mauris eu congue lacus, at cursus tellus.

    Sed ex augue, semper quis odio id, ultricies hendrerit augue. Sed sed arcu at sem blandit semper. Integer tempor, augue ac maximus vestibulum, purus justo lacinia purus, vitae faucibus quam magna a lorem. Pellentesque mollis lacus id ante sodales sagittis ut placerat sapien. Nulla ultricies lacus in ex vestibulum elementum. Vestibulum id semper risus. Cras at mi fermentum lorem aliquam facilisis. Praesent elementum nunc a ex aliquet, non dignissim nisl condimentum. Nunc a lacus id massa condimentum condimentum ultrices at neque. Praesent orci diam, molestie ut nisl eget, vestibulum malesuada arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas id leo vestibulum, fermentum arcu luctus, dictum erat.

    Nam vel malesuada tortor, vel iaculis quam. Etiam hendrerit non dolor et pellentesque. Pellentesque nisi neque, mattis et cursus vel, congue et eros. Vestibulum aliquet luctus quam, ut varius nibh tincidunt et. Suspendisse facilisis justo id dolor commodo, eu ultricies elit vulputate. Suspendisse sollicitudin convallis velit nec pretium. Mauris tristique sem at orci mattis efficitur. Proin iaculis, quam eget sagittis pharetra, massa nisl imperdiet leo, ut laoreet urna nunc vel leo.

    Aliquam accumsan facilisis purus, sit amet lacinia justo porta eu. Etiam malesuada est tempus, viverra magna eu, consequat eros. Etiam et dui fringilla, placerat tellus ac, porttitor odio. Ut diam velit, rutrum a viverra id, sagittis a felis. Aliquam vitae ipsum scelerisque, placerat urna sed, vehicula ante. Aliquam accumsan leo eros, id accumsan nibh ornare non. Phasellus varius diam ac risus porta bibendum. Quisque eget mollis ligula.

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mi mi, lobortis pretium neque vitae, iaculis mattis dolor. Morbi a ante viverra, mollis eros aliquam, iaculis est. Praesent quis est quis ante vulputate eleifend nec nec tellus. In ac nunc molestie, vehicula neque quis, ultricies ex. Mauris gravida neque vitae tortor rutrum mollis. Integer id mollis mauris, at egestas eros. Integer tincidunt lorem id arcu pharetra, et eleifend dui lobortis.

    Morbi at sem id tortor faucibus scelerisque. Fusce erat nunc, consectetur et elit non, bibendum facilisis purus. Quisque aliquet at velit in venenatis. Fusce vehicula cursus mi eget auctor. Nulla nec viverra arcu. Nulla lacinia lobortis tortor eget sollicitudin. Maecenas commodo at nibh at eleifend. Vestibulum nibh quam, imperdiet ac vulputate accumsan, commodo ut tellus. Suspendisse sed odio in ante volutpat dignissim vitae vel orci. Fusce tincidunt, ex id pulvinar hendrerit, dolor augue tincidunt quam, quis dignissim nunc diam in est. Cras pretium in sem ac sollicitudin.

    Duis tortor purus, ultrices sit amet tempus at, euismod in arcu. Mauris venenatis et lectus sit amet porttitor. Morbi ac felis ligula. Praesent et enim tempus, tristique ex sed, auctor sem. Nam venenatis sagittis mauris eget rutrum. Duis laoreet dignissim orci et rhoncus. Curabitur fringilla, urna sed dapibus facilisis, felis velit volutpat ex, eget imperdiet lorem ligula sed risus.

    Phasellus sed maximus eros. Donec orci metus, malesuada eu euismod eu, convallis at urna. In eleifend risus lorem, viverra volutpat sapien tristique quis. Sed erat mi, mollis quis vehicula nec, tincidunt sit amet dolor. Duis ac neque ac lacus laoreet finibus. In magna est, pretium sed cursus nec, pretium efficitur nisi. Aliquam nec scelerisque nisl. Proin quis sem dignissim, malesuada erat non, venenatis neque.



    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in ultricies odio. Etiam at sagittis tortor, ut ultricies sem. Vestibulum in ipsum ante. Donec sagittis purus in lorem eleifend, non bibendum lacus malesuada. Etiam fermentum finibus fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris volutpat bibendum risus, ut gravida urna placerat ut. Quisque porta nec mauris vel rutrum. Aliquam molestie varius leo at laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec at metus nisl. Praesent dignissim tincidunt massa ac ultrices. Cras id pharetra dui.

    Morbi imperdiet leo a tortor consectetur, sed posuere leo aliquet. Nam convallis arcu in eros accumsan pretium. Proin bibendum vestibulum dolor. Nunc non erat nulla. Phasellus eget tortor id ipsum rhoncus congue at consectetur justo. Nulla eu odio nec urna dignissim ornare. Etiam suscipit dui at vulputate maximus. Suspendisse volutpat, risus eget venenatis eleifend, mauris ipsum faucibus sapien, ut commodo erat dui nec felis. Morbi non lectus tincidunt, pellentesque orci in, dapibus diam.

    Nunc viverra dapibus metus vitae ullamcorper. In a euismod enim. Aliquam tempor est id neque sagittis, id porta diam finibus. Donec sit amet massa ac nisl iaculis egestas. Phasellus sollicitudin velit vel vehicula pellentesque. In hac habitasse platea dictumst. Nam in varius augue. Pellentesque venenatis ligula elit, eget euismod urna ultrices a. Nulla maximus rutrum gravida. Nulla a nulla quis ex vulputate malesuada nec ut elit. Mauris eu congue lacus, at cursus tellus.

    Sed ex augue, semper quis odio id, ultricies hendrerit augue. Sed sed arcu at sem blandit semper. Integer tempor, augue ac maximus vestibulum, purus justo lacinia purus, vitae faucibus quam magna a lorem. Pellentesque mollis lacus id ante sodales sagittis ut placerat sapien. Nulla ultricies lacus in ex vestibulum elementum. Vestibulum id semper risus. Cras at mi fermentum lorem aliquam facilisis. Praesent elementum nunc a ex aliquet, non dignissim nisl condimentum. Nunc a lacus id massa condimentum condimentum ultrices at neque. Praesent orci diam, molestie ut nisl eget, vestibulum malesuada arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas id leo vestibulum, fermentum arcu luctus, dictum erat.

    Nam vel malesuada tortor, vel iaculis quam. Etiam hendrerit non dolor et pellentesque. Pellentesque nisi neque, mattis et cursus vel, congue et eros. Vestibulum aliquet luctus quam, ut varius nibh tincidunt et. Suspendisse facilisis justo id dolor commodo, eu ultricies elit vulputate. Suspendisse sollicitudin convallis velit nec pretium. Mauris tristique sem at orci mattis efficitur. Proin iaculis, quam eget sagittis pharetra, massa nisl imperdiet leo, ut laoreet urna nunc vel leo.

    Aliquam accumsan facilisis purus, sit amet lacinia justo porta eu. Etiam malesuada est tempus, viverra magna eu, consequat eros. Etiam et dui fringilla, placerat tellus ac, porttitor odio. Ut diam velit, rutrum a viverra id, sagittis a felis. Aliquam vitae ipsum scelerisque, placerat urna sed, vehicula ante. Aliquam accumsan leo eros, id accumsan nibh ornare non. Phasellus varius diam ac risus porta bibendum. Quisque eget mollis ligula.

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mi mi, lobortis pretium neque vitae, iaculis mattis dolor. Morbi a ante viverra, mollis eros aliquam, iaculis est. Praesent quis est quis ante vulputate eleifend nec nec tellus. In ac nunc molestie, vehicula neque quis, ultricies ex. Mauris gravida neque vitae tortor rutrum mollis. Integer id mollis mauris, at egestas eros. Integer tincidunt lorem id arcu pharetra, et eleifend dui lobortis.

    Morbi at sem id tortor faucibus scelerisque. Fusce erat nunc, consectetur et elit non, bibendum facilisis purus. Quisque aliquet at velit in venenatis. Fusce vehicula cursus mi eget auctor. Nulla nec viverra arcu. Nulla lacinia lobortis tortor eget sollicitudin. Maecenas commodo at nibh at eleifend. Vestibulum nibh quam, imperdiet ac vulputate accumsan, commodo ut tellus. Suspendisse sed odio in ante volutpat dignissim vitae vel orci. Fusce tincidunt, ex id pulvinar hendrerit, dolor augue tincidunt quam, quis dignissim nunc diam in est. Cras pretium in sem ac sollicitudin.

    Duis tortor purus, ultrices sit amet tempus at, euismod in arcu. Mauris venenatis et lectus sit amet porttitor. Morbi ac felis ligula. Praesent et enim tempus, tristique ex sed, auctor sem. Nam venenatis sagittis mauris eget rutrum. Duis laoreet dignissim orci et rhoncus. Curabitur fringilla, urna sed dapibus facilisis, felis velit volutpat ex, eget imperdiet lorem ligula sed risus.

    Phasellus sed maximus eros. Donec orci metus, malesuada eu euismod eu, convallis at urna. In eleifend risus lorem, viverra volutpat sapien tristique quis. Sed erat mi, mollis quis vehicula nec, tincidunt sit amet dolor. Duis ac neque ac lacus laoreet finibus. In magna est, pretium sed cursus nec, pretium efficitur nisi. Aliquam nec scelerisque nisl. Proin quis sem dignissim, malesuada erat non, venenatis neque.
</div>
</body>