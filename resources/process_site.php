<?php
$route = $newfldr.'/'.$file;

switch($route){
  case "investigacion/proyectos":
    $cialc = $this->loadModel('Cialc');
    $proyectos = $cialc->proyectos();
  break;
  case "investigacion/seminarios":
    $cialc = $this->loadModel('Cialc');
    $seminarios = $cialc->seminarios();
  break;
  case "nosotros/directorio/index":
    $research = $this->loadModel('Usuarios');
    $investigadores  = $research->research_type(142);
    $invitados  = $research->research_type(141);
    $becarios  = $research->research_type(140);

  break;
  case "nosotros/directorio/directory":
  break;
  case "inicio/index":

      $banact = $this->loadModel('Banneractividades');
      $banners_act = $banact->get_banners();

      $banmain = $this->loadModel('Bannermain');
      $banners_main = $banmain->get_banners();

      $banoti = $this->loadModel('Bannernoticias');
      $banners_noti = $banoti->get_banners();

      $banov = $this->loadModel('Bannernovedades');
      $banners_nov = $banov->get_banners();

      $banews = $this->loadModel('Bannerperiodicos');
      $banners_news = $banews->get_banners();

  break;
  case "investigacion/areas":
      $research = $this->loadModel('Usuarios');
      $filosofia  = $research->research(136);
      $literatura  = $research->research(137);
      $historia  = $research->research(138);
      $politica  = $research->research(139);

  break;
  case "investigacion/perfil_investigador":
      $research = $this->loadModel('Usuarios');
      $p	= $research->researchData($process);
      function spacefree($n)  { return str_replace('&nbsp;',' ',$n); }
      $investigador	= array_map("spacefree", $p);
       $destino = self::duplicatePublic($investigador['perfil']['avatar']);
  break;
  case "nosotros/ubicacion/mapa":
      $research = $this->loadModel('Usuarios');
      $filosofia  = $research->research(136);
      $literatura  = $research->research(137);
      $historia  = $research->research(138);
      $politica  = $research->research(139);

  break;
  case "publicaciones/novedades":
      $banov = $this->loadModel('Bannernovedades');
      $elementos = $banov->get_banners_page();

  break;
  default:
  break;
}
?>
