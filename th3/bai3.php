<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Số N ngẫu nhiên</title>
</head>
<body>
<?php
$N = rand(-100, 100);
echo "Số N = $N <br><br>";

if ($N <= 0) {
    echo "$N không phải là số dương.";
    exit;
}

echo "1. Các ước số: ";
for ($i = 1; $i <= $N; $i++) {
    if ($N % $i == 0) echo "$i ";
}
echo "<br>";

function kiemTraSoNguyenTo($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

echo "2. Số nguyên tố: " . (kiemTraSoNguyenTo($N) ? "$N là số nguyên tố" : "$N không phải số nguyên tố") . "<br>";

$tong = 0;
for ($i = 2; $i < $N; $i++) {
    if (kiemTraSoNguyenTo($i)) $tong += $i;
}
echo "3. Tổng các số nguyên tố nhỏ hơn $N: $tong <br>";

$canBacHai = sqrt($N);
$laChinhPhuong = ($canBacHai == (int)$canBacHai);
echo "4. Số chính phương: " . ($laChinhPhuong ? "$N là số chính phương" : "$N không phải số chính phương");
?>
</body>
</html>