<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quản lý sách</title>
</head>

<body>
	<h2>Quản lý sách</h2>
	<form method="POST">
		<input type="search" name="search">
		<input type="submit" name="search_btn" value="SEARCH">
	</form>
	<a href="index.php?controller=sach&action=add">Thêm</a>
	<table border = "1">
		<thead>
			<tr>
				<th>Mã sách</th>
				<th>Tên sách</th>
				<th>Tác giả</th>
				<th>Năm XB</th>
				<th>Chức năng</th>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach ($data as $sach){?>
			<tr>
				<td><?php echo $sach->masach?></td>
				<td><?php echo $sach->tensach?></td>
				<td><?php echo $sach->tentg?></td>
				<td><?php echo $sach->namxb?></td>
				<td>
					<a href="index.php?controller=sach&action=edit&id=<?php echo $sach->masach?>">Sửa</a>
					<a href="index.php?controller=sach&action=delete&id=<?php echo $sach->masach?>">Xóa</a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</body>
</html>