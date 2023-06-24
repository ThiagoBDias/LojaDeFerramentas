<!-- ======= Footer ======= -->
<footer id="footer">
    <div class ="container">
      <div class ="row">
        <div class ="col-md-4">
        <h3 class="text-dark">Contato</h3>
          <a href="#"><h5 class = "text-light mt-3"><h6>WhatsApp</h6></h5></a>
          <a href="#"><h5 class = "text-light mt-2"><h6> Contates- nos pelo o chat</h6></h5></a>
          <a href="#"><h5 class = "text-light mt-2"> <h6>contate-nos pelo o E-mail</h6></h5></a>
          <a href="#"><h5 class = "text-light mt-2"> <h6>Siga-nos instagram</h6></h5></a>
        </div>
        <div class ="col-md-4">
          <h3 class="text-dark">Institucional</h3>
          <a href="#"><h5 class = "text-light mt-3"> termos de uso </h5></a>
          <a href="#"><h5 class = "text-light mt-2"> Politicas de cookies </h5></a>
          <a href="#"><h5 class = "text-light mt-2"> Politicas de privacidade </h5></a>
          <a href="#"><h5 class = "text-light mt-2"> central de atedimento </h5></a>
        </div>
        <div class ="col-md-4">
            
            <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="480" data-height="360" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
        </div>
      </div>
       <!--<h3>Green</h3>-->
      <p>Para nos você vale ouro, venha garantir sua melhor ferramenta </p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>fixar Parafusos e Cia</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/green-free-one-page-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">Thiago Batista</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

<!--Mapa Google Maps-->
<script type='text/javascript'
    src='https://maps.google.com/maps/api/js?key=AIzaSyDv7YRz1WWPhkr6aim8wEm4WDPBdk81z54'>
</script>


<!--Configurações do Google Maps-->
<script type='text/javascript'>
function init_map(){
    var myOptions = {
        zoom:17,
        // Coordenadas do IFTM-18.955414964613126, -46.98291433103899
        center:new google.maps.LatLng(-18.936238127732135, -46.982135347269455),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
    marker = new google.maps.Marker({
        map: map,
        // Coordenadas do IFTM-18.955414964613126, -46.98291433103899
        position: new google.maps.LatLng(-18.936238127732135, -46.982135347269455),
        icon: './assets/imagens/logo_maps.png'
            
    });

    infowindow = new google.maps.InfoWindow({
    content:'<strong>Fixar Parafusos e Cia - Consultório de Psicologia</strong><br>Presidente Vargas, 1280 - Sala 203<br>Edifício das Palmeiras<br>Patrocínio/MG'

    });

    infowindow.open({
        shouldFocus: false,
        anchor: marker

    });   

    google.maps.event.addListener(marker, 'click', function(){
    infowindow.open(map,marker);
    
    });
        
}
google.maps.event.addDomListener(window, 'load', init_map);

</script>


</body>

</html>