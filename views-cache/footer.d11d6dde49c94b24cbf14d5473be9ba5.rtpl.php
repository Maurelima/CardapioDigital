<?php if(!class_exists('Rain\Tpl')){exit;}?><footer class="page-footer">
    <div class="container">
        <div class="links">
            <a href="https://www.facebook.com/pg/armazem82/about/?ref=page_internal" target="_blank">Sobre Nós</a>
            <a href="https://www.facebook.com/pg/armazem82/about/?ref=page_internal" target="_blank">Contato</a>
            <a href="#">by maurelima@gmail.com</a></div>
        <div class="social-icons">
            <a href="https://www.facebook.com/armazem82/?ref=search&__tn__=%2Cd%2CP-R&eid=ARCEnW_cYbcwdy1UjNLkGqF5cToMBS44z7_qtrLv7zFr3vkRewdI9dTBqUbRWw03vqVhj6_n55JUP1Lh" target="_blank"><i class="icon ion-social-facebook"></i></a>
            <a href="https://www.instagram.com/armazem82/" target="_blank"><i class="icon ion-social-instagram-outline"></i></a>
            <a href="#"><i class="icon ion-social-twitter"></i></a></div>
    </div>
</footer>
<script src="/res/cardapio/assets/js/jquery.min.js"></script>
<script src="/res/cardapio/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
<script src="/res/cardapio/assets/js/theme.js"></script>

<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");
    
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>

</body>

</html>