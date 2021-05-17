<?php $fb = abn_option('abn_fb_link');
$tt = abn_option('abn_tweet_link');
$ig = abn_option('abn_ig_link');
$pl = abn_option('abn_pinterest_link');
$li = abn_option('abn_li_link'); ?>

<!-- =============brand slid============= -->
<!--<div class="clir-fix"></div>-->
<footer>
  <div class="container">
    <div class="card-group">

      <div class="f-card">
        <h5>Useful Links</h5>
        <?php wp_nav_menu(array(
          'theme_location' => 'main_footer',
          'container' => 'ul',
          'menu_class' => '',
        )); ?>
        <a href="https://dashboard.accessily.com/register/referral?rf=mashummollah" class="accessily-verification">
          <img src="https://accessily.com/img/Accessily_badge.png" id="787857142835841_accessily_14166" width="80px">
        </a>
      </div>
      
      <div class="f-card">
        <h5>Categories</h5>
        <?php wp_nav_menu(array(
          'theme_location' => 'category_footer',
          'container' => 'ul',
          'menu_class' => 'category-menu',
        )); ?>
        
      </div>
      <!-- <div class="f-card">
            <h5>categories</h5>
            <?php /* wp_nav_menu(array(
                'theme_location' => 'main_footer',
                'container' => 'ul',
                'menu_class' => '',
            )); */ ?>            
          </div> -->
      
      
      <div class="f-card">
        <h5>Site Links</h5>
        <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>

      </div>
    </div>

    <div class="socil">
      <ul>

        <?php if (!empty($fb)) { ?>
          <li>
            <a href="<?php echo $fb; ?>"><i class="fab fa-facebook-f"></i></a>
          </li>
        <?php }
        if (!empty($tt)) { ?>
          <li>
            <a href="<?php echo $tt; ?>"><i class="fab fa-twitter"></i></a>
          </li>
        <?php }
        if (!empty($li)) { ?>
          <li>
            <a href="<?php echo $li; ?>"><i class="fab fa-linkedin"></i></a>
          </li>
        <?php }
        if (!empty($ig)) { ?>
          <li>
            <a href="<?php echo $ig; ?>"><i class="fab fa-instagram"></i></a>
          </li>
        <?php }
        if (!empty($pl)) { ?>
          <li>
            <a href="<?php echo $pl; ?>"><i class="fab fa-pinterest-p"></i></a>
          </li>
        <?php } ?>
      </ul>
    </div>

    <div class="row footer-bottom">
      <div class="col-md-6">
        <p class="text-md-right" style="margin-right: 12px;">
          <span class="no-wrap">&copy; <?php echo date('Y'); ?> - Online News Buzz.</span>
          <span class="no-wrap">All Rights Reserved. </span>
        </p>
      </div>
      <div class="col-md-6">
        <p class="no-wrap ">
          Designed and Developed by
          <a target="_blank" rel="noopener" href="https://www.viacon.in/">Viacon</a>
        </p>
      </div>
    </div>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.1/holder.min.js"></script>



<script>
  jQuery(document).ready(function($) {

      let images = document.getElementsByTagName("img");
      for (var i = 0; i < images.length; i++) addAlt(images[i]);
      //adds alt value from file name
      function addAlt(el) {
        
        if (el.getAttribute("alt")) return;

        url = el.src;
        //console.log(el);
        let filename = url.substring(url.lastIndexOf("/") + 1);
        
        filename = filename
          .split(".")
          .slice(0, -1)
          .join(".");
          
        if(!filename) { filename = 'onb-post-img'; }
        el.setAttribute("alt", filename);
        //console.log("added alt: " + filename);
      }

      /********************************************/
      $('a').each(function() { //External link open in new tab
        var a = new RegExp('/' + window.location.host + '/');
        if (this.href && !a.test(this.href)) {
          $(this).click(function(event) {
            event.preventDefault();
            event.stopPropagation();
            window.open(this.href, '_blank');
          });
        }
      });

      /******************** Mega Menu **********************/
      $('#navbarSupportedcontent li').addClass('nav-item');
      $('#navbarSupportedcontent li a').addClass('upper nav-link');
      $('body.blog article p').addClass('d-text');

      $('#open-search i').on('click', function() {
        $('.search-form').show();
      });

      $('.dropdown-menu').on('click', function(e) {
        e.stopPropagation();
      });

      $('.dropdown-menu .list-links li a').click(function(e) {
        e.preventDefault();
        $('.dropdown-menu .defaultshow, .show-dat').hide();
        var d = $(this).data('name');
        var defaultid = $('#' + d + '-post').parents(".dropdown-menu").find('.defaultShow').attr("id");
        //console.log(defaultid);
        $('#' + defaultid).hide();
        $('#' + d + '-post').show();
      });

      $('.dropdown-menu li a').click(function() {
        $('.dropdown-menu.show').find('li').removeClass('active-data');
        $(this).closest('li').addClass('active-data');
      });

      $('.nav-item i').click(function() {
        $('.dropdown-menu').removeClass('show');
        $(this).next().toggleClass('show');
      });


      $('li.nav-item > a').click(function() {
          
        $('a.nav-link.menu-text').removeClass('open');
          
        $('li.nav-item.show > a').not(this).closest('li').prev('a').removeClass('open');

        if ($(this).closest('li').prev('a').hasClass("open"))
          $(this).closest('li').prev('a').removeClass('open');
        else
          $(this).closest('li').prev('a').addClass('open');
      });
      /******************** Mega Menu End **********************/

  });
</script>

<?php wp_footer(); ?>




</body>

</html>