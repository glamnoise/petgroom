<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>PetGroom - management</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css' />
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js'></script>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <div class="content">
          <h1><a href="<?php echo url_for('job/index') ?>">
                  <img src="/images/petgroomlogo.png" alt="Pet Groom" />
          </a></h1>



            <div>
                <div id="navigazione">
                    <ul>
                          <li><?php echo link_to('User', 'user/index') ?></li>
                          <li><?php echo link_to('Dog', 'dog/index') ?></li>
                          <li><?php echo link_to('Breed', 'breed/index')?></li>
                          <li><?php echo link_to('Appointment', 'appointment/index')?></li>
                        
      

                  </ul>
            </div>
           
              </div>
            </div>
          </div>




      

      <div id="content">
        <?php if ($sf_user->hasFlash('notice')): ?>
          <div class="flash_notice">
            <?php echo $sf_user->getFlash('notice') ?>
          </div>
        <?php endif; ?>

        <?php if ($sf_user->hasFlash('error')): ?>
          <div class="flash_notice">
            <?php echo $sf_user->getFlash('error') ?>
          </div>
        <?php endif; ?>

        <div class="contenuto">
          <?php echo $sf_content ?>
        </div>
      </div>

      <div id="footer">
        <div class="content">
          <span class="symfony">
              <img src="images/petgroomlogo-small.png" />
            powered by FED <a href="http://www.exolut.com/">
                <img src="images/fedlogo.png" alt="Fodriga Emanuele Develop" />
            </a>
          </span>
          <ul>
            <li><a href="">About PetGroom</a></li>
            <li class="feed"><a href="">Full feed</a></li>
            <li><a href="">PetGroom API</a></li>
            <li class="last"><a href="">Affiliates</a></li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>