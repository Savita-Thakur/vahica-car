<?php
//get_template_part('templates/chat/chat');
?>

<script>
  jQuery(document).ready(function($) {
    // Function to check if the screen width is greater than a certain value (e.g., 768px for tablets)
    function isDesktop() {
      return window.innerWidth > 767;
      console.log(window.innerWidth);
    }

    if (isDesktop() && !localStorage.getItem('popupShown')) {
      $("#overlay_pop, #popuponload").fadeIn();

      $(".close-btn, #overlay_pop").click(function() {
        $("#overlay_pop, #popuponload").fadeOut();
        localStorage.setItem('popupShown', 'true');
      });
    }
  });
</script>

<?php wp_footer(); ?>
</body>
</html>