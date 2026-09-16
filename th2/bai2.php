<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANG CUU CHUONG</title>
</head>
<body>

<h2 align="center">BẢNG CỬU CHƯƠNG</h2>

<table border="1" >
    <tr>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <th bgcolor="#ccc">Chương <?php echo $i; ?></th>
        <?php endfor; ?>
    </tr>
    <?php for ($j = 1; $j <= 10; $j++): ?>
        <tr>
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <td><?php echo "$i x $j = " . ($i * $j); ?></td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>

</body>
</html>