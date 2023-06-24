<?php
require_once("./cabecalho.php");?>
<!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contato</h2>
          <p>Precisa de parafusos de qualidade e ferramentas confiáveis? Nós temos a solução perfeita para você!</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Localidade:</h4>
                <p>Av. Faria Pereira, 1110 - Nossa Sra. de Fátima, Patrocínio - MG, 38744-546</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>contato@ferramentasparafusos.com.br</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telefone:</h4>
                <p>34999307070</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Nome</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Titulo</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Mensagem</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <!--<div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>-->
              <div class="text-center"><button type="submit">Enviar</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    
    <?php
        require_once("./cabecalho.php");?>