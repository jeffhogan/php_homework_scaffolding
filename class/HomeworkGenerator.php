<?php

/**
 * Class to generate new homework directories
 * @author Jeffrey Hogan 072011
 **/
class HomeworkGenerator
{
   
   function __construct() {
      if ($_POST) {
         $this->init($_POST);
      }
   }

   /**
    * Initialization function to assemble and build template
    *
    * @return void
    * @author jhogan
    **/
   private function init($arr) { 

      if (!isset($_POST["page_title"]) || !isset($_POST["folder_name"]) || !isset($_POST["navigation"]) || !isset($_POST["homework_name"])) {
         echo '<h2 class="error">Please fill out all fields completely</h2>';
      } else {

         $folder_name = strip_tags($_POST["folder_name"]);
         $page_title = strip_tags($_POST["page_title"]);
         $navigation = explode(",", strip_tags($_POST["navigation"]));
         $homework_name = strip_tags($_POST["homework_name"]);

         $structure_css = "../$folder_name/css";
         mkdir($structure_css, 0777, true);
         $structure_assets = "../$folder_name/assets";
         mkdir($structure_assets, 0777, false);
         $structure_main = "../$folder_name";

         $this->head($navigation, $page_title, $homework_name, $structure_main);
         $this->index($structure_main);
         $this->footer($structure_main);
         $this->css($structure_main);
         $this->copyAssets($structure_main);
      }
   }

   /**
    * undocumented function
    *
    * @return void
    * @author Me
    **/
   private function copyAssets($structure_main) {

      $structure_assets = $structure_main . "/assets/";
      $logo = $structure_assets . "sql_php_icon.png";
      $bk = $structure_assets . "background.jpg";
      $local_logo = "class/assets/sql_php_icon.png";
      $local_background = "class/assets/background.jpg";

      copy($local_logo, $logo);
      copy($local_background, $bk);

   }

   /**
    * Function to create the header.php file
    *
    * @return void
    * @author jhogan
    **/
   private function head($navigation, $page_title, $homework_name, $structure_main) {

      $nav = "";
      foreach($navigation as $button) {
         if($button != "") {
            $nav .= '<li><a href="#">' . trim($button) . '</a></li>';
         }
      }

      $headerData = '
         <!DOCTYPE HTML>
         <html lang="en-us">
         <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8">

            <title>' . $page_title . '</title>
            <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" >
            <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" >
            <link href="http://fonts.googleapis.com/css?family=Orbitron:400,500,700,900&v2" rel="stylesheet" type="text/css">
            
         </head>

            <header>
               <img src="assets/sql_php_icon.png" alt="Php Icon" />  
               <hgroup>
               
                  <h1>' . $homework_name . '</h1>
                  <h2>' . $page_title . '</h2>  

               </hgroup>

                  <nav>
            
                     <ul>' . $nav .
                     '</ul>

                  </nav>

            </header>

         ';
      
      $structure_header = $structure_main . "/header.php";
      file_put_contents($structure_header, $headerData);

   }
   /**
    * Function to create the index.php file
    *
    * @return void
    * @author jhogan
    **/
   private function index($structure_main) {

      $indexData = '
         
         <?php include "header.php";?>
         <body>

         </body>
         <?php include "footer.php";?>

      ';

      $structure_index = $structure_main . "/index.php";
      file_put_contents($structure_index, $indexData);

   }

   /**
    * Function to create the footer.php file
    *
    * @return void
    * @author jhogan
    **/
   private function footer($structure_main) {

      $footerData = '

            <footer>

               <small>Created for educational purposes | &copy; 2011 Jeffrey Hogan</small>

            </footer>

            
         </body>
         </html>

      ';

      $structure_footer = $structure_main . "/footer.php";
      file_put_contents($structure_footer, $footerData);

   }

