<?php $title = "Останні новини" ?>
<?php 
require "header.php"
?>

<?php 
	$mysqli = new mysqli('localhost','root','','cenatbase');
	$mysqli->query("SET NAMES utf8");
	$mysqli->query("SET CHARACTER SET utf8");
	$postNum = $mysqli->query("SELECT * FROM posts")->num_rows;
	$pgNum=ceil($postNum/10);
	$page = $_GET['page'];
	$from = ($page-1)*10;
	$res = $mysqli->query("SELECT * FROM posts ORDER BY id DESC LIMIT ".$from.",10");
?>
		<div style="display: flex;flex-wrap: nowrap;">
			<div class="main" id="mn" style="background-color:#F0F0F0;padding:40px;margin: 10px;width: 100%;overflow: hidden;">
				
				<div style="width: 100%">
					<div style="display: flex;flex-wrap: wrap;padding: 0;margin:0;align-items: center;">
						<?php 
						for (;$row = $res->fetch_assoc();): 
					?>
					<?php 
						$title = $row['title'];
						$dat= $row['dat'];
						$type = $row['type'];
						$picture_name = $row['dat']."_1.".$type."";
						$text  = $row['content'];
						$id = $row['id'];
						$short_text=array();
						$short_text = substr($text, 0,299);
					?>
					<form action="post.php" id="<?=$dat?>" method="post">
						<input type="hidden" value="<?=$id?>" name="id">
					</form>
					<div onclick="document.getElementById('<?=$dat?>').submit();" class="post" style="cursor:pointer;margin:1%;height:100%;position: relative;padding:  3px;">
						<h2 style="color:#333"><div style="background-color: rgb(0,158,210);;border-radius: 7px;color: white;display: inline;margin-right: 20px;padding:0 5px;"><?php echo date("d.m.Y",$dat) ?></div><?php echo $title ?></h2>
						<div style="width: 100%;position: relative">
							<img src="img/posts/<?php echo $picture_name?>"width="100%">
							<div style="position: absolute;width: 100%;height: 100%;top:0;left: 0;background: -moz-radial-gradient(center, ellipse cover,  rgba(0,0,0,0) 0%, rgba(0,0,0,0) 63%, rgba(0,0,0,0.65) 99%, rgba(0,0,0,0.65) 100%); /* FF3.6+ */background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(0,0,0,0)), color-stop(63%,rgba(0,0,0,0)), color-stop(99%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */background: -webkit-radial-gradient(center, ellipse cover,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 63%,rgba(0,0,0,0.65) 99%,rgba(0,0,0,0.65) 100%); /* Chrome10+,Safari5.1+ */background: -o-radial-gradient(center, ellipse cover,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 63%,rgba(0,0,0,0.65) 99%,rgba(0,0,0,0.65) 100%); /* Opera 12+ */background: -ms-radial-gradient(center, ellipse cover,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 63%,rgba(0,0,0,0.65) 99%,rgba(0,0,0,0.65) 100%); /* IE10+ *"></div>
						</div>
						<div style="color: #444;padding:0 20px; ">
							<?php echo $short_text ?>
						</div>
					</div>

					<?php endfor; ?>
					</div>
					<?php 
					function printPage($countPage, $actPage)
			{
				//если страниц 0 или 1, вернём пустой массив (переключатели не выводятся)
				if ($countPage == 0 || $countPage == 1) return array();
				if ($countPage > 10) //если страниц больше 10, заполним массив pageArray переключателями в зависимости от активной страницы
				{
					//если активная страница - одна из первых  или одна из последних страниц
					//то запишем в массив первые 5 и последние 5 переключателей, разделив их многоточием
					if($actPage <= 4 || $actPage + 3 >= $countPage)
					{
						for($i = 0; $i <= 4; $i++)
						{
							$pageArray[$i] = $i + 1;
						}
						$pageArray[5] = "...";
						for($j = 6, $k = 4; $j <= 10; $j++, $k--)
						{
							$pageArray[$j] = $countPage - $k;
						}			
					}
					else
					{
						$pageArray[0] = 1;
						$pageArray[1] = 2;
						$pageArray[2] = "...";
						$pageArray[3] = $actPage - 2;
						$pageArray[4] = $actPage - 1;
						$pageArray[5] = $actPage;
						$pageArray[6] = $actPage + 1;
						$pageArray[7] = $actPage + 2;
						$pageArray[8] = "...";
						$pageArray[9] = $countPage - 1;;
						$pageArray[10] = $countPage;			
					}
				}
				else 
				{
					for($n = 0; $n < $countPage; $n++)
					{
						$pageArray[$n] = $n + 1;
					}
				}
				return $pageArray;
			}
			printPage($pgNum, $$_GET['page']) ?>
					<div class="perecl">
								<ul class="paginator">
									<div class="row">
										<div class="col-3"></div>
										<div class="col-6">
											<div class="row justify-content-center">
													
														<div style="color:<?php if($page == 1) echo '#d9d9d9; cursor: initial;"'; else echo 'rgb(0,158,210)"';?><?php if($page!=1){ ?>onclick="location='http://cenat/news.php?page=<?php echo  ($page-1)?>'"<?php } ?>  class="switcher">
															&#9668;
														</div>
													
												<? foreach (printPage($pgNum, $_GET['page'])  as $v) { ?>
														<? if ($v != $page && $v != "...") { ?>
															<li><a href="/news.php?page=<?=$v;?>"><div class="col-1 nump justify-content-center">
														<?=$v;?>
														</div></a></li>
														<? } ?>
														<? if ($v == $page) { ?>
															<li><div class="col-1 active_page">
														<?=$v;?>
														</div></li>
														<? } ?>
														<? if ($v == "...") { ?>
															<li><div class="col-1 page_dots">
														<?=$v;?>
														</div></li>
														<? } ?>
												<? } ?>
													
														<div class="switcher" <?php if($page!=$pgNum){ ?>onclick="location='http://wtwd/news.php?page=<?php echo  ($page+1)?>'"<?php } ?> style="color:<?php if($page == $pgNum) echo "#d9d9d9"; else echo "rgb(0,158,210)";?>" >
															&#9658;
														</div>
													
											</div>
										</div>
										<div class="col-3"></div>
									</div>
								</ul>
					</div>
				</div>
				<div id="bar_mob" style="padding: 40px;color: #777;border-bottom: 1px solid white;margin-bottom: 10px">
					<div style="display: flex;width: 100%;flex-wrap: wrap;justify-content: space-around;">
						<div class="newsMenu">
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
						<div class="newsMenu">
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
			</div>
			<div id="bar_desc" style="width:25%;background-color:rgb(0,158,210);border-radius: 25px;margin: 5px;color: white;padding: 30px;">
				<div style="display: felx;flex-wrap: wrap;border-bottom: 1px solid white;height: auto;justify-content: center;width: 100%">
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
		<?php $mysqli->close(); ?>

<?php 
require "footer.php" ?>
</body>
</html>

