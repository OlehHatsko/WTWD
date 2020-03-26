<?php 
$mysqli = new mysqli('localhost','root','','cenatbase');
$mysqli->query("SET NAMES utf8");
$mysqli->query("SET CHARACTER SET utf8");
$res = $mysqli->query("SELECT * FROM posts WHERE id='".$_POST['id']."'")->fetch_assoc();
$views=$res['views']+1;
$mysqli->query("UPDATE `posts` SET `views`=$views WHERE id='".$_POST['id']."'");
$title = $res['title'];
$content = $res['content'];
$key = $res['dat'];
$type = $res['type'];
$phNum = $res['phNum'];  
?>
<?php 

require "header.php"
?>
<div style="display: flex;flex-wrap: nowrap;">
<div class="post main" style="width: 100%;padding: 40px;background-color:#F0F0F0;">
	<div id="bar_mob" style="display:none;padding: 40px;color: #777;border-bottom: 1px solid white;margin-bottom: 10px">
					<div style="display: flex;width: 100%">
						<div style="width: 50%">
							<h2 align="center" style="display: flex;flex-wrap: nowrap;height: 50px"><img src="img/star.svg" height="35px" width="35px" alt=""><div style="padding-top: 1.5px">ТОП 5</div></h2>
					<div style="width: 100%;top: 0">
						<ol>
							<?php 
							$top = $mysqli->query("SELECT * FROM `posts` ORDER BY `views` DESC");
							$i=1;
							for(;$point = $top->fetch_assoc();):
							 ?>
								<?php if($i==6) break; ?>
								
								<li>
									<?php $id = $point['id']."_top";$title=$point['title']; ?>
									<form action="post.php" id="<?=$id?>" method="post">
										<input type="hidden" value="<?=$id?>" name="id">
									</form>
									<div class="point" style="cursor: pointer;" onclick="document.getElementById('<?=$id?>').submit()"><h5><?php echo $title ?></h5></div>
								</li>

							 <?php $i++;endfor; ?>
						</ol>
					</div>
						</div>
						<div style="width: 50%">
							<?php $recommended = $mysqli->query("SELECT * FROM `posts` WHERE `recommended`=1 ORDER BY `dat` DESC");if($recommended->num_rows != 0 ): ?>

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

			<?php endif; ?>
						</div>
					</div>
				</div>
		<h1 align="center"><?=$title?></h1>
	<div class="container">
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">

  <div class="carousel-inner" role="listbox">
  	<div class="carousel-item active">
      <img class="d-block w-100" src="img/posts/<?php echo $key.'_1.'.$type;?>"
        alt="First slide">
    </div>
     <?php for ($i=2; $i <= $phNum ; $i++):?>
		<div class="carousel-item ">
      <img class="d-block w-100" src="img/posts/<?php echo $key.'_'.$i.'.'.$type;?>"
        alt="First slide">
    </div>
    <?php endfor; ?>
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		<div class="container">
		  <div class="container">
		  	<?=nl2br($content)?>
		  	<?=$phNum?>
		  </div>
		</div>
	</div>
</div>
<br><br>
<hr>
<?php 
$res = $mysqli->query("SELECT * FROM `comments` WHERE `for`=$key ORDER BY `date`");
?>
<div style="background-color: rgb(153, 153, 255,0.28);padding: 30px" class="container">
	<h2>Коментарі(<?php echo $res->num_rows ?>)</h2>
<hr>
<div class="container">
<?php for(;$comment = $res->fetch_assoc();): ?>

<div style="width: 100%;display: flex;justify-content: space-between;background-color: rgb(0, 0, 77,0.15);padding: 18px">
	<div>
		<h4><?php echo $comment['author'] ?></h4>
		<div style="font-size: 0.8em;color: white">
			<?php echo $comment['content']; ?>
		</div>
	</div>
	<div>
		<div style="background-color: black;border-radius: 7px;color: white;display: inline;margin-right: 20px;padding:0 5px;"><?php echo date("d m Y\nH:i",$comment['date']) ?></div>
	</div>
</div>
<hr>

<?php endfor; ?>
</div>
<script>
	function check()
	{
		if(!author.value||!content.value) {document.getElementById('message_error').style.display="flex";}
		else
		{
			document.getElementById('comment').submit()
		}
	}
</script>
<hr>
<div style="background-color: rgb(0,0,0,0.1);padding: 18px">
	Додати коментар:
<div id="message_error"style="display:none" class="alert alert-danger"><img src="img/error.svg" height="40px" width="40px" style="opacity: 0.4;margin-right: 10px">Введіть, будь ласка, дані</div>
<form action="comment_adding.php" method="post" id="comment">
	<input type="hidden" name="key" value="<?php echo	$key; ?>">
	<input class="form-control" type="text" placeholder="Як вас звуть?" name="author" id="author"><br>
	<textarea class="form-control" name="content" id="content" placeholder="Коментар" cols="30" rows="10"></textarea>
</form><br>
<div style="width: 100%;display: flex;justify-content: flex-end;">
	<button class="btn btn-success" onclick="check()">Додати коментар</button>
</div>
</div>
<hr>
</div>
<div style="display: flex;flex-wrap: wrap;justify-content: center;width: 100%;padding: 50px;background-color: #F3F3F3">
          <h2 align="center" style="display: flex;flex-wrap: nowrap;height: 50px;width: 100%;margin-bottom:30px;"><img src="img/star.svg" height="35px" width="35px" alt=""><div style="padding-top: 1.5px">Люди також дивляться</div></h2>
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
</div>

<div id="bar_desc" style="width:25%;background-color:rgb(0,158,210);border-radius: 25px;margin: 5px;color: white;padding: 30px;">
				<div style="display: flex;flex-wrap: wrap;border-bottom: 1px solid white;height: auto;justify-content: center;width: 100%">
					<h2 align="center" style="display: flex;flex-wrap: nowrap;height: 50px"><img src="img/star.svg" height="35px" width="35px" alt=""><div style="padding-top: 1.5px">ТОП 5</div></h2>
					<div style="width: 100%;top: 0">
						<ol>
							<?php 
							$top = $mysqli->query("SELECT * FROM `posts` ORDER BY `views` DESC");
							$i=1;
							for(;$point = $top->fetch_assoc();):
							 ?>
								<?php if($i==6) break; ?>
								
								<li>
									<?php $id = $point['id']."_top";$title=$point['title']; ?>
									<form action="post.php" id="<?=$id?>" method="post">
										<input type="hidden" value="<?=$id?>" name="id">
									</form>
									<div class="point" style="cursor: pointer;" onclick="document.getElementById('<?=$id?>').submit()"><h5><?php echo $title ?></h5></div>
								</li>

							 <?php $i++;endfor; ?>
						</ol>
					</div>
				</div>
				<?php $recommended = $mysqli->query("SELECT * FROM `posts` WHERE `recommended`=1 ORDER BY `dat` DESC");if($recommended->num_rows != 0 ): ?>

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

			<?php endif; ?>
			</div>
		</div>

		<?php 
		$mysqli->close();  ?>
<?php 
require "footer.php" ?>
</body>
</html>