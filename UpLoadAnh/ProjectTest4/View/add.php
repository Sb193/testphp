<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset = "utf8">
	<title>Quản lý sách</title>
</head>
<body>
	<h2>Thêm sách</h2>
	<form method="POST" enctype="multipart/form-data">
		<label for="tensach">Ten sach:</label>
		<input type="text" name="tensach">
		<label for="hinhanh">Hinh anh:</label>
		<input type="file" name="hinhanh">
		
		<label for="matg">Tac gia</label>
		<select name="matg">
			<?php
				foreach ($tacgia as $tg){
			?>
				<option value="<?php echo $tg->matg?>"><?php echo $tg->tentg?></option>
			<?php }?>
		</select>
		
		<label for="namxb">Nam XB:</label>
		<input type="number" name="namxb">
		
		<input type="submit" name="add_btn" value="Thêm">
	</form>

</body>
</html>