   /**
    * Function to create the css files
    *
    * @return void
    * @author jhogan
    **/
   private function css($structure_main) {

      $reset = '
         html, body, div, span, applet, object, iframe,
         h1, h2, h3, h4, h5, h6, p, blockquote, pre,
         a, abbr, acronym, address, big, cite, code,
         del, dfn, em, img, ins, kbd, q, s, samp,
         small, strike, strong, sub, sup, tt, var,
         b, u, i, center,
         dl, dt, dd, ol, ul, li,
         fieldset, form, label, legend,
         table, caption, tbody, tfoot, thead, tr, th, td,
         article, aside, canvas, details, embed, 
         figure, figcaption, footer, header, hgroup, 
         menu, nav, output, ruby, section, summary,
         time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
         }
         /* HTML5 display-role reset for older browsers */
         article, aside, details, figcaption, figure, 
         footer, header, hgroup, menu, nav, section {
            display: block;
         }
         body {
            line-height: 1;
         }
         ol, ul {
            list-style: none;
         }
         blockquote, q {
            quotes: none;
         }
         blockquote:before, blockquote:after,
         q:before, q:after {
            content: \'\';
            content: none;
         }
         table {
            border-collapse: collapse;
            border-spacing: 0;
         }

      ';
                  

      $style = '
         /***** Generic Styles *****/
         html {
            background-image: url("../assets/background.jpg");
            height: 100%;
            font-family: Arial, sans-serif;
         }

         body { 
            height: 100%;
            width: 800px;
            background-color: #fff;
            margin: 0 auto;
            position: relative;
            padding: 1px 0 0 0;

            -webkit-box-shadow: 0px 2px 6px #000000;
            -moz-box-shadow: 0px 2px 6px #000000;
            box-shadow: 0px 2px 6px #000000;

            background: #cedce7;
            background: -moz-linear-gradient(top, #cedce7 0%, #596a72 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cedce7), color-stop(100%,#596a72));
            background: -webkit-linear-gradient(top, #cedce7 0%,#596a72 100%);
            background: linear-gradient(top, #cedce7 0%,#596a72 100%);
                  
         }

         hgroup {
            width: 445px;
            float: left;
         }
            h1 {
               margin: 0 0 6px 0;
               font-size: 25px;
               font-weight: bold;
               font-family: \'Orbitron\', sans-serif; 
            }

            .error {
               margin: 0 0 10px 10px;
               font-family: \'Orbitron\', sans-serif;
               color: red;
            }

            #main h2 {
               margin: 30px 0 10px 0;
               font-weight: bold;
            }
            p {
                margin: 0 0 5px 0;
            }

         header {
            margin: 20px auto 16px auto;
            width: 780px;
            height: 70px;
            border-bottom: 1px solid #fff;
            positon: relative;
         }
            header:after {
               position: absolute;
               content: \'\';
               width: 779px;
               height: 69px;
               border-bottom: 1px solid #596a72;
               left: 10px;
            }
            header ul li {
               display: block;
               float: left;
               margin-right: 15px;
            }
            nav {
               position: relative;
               float: right;
               margin: 33px -10px 0 0;      
               z-index: 2;
            }
            header img {
               float: left;
               position: relative;
               margin: -12px 8px  0 0;
            }

         #main {
            margin-left: 10px;
         }
            #main ul {
               list-style: disc;
               margin: 20px 0 0 20px;
            }
            #main img {
               margin: 10px 0 20px 0;
            }
            #main p {
               text-align: justify;
               width: 700px;
            }

         fieldset {
         }
            legend {
               font-style: italic;
            }
            input[type="textarea"] {
               width: 200px;
               height: 20px;
               margin: 10px 0 10px 0;
            }

         select {
            margin: 10px 0 10px 0;
         }

         /*** Forms ***/
         #tabulator {
            margin: 0 0 0 10px;
            width: 350px;
         }

         #tabulator input, #tabulator p, #tabulator select {
            float: left; 
            clear: both;
         }

         .input_long {
            width: 250px;
            margin-bottom: 16px;
         }

         footer {
            clear: both;
            bottom: 20px;
            position: absolute; 
            width: 780px;
            height: 25px;
            margin-left: 10px;

            border-top: 1px solid #333;
         }
            footer:after {
               width: 780px;
               position: absolute;
               height: 24px;
               content: \'\';
               border-top: 1px solid #cedce7;
               left: 0;
            }
            footer small {
               font-size: 10px;     
               top: 20px;
               position: absolute;
            }

         /*** Links ***/
         a {
            color: #000;
            text-decoration: none;
         }  
            a:hover {
               color: #fff;
            }
               
      ';

      $structure_reset = $structure_main . "/css/reset.css";
      file_put_contents($structure_reset, $reset);

      $structure_style = $structure_main . "/css/style.css";
      file_put_contents($structure_style, $style);

   }

   
}



?>
