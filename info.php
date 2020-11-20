<?php 
	include ("config.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<br>
	<div id="info">
		<p><strong>DuyVo Studio</strong> <?php echo $lang['info1'] ?></p>
		<p><?php echo $lang['info2'] ?></p>
		<p><?php echo $lang['info3'] ?></p>
		<p><?php echo $lang['info4'] ?> <strong>DuyVo Studio</strong> <?php echo $lang['info5'] ?></p>

	<img style="width: 900px; height: 597px;" src="/private.jpg">
	</div>
	<br>

	<div class="animate__animated animate__flash" id="slogan"><p><strong><?php echo $lang['slogan'] ?></strong></p></div>
	<br>
	<div>	
		<div style="justify-content: center; display: flex;">
		<video width="80%" height="460" autoplay loop preload >
			<source src="hehe.mp4" type="video/mp4">
		</video>
	</div>
	<br>

	<div style="justify-content: center; display: flex;">
		<video width="25%" height="450" autoplay loop preload muted>
			<source src="kaka1.mp4" type="video/mp4">
		</video>

		<video width="25%" height="450" autoplay loop preload muted>
			<source src="kaka.mp4" type="video/mp4">
		</video>
	</div>
	</div>
	
	<br>
	
	

</body>
</html>