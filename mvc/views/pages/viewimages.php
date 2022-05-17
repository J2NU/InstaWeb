
<header>
      <nav class="nav">
        <a href="viewimages.html"
          ><img src="public/assets/img/logo.png" class="logo-main" alt=""
        /></a>
        <!-- <div class="input-group">
          <input type="text" class="input" placeholder="Search" />
          <button class="btn">Search</button>
        </div> -->
        <div class="icon-group">
          <!-- <div class="icon">
            <img src="public/assets/img/search.png" class="search" alt="" />
          </div> -->
          <div class="profile-pic">
            <img src="public/assets/img/oranges.jpg" alt="" />
          </div>
        </div>
      </nav>
    </header>
    <main>
    <section class="image-share content_center">
        <div class="image-share-wrapper">
          <div class="profile-pic full-image"><img src="public/assets/img/oranges.jpg"></div>
          <div class="image-share-button"><button class="btn" onclick="openForm()">Share image</button></div>
        </div>
        </div>
      </section>
      <!--Popup for uploading image-->
      <div class="form-popup content_center" id="myForm">
      <form class="form-container" action="./User/ShareImage" method="post" enctype="multipart/form-data">
        <input type="file" name="fileupload" id="fileupload">
          <textarea
          name="description"
          id="description"
          class="form__description"
          cols="30"
          rows="3"></textarea>
          <div>
            <input type="radio" name="level" id="public" value=0 />
            <label for="public">Public</label>
          </div>
          <div>
            <input type="radio" name="level" id="internal" value=1 />
            <label for="internal">Internal</label>
          </div>
          <div>
            <input type="radio" name="level" id="private" value=2 />
            <label for="private">Private</label>
          </div>
        <input type="submit" class="btn form__btn" value="Upload" name="Submit" />
      </form>
      </div>
    

      <!--Photo zone-->
      <?php
        //hứng kết quả truyền qua từ Musicmodel từ Home.php
        $arrPostLink = [];
        $arrPostDes = [];
        $arrNameOwner = [];
        $arrAvaOwner = [];
        if(isset($data["post"])){
          while($row = mysqli_fetch_array($data["post"])){
            // echo $row["PostLink"];
            array_push($arrPostLink, $row["Post_Img"]);
            array_push($arrPostDes, $row["Descript"]);
            array_push($arrNameOwner, $row["First_name"]." ".$row["Last_name"]);
            array_push($arrAvaOwner, $row["Ava_Img"]);
          }
        }
        $c = count($arrPostLink);
        for ($x = 0; $x < $c; $x++) {
          echo('<section class="image-content content_center">');
          echo('<div class="image-content-top">');
          echo('<div class="profile-pic full-image">');
        
          echo('<img src="'.$arrAvaOwner[$x].'" alt="" />');
          echo('</div>');
          echo('<p>'.$arrNameOwner[$x].'</p>');
          echo('</div>');
          echo('<div class="image-content-main">');
          echo('<img src="'.$arrPostLink[$x].'" alt="" />');
          echo('</div>');
          echo('<div class="image-content-desc">');
          echo('<p>'.$arrPostDes[$x].'</p>');
          echo('</div>');
          echo('</section>');
        }
        
      ?>
      <div id="cookies">
        <div class="container">
          <div class="cookies">
            <p>This website uses cookies.</p>
            <a href="">Check out</a>
            <button id="cookies-btn">Agree</button>
          </div>
        </div>
      </div>
    </main>
    