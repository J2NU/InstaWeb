<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="http://localhost/InstaWeb/" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/css/normalize.css" />
    <link rel="stylesheet" href="public/css/styles.css" />
    <title>About</title>
  </head>
  <body>
<?php require_once "./mvc/views/pages/" . $data["page"] . ".php"; ?>

    
<div id="cookies">
        <div class="content-center">
          <div class="cookies">
            <p>This website uses cookies.</p>
            <a href="">Check out</a>
            <button id="cookies-btn">Agree</button>
          </div>
        </div>
      </div>
</div>
      
    </main>
    <?php require_once "./mvc/views/block/footer.php"; ?>
    <script src="public/js/cookies.js"></script>
    <script src="public/js/chevron.js"></script>
    <script src="public/js/formcontrol.js"></script>
    <script src="public/js/validatepassword.js"></script>
    <script src="public/js/checkpassword.js"></script>
    <script src="public/js/sidebar.js"></script>
  </body>
</html>

