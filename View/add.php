<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thêm sách</title>
</head>

<body>
	<h2>Thêm sách</h2>
	<form method="POST">
		<label for="tensach">Tên sách</label>
		<input name="tensach" type="text"> </br>
		<label for="matg">Tác giả</label>
		
		<select name="matg">
			<?php foreach ($tg as $tacgia){?>
				<option value="<?php echo $tacgia->matg?>"><?php echo $tacgia->tentg?></option>
			<?php }?>
		</select> </br>
		
		<label for="namxb">Năm XB</label>
		<input name="namxb" type="number"> </br>
		
		<input type="submit" name="add_btn" value="CREATE">
		<a href="index.php">Cancel</a>
	</form>
</body>
</html>