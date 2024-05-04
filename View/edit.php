<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sửa sách</title>
</head>

<body>
	<h2>Sửa sách</h2>
	<form method="POST">
		<input name="masach" type="hidden" value="<?php echo $sach->masach?>">
		<label for="tensach">Tên sách</label> </br>
		<input name="tensach" type="text" value="<?php echo $sach->tensach?>">
		<label for="matg">Tác giả</label> </br>
		
		<select name="matg">
			<?php foreach ($tg as $tacgia){?>
				<option <?php if ($sach->matg == $tacgia->matg) echo "selected"?> value="<?php echo $tacgia->matg?>"><?php echo $tacgia->tentg?></option>
			<?php }?>
		</select> </br>
		
		<label for="namxb">Năm XB</label>
		<input name="namxb" type="number" value="<?php echo $sach->namxb?>"> </br>
		
		<input type="submit" name="edit_btn" value="UPDATE">
		<a href="index.php">Cancel</a>
	</form>
</body>
</html>