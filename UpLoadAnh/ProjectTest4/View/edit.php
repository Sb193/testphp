<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset = "utf8">
	<title>Quản lý sách</title>
</head>
<body>
	<h2>Sửa sách</h2>
	<form method="POST">
		<input type="hidden" name="masach" value="<?php echo $sach->masach?>">
		<label for="tensach">Ten sach:</label>
		<input type="text" name="tensach" value="<?php echo $sach->tensach?>">
		
		<label for="matg">Tac gia</label>
		<select name="matg">
			<?php
				foreach ($tacgia as $tg){
			?>
				<option <?php if ($sach->matg == $tg->matg) echo "selected"?> value="<?php echo $tg->matg?>"><?php echo $tg->tentg?></option>
			<?php }?>
		</select>
		
		<label for="namxb">Nam XB:</label>
		<input type="number" name="namxb" value="<?php echo $sach->namxb?>">
		
		<input type="submit" name="edit_btn" value="Thêm">
	</form>

</body>
</html>