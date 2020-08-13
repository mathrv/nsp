</div>
  <footer id="footer" class="footer">
    <div class="footer-container">
    <div class="footer-social">
      <a href="https://twitter.com/nantesspression" target="_blank">
        <img src="<?= get_stylesheet_directory_uri();?>/img/Twitter.png">
      </a>
      <a href="https://www.instagram.com/nantessouspression/" target="_blank">
        <img src="<?= get_stylesheet_directory_uri();?>/img/Instagram.png">
      </a>
      <a href="https://www.facebook.com/NantesSousPression/" target="_blank">
        <img src="<?= get_stylesheet_directory_uri();?>/img/Facebook.png">
      </a>
    </div>
    <div class="footer-links">
      <div class="footer-block">
        <h5>Le Festival</h5>
        <div class="footer-block-link">
          <a href="<?= get_the_permalink(21); ?>">Faq</a>
          <a>Dossier de presse</a>
        </div>
      </div>
      <div class="footer-block">
        <h5>Renseignements</h5>
        <div class="footer-block-link">
          <a href="<?= get_the_permalink(19); ?>">Contact</a>
        </div>
      </div>
      <div class="footer-block">
        <h5>L'association</h5>
        <div class="footer-block-link">
          <a href="<?= get_the_permalink(11); ?>">A propos</a>
          <a href="<?= get_the_permalink(444); ?>">1ère édition du festival</a>
        </div>
      </div>
      <div class="footer-block">
        <h5>Conditions générales</h5>
        <div class="footer-block-link">
          <a href="<?= get_the_permalink(136); ?>">Mentions légales</a>
          <a href="<?= get_the_permalink(140); ?>">Plan du site</a>
        </div>
      </div>
    </div>
    </div>
     <?php wp_footer(); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>
</html>
