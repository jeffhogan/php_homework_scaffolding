<?php include 'meta.php'; ?>
<?php include 'class/HomeworkGenerator.php'; ?>
<body>

   <?php include 'header.php'; ?>

   <?php
      clearstatcache();
      if (isset($_POST["formFilled"])) {
         $hg = new HomeworkGenerator();
      }
   ?>

    <form action="" method="post" id="tabulator">

      <p>Please name your new folder:</p> 
       <input class="input_long" type="text" name="folder_name" >
      <p>Please add a title for your page:</p>
       <input class="input_long" type="text" name="page_title" > 
      <p>Please add a name for your homework:</p>
       <input class="input_long" type="text" name="homework_name" > 
      <p>Please add a list of the navigation you'd like:</p>
       <input class="input_long" type="text" name="navigation" >
       <input type="hidden" name="formFilled" value="true"> 
       <p><input type="submit" value="Submit"></p>
    
    </form>



   <?php include 'footer.php'; ?>
