<style>
.circle-icon.circle-main-color, .slide_subtitle {
    background-color: #ff0000;
    color: #FFF;
}
.grid-content{
	text-align:center;
	text-transform: uppercase;
}
.lateralboxgrid{
       height: 15em;
       margin-bottom: 7px;
       overflow: hidden;
}
.circle-icon2 {
    background-color: #333;
    border-radius: 75px;
    color: #FFF;
    margin-top: 2px;
    text-align: center;
    height: 55px;
    line-height: 56px;
    width: 55px;
    font-size: 24px!important;
    position:relative;
    top:70px;
}
.bkgd-revista{
       background-image: url('<?=URL_PUBLIC?>frontend/images/btn_revistalat.png');
       background-size: 268px 68px;
       background-position: left top;
       width: 268px;
       height: 68px;
}

.bkgd-cuadernos{
       background-image: url('<?=URL_PUBLIC?>frontend/images/btn_cuadernos.png');
       background-size: 268px 68px;
       background-position: left top;
       width: 268px;
       height: 68px;
}

.bkgd-biblioteca{
       background-image: url('<?=URL_PUBLIC?>frontend/images/btn_biblioteca.png');
       background-size: 277px 70px;
       background-position: left top;
       width: 277px;
       height: 70px;
}

.bkgd-digital{
       background-image: url('<?=URL_PUBLIC?>frontend/images/btn_digital.png');
       background-size: 277px 70px;
       background-position: left top;
       width: 277px;
       height: 70px;
}

.btn{
       color: #FFF;
}
.btn:hover, .btn:focus, .btn.focus {
       box-shadow: 0px 0px 30px #1c3d6c;
       padding: 0;
       -moz-transition: all 1s;
       -webkit-transition: all 1s;
       -o-transition: all 1s;
}
/*---------altura del banner principal-------------------*/
@media (min-width: 992px) {
       .swiper-variant-1, .swiper-variant-1 .swiper-wrapper {
           height: 400px;
       }
       #x1lk {
              background-position: 0px -130px;
       }
}
@media (min-width: 1200px) {
       .swiper-variant-1, .swiper-variant-1 .swiper-wrapper {
           height: 400px;
       }
       #x1lk {
              background-position: 0px -130px;
       }
}


/*---------SWIPER-------------------*/
.swiper-container{
    width: 100%;
    height: 350px;
    overflow: hidden;
}
@media (max-width: 750px){
       .swiper-container{
           width: 100%;
           height: 200px;
       }
}
@media (max-width: 350px){
       .swiper-container{
           width: 100%;
           height: 150px;
       }
}


.swiper-container0{
    width: 100%;
    height: 450px;
    overflow: hidden;
}

.newpaper_container{
    width: 265px;
    height: 345px;
    overflow: hidden;
}
.newpaper_container figure img{
       max-width: 265;
       width: 265px;
}
.events_container{
    width: 100%;
    height: 400px;
    overflow:hidden;
}
.events2_container{
    width: 277.5px;
    height: 300px;
    overflow:hidden;
}
.events2_container figure img{
       width: 277.5px;
}
.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
}
.newpaper_container > .swiper-wrapper > .swiper-slide > .swiper-zoom-container > img{
   height: 400px !important;
}

/*---------FIN Paginacion numerada-------------------*/

.borde-right{
       border-right: 2px solid red;
}




/* Tabs panel */
.tabbable-panel {
  padding: 10px;
}

/* Default mode */
.tabbable-line > .nav-tabs {
  border: none;
  margin: 0px;
}
.tabbable-line > .nav-tabs > li {
  margin-right: 2px;
}
.tabbable-line > .nav-tabs > li > a {
  border: 0;
  margin-right: 0;
  color: #737373;
}
.tabbable-line > .nav-tabs > li > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {
  border-bottom: 4px solid #fbcdcf;
}
.tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
  border: 0;
  background: none !important;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
  margin-top: 0px;
}
.tabbable-line > .nav-tabs > li.active {
  border-bottom: 4px solid #f3565d;
  position: relative;
}
.tabbable-line > .nav-tabs > li.active > a {
  border: 0;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.active > a > i {
  color: #404040;
}
.tabbable-line > .tab-content {
  margin-top: -3px;
  background-color: #fff;
  border: 0;
  border-top: 1px solid #eee;
  padding: 15px 0;
  border: none !important;
}
.portlet .tabbable-line > .tab-content {
  padding-bottom: 0;
}
.nav-tabs>li>a, .nav-tabs>li>a:focus {
    background-color: #FFF;
}
.tab-content {
    border: none !important;
    padding: 16px 12px;
    position: relative
}


/*4 botones junto al banner*/

@media (min-width: 1200px){
       * + .btn {
           margin-top: 30px !important;
       }
}
.open > html .btn-white-outline-variant-1.dropdown-toggle,
html .btn-white-outline-variant-1 {
       color: #217ED3;
       background-color: #FFF;
       border-color: #217ED3;
}

.foot_letter{
       color: #217ed3;
       font-size: 1.3em;
       font-variant: all-small-caps;
       text-align: center;
}
.foot_letter a{
       color: #217ed3;
}
figure img {
       vertical-align: top;
       position: absolute;
       top: 0px;
       left:0px;
}
.link-image img {
    opacity: 1;
}
html.lt-ie-10 * + .range, * + .range {
    margin-top: 10px;
}
.redondeado:hover {
    border-radius: 50% / 50%;
    box-shadow: 0px 0px 30px #000;
    padding: 0;
    -moz-transition: all 1s;
    -webkit-transition: all 1s;
    -o-transition: all 1s;
}

.redondeado {
    border-radius: 0;
    -moz-transition: all 1s;
    -webkit-transition: all 1s;
    -o-transition: all 1s;
    cursor: pointer;
}


.swiper-pagination-bullet {
    width: 20px;
    height: 20px;
    text-align: center;
    line-height: 20px;
    font-size: 12px;
    opacity: 1;
    background: #cdcdcd;
}
.swiper-pagination-bullet-active {
    background: #32b9ce;
}
.pleca{
  background-color: #1c3d6c;
  color:#ffffff;
  text-align:center;
  height:41px;
  vertical-align:middle;
  margin-bottom:10px;
}
.pleca > .pleca_va{
  line-height: 41px;
}

.muro-noticias{
  position:absolute;
  z-index:54;
  width: 300px;
  height: 150px;
  left:285px;
  top:140px;
  background-color: #000000;
  opacity: 0.5;
  color:#ffffff;
  text-align:left;
  font-weight: lighter;
}
.muro-noticias p{
  margin:.85em;
}
.muro-noticias a{
  color:#ffffff;
}
.muro-noticias a:hover{
  color:#3c72c9;
}
</style>
