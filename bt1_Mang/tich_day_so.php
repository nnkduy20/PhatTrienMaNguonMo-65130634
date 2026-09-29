<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính tích dãy số</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            border: 2px solid #000000;
            border-radius: 6px;
            width: 420px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            overflow: hidden;
        }
        .header {
            background-color: #000000;
            color: #ffffff;
            text-align: center;
            padding: 14px;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .content {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
            color: #000000;
        }
        input[type="text"] {
            width: 100%;
            padding: 9px 10px;
            border: 1px solid #000000;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            outline: none;
        }
        input[readonly] {
            background-color: #e0e0e0;
            color: #000000;
            font-weight: bold;
        }
        .btn-submit {
            width: 100%;
            background-color: #000000;
            color: #ffffff;
            border: 1px solid #000000;
            padding: 11px;
            font-size: 15px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .btn-submit:hover {
            background-color: #ffffff;
            color: #000000;
        }
        .note {
            font-size: 12px;
            color: #000000;
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<?php
$day_so = "";
$tich = "";
$error = "";

if (isset($_POST['btn_tich'])) {
    $day_so = isset($_POST['day_so']) ? trim($_POST['day_so']) : '';

    if ($day_so !== '') {
        $mang_so = explode(',', $day_so);
        
        $tich_val = 1;
        $co_so_hop_le = false;
        foreach ($mang_so as $so) {
            $so = trim($so);
            if (is_numeric($so)) {
                $tich_val *= $so;
                $co_so_hop_le = true;
            }
        }
        if ($co_so_hop_le) {
            $tich = $tich_val;
        } else {
            $error = "Các phần tử nhập vào phải là số!";
        }
    } else {
        $error = "Vui lòng nhập vào dãy số!";
    }
}
?>
<div class="container">
    <div class="header">
        <h2>Tính Tích Dãy Số</h2>
    </div>
    <div class="content">
        <form action="" method="POST">
            <div class="form-group">
                <label for="day_so">Nhập dãy số:</label>
                <input type="text" id="day_so" name="day_so" 
                       value="<?php echo htmlspecialchars($day_so); ?>" 
                       placeholder="Ví dụ: 2, 3, 4, 5" required>
                <?php if (!empty($error)): ?>
                    <div class="note"><?php echo $error; ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="tich">Tích dãy số:</label>
                <input type="text" id="tich" name="tich" 
                       value="<?php echo htmlspecialchars($tich); ?>" 
                       readonly placeholder="Kết quả tích sẽ hiển thị ở đây">
            </div>
            <button type="submit" name="btn_tich" class="btn-submit">Tích dãy số</button>
        </form>
    </div>
</div>

</body>
</html>