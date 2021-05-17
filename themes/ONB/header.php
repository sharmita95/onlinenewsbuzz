<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $uri = $_SERVER['REQUEST_URI'];
    $new_url = explode("/", $uri); ?>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <?php if (strpos($uri, '/page/') !== false) { ?>
      <meta name="robots" content="nofollow" />
    <?php } ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/megamenu-style.css">
    <link rel="icon" href="<?php echo abn_option('abn_favicon'); ?>" type="image/gif" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <?php
      require_once 'libs/scssphp-1.0.4/scss.inc.php';
      use ScssPhp\ScssPhp\Compiler;

      function getCSS($files)
      {
        
        try {
          $scss = new Compiler();
          $scss->setImportPaths('css/');
          $scssContent = "";

          foreach ($files as $file) {            
            $scssContent .= file_get_contents($file);
          }
          //echo "/*".$scssContent."*/";
          $css = $scss->compile($scssContent);
          echo "<style class='from-scss'>" . $css . "</style>";
        } catch (\Exception $e) {
          echo '';
          syslog(LOG_ERR, 'scssphp: Unable to compile content');
        }
      }
      ?>
    <?php wp_head(); ?>
    <meta property="og:image" content="<?php echo get_template_directory_uri().'/images/onb-og-icon.png'; ?>" />
    
    <meta name="twitter:site" content="@onlinenewsbuzz" />
    <meta name="twitter:image" content="<?php echo get_template_directory_uri().'/images/onb-og-icon.png'; ?>" />
	  
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3Q2SPS8946"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-3Q2SPS8946');
    </script>

  </head>

  <?php if(is_archive() || is_search()) { ?>
    <body <?php body_class('blog-listing'); ?>>
  <?php } elseif(is_single()) { ?>
    <body <?php body_class('blog'); ?>>
  <?php } else { ?>
  <body <?php body_class(); ?>>
  <?php } ?>

    <?php getCSS([
      get_template_directory_uri() . '/css/_mq.scss',
      get_template_directory_uri() . '/css/_colors.scss',
      get_template_directory_uri() . '/css/common.scss',
      get_template_directory_uri() . '/css/common-style.scss',
      get_template_directory_uri() . '/css/style.scss'
    ]); ?>

    <div id="return-to-top"><i class="fa fa-angle-up"></i></div>

    <header>

      <?php include('header-menu.php'); ?>
      
    </header>
    
   