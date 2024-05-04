<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sửa sách</title>
</head>

<body>
	<h2>Sửa sách</h2>
	<form method="POST">
		<input name="masach" type="hidden" value="<?php echo $sach->masach?>">
		<label for="tensach" readonly>Tên sách</label> 
		<input name="tensach" readonly type="text" value="<?php echo $sach->tensach?>"> </br>
		<label for="matg">Tác giả</label>
		
		<select name="matg" readonly>
			<?php foreach ($tg as $tacgia){?>
				<option <?php if ($sach->matg == $tacgia->matg) echo "selected"?> value="<?php echo $tacgia->matg?>"><?php echo $tacgia->tentg?></option>
			<?php }?>
		</select> </br>
		
		<label for="namxb">Năm XB</label>
		<input name="namxb" type="number" readonly value="<?php echo $sach->namxb?>"> </br>
		<h3>Bạn có chắc muốn xóa cuốn sách này?</h3>
		<input type="submit" name="delete_btn" value="DELETE">
		<a href="index.php">Cancel</a>
	</form>
</body>
</html>