<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngau nhien 1 so N</title>
</head>
<body>
    <?php
$N = rand(1, 100);
echo "Số N = $N <br><br>";

echo "Các số chẵn từ 1 đến $N là: ";
for ($i = 2; $i <= $N; $i += 2) {
    echo "$i ";
}
?>
</body>
</html>