
<?php 
require "header.php";
?>

<div class="div" style="width: 	100%;margin: 	0;padding: 0; margin-top:-30px;background-color: 	white;display: flex;justify-content: center" >	
  <div style="position: relative; margin: 0;padding: 0;width: 100%">
    <div id="carouselExampleIndicators" data-interval="false" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div id class="carousel-item active" style="position: relative;">
          <img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQJxO93FFjdg5xhSH3GZSsFVPFeSWyio8u-1RSxmm6BY9s8-jcr" alt="First slide">
        </div>
        <div class="carousel-item" style="position: relative;">
          <img class="d-block w-100" src="img/1300x500.jpg" alt="Second slide">
        </div>
        <div class="carousel-item" style="position: relative;">
          <img class="d-block w-100" src="img/animbg.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<div class="main" id="mn" style="background-color:white;padding:40px;color: black;">
  <?php   $mysqli = new mysqli('localhost','root','','cenatbase');
  $mysqli->query("SET NAMES utf8");
  $mysqli->query("SET CHARACTER SET utf8"); ?>
  <hr>
  <div style="width: 100%;">
    <div style="margin:10px;background-color: #F3F3F3;width: 100%;display: flex; color: black;justify-content: center;align-items: center;flex-wrap: wrap;padding: 10px">
      <div id="joinBunner">
      <h1 align="center" style="transform: rotate(-2deg);">Хочеш спробувати себе в танцях???<br>Записуйся на заняття в CENAT!!!</h1>
      <style>
        #subs:hover #puk
        {
          transform: scale(1.3) rotate(362deg);
          transition: 0.2s;
        }
      </style>
      <div style="width: 100%;padding: 80px 0;display: flex;justify-content: center">
        <div id="subs" style="width: 100%;height:100%;display: flex;align-items: center;justify-content: center;">
          <div onclick="window.location.href = 'joinus.php'" id="puk" style="transition: 0.1s;align-items:center;justify-content: space-around;display: flex;flex-wrap: nowrap;border-radius: 5px;border-left: 2px solid white;border-right: 2px solid white;padding: 15px;background-color: rgb(42, 162, 42,0.8);cursor: pointer; color :white ">
                <div class="pict" style="display: flex;justify-content: right">
                    <img src="../img/note.svg" style="filter: invert(1);" width="30px" height="30px" alt="">
                </div>
              Пробне&nbsp;заняття
           </div>
       </div>
      </div>
    </div>
    <?php $recommended = $mysqli->query("SELECT * FROM `posts` WHERE `recommended`=1 ORDER BY `dat` DESC");if($recommended->num_rows != 0 ): ?>

        <div id="recommendIndex" style="display: flex;align-items: center;justify-content: center">
          <div>
            <h2 align="center" style="display: flex;flex-wrap: nowrap;height: 50px"><img src="img/recommend.svg" height="35px" width="35px" alt=""><div style="padding-top: 1.5px">Рекомендовано</div></h2>
          <ul>
          <?php $i=1;for(;$point = $recommended->fetch_assoc();): ?>    
          <?php if($i==6) break; ?>

            <li>
              <?php $id = $point['id']."_rec";$title=$point['title']; ?>
                  <form action="post.php" id="<?=$id?>" method="post">
                    <input type="hidden" value="<?=$id?>" name="id">
                  </form>
                  <div class="point" style="cursor: pointer;" onclick="document.getElementById('<?=$id?>').submit()"><h4><?php echo $title ?></h4></div>
            </li>

          <?php endfor; ?>  
          </ul> 
          </div>  
        </div>

      <?php endif; ?>
    </div>
  </div>
<hr>
  <div style="display: flex;flex-wrap: wrap;justify-content: center;width: 100%;padding: 50px;background-color: #F3F3F3">
          <h2 align="center" style="display: flex;flex-wrap: nowrap;height: 50px;width: 100%"><img src="img/star.svg" height="35px" width="35px" alt=""><div style="padding-top: 1.5px">ТОП 5</div></h2>
              <style>
                .point:hover h5
                {
                  color: #303747;
                  border-bottom: 0.5px solid #303747;
                  transition: 0.05s
                }
              </style>
              <?php 
              $top = $mysqli->query("SELECT * FROM `posts` ORDER BY `views` DESC");
              $i=1;
              for(;$point = $top->fetch_assoc();):
               ?>
               <?php $title = $point['title'];
            $dat= $point['dat'];
            $type = $point['type'];
            $picture_name = $point['dat']."_1.".$type."";
            $text  = $point['content'];
            $id = $point['id']; 
            $short_text=array();
            $short_text = substr($text, 0,299);?>
                <?php if($i==6) break; ?>
                
                
                  <?php $id = $point['id']."_top";?>
                  <form action="post.php" id="<?=$id?>" method="post">
                    <input type="hidden" value="<?=$id?>" name="id">
                  </form>

                  <div class="polaroid"  onclick="document.getElementById('<?=$id?>').submit()">
                    <div  class="topTitle" style="display: block;overflow: hidden;height: 20px">
                      <h3 style="font: 400 18px/1 'Kaushan Script', cursive;color:#777"><?php echo $title ?></h3>
                    </div>
                    <div style="padding: 10px;color:#888">
                      <img src="img/posts/<?=$picture_name?>" width="50%" alt="">
                      <?php echo $short_text; ?>
                    </div>
                  </div>
                
               <?php $i++;endfor; ?>
        </div>
        <?php $mysqli->close() ?>
        <hr>
</div>
<?php 
require "footer.php" ?>
</body>
</html>