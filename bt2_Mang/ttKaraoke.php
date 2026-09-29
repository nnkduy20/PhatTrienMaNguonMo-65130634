<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền Karaoke</title>
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
            background-color: #ffffff;
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
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group label {
            width: 120px;
            font-weight: bold;
            color: #000000;
            font-size: 14px;
        }
        .input-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        input[type="time"], input[type="text"] {
            width: 100%;
            padding: 8px 10px;
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
        .unit {
            font-size: 13px;
            color: #555555;
            white-space: nowrap;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        input[type="submit"] {
            background-color: #000000;
            color: #ffffff;
            border: 1px solid #000000;
            padding: 9px 20px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        input[type="submit"]:hover {
            background-color: #ffffff;
            color: #000000;
        }
        .error-msg {
            color: #000000;
            font-weight: bold;
            font-size: 13px;
            margin-bottom: 12px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
$gio_bat_dau = "";
$gio_ket_thuc = "";
$tien_thanh_toan = "";
$error = "";

if (isset($_POST['tinh_tien'])) {
    $gio_bat_dau = $_POST['gio_bat_dau'] ?? '';
    $gio_ket_thuc = $_POST['gio_ket_thuc'] ?? '';

    if (!empty($gio_bat_dau) && !empty($gio_ket_thuc)) {
        list($h_start, $m_start) = explode(':', $gio_bat_dau);
        list($h_end, $m_end) = explode(':', $gio_ket_thuc);
        $start_minutes = (int)$h_start * 60 + (int)$m_start;
        $end_minutes = (int)$h_end * 60 + (int)$m_end;

        if ($end_minutes > $start_minutes) {
            if ($h_start < 10 || $h_end > 24 || ($h_end == 24 && $m_end > 0)) {
                $error = "Quán chỉ phục vụ từ 10:00 đến 24:00!";
            } else {
                $moc_17h = 17 * 60;
                $tong_tien = 0;
                if ($end_minutes <= $moc_17h) {
                    $phut = $end_minutes - $start_minutes;
                    $tong_tien = ($phut / 60) * 20000;
                } elseif ($start_minutes >= $moc_17h) {
                    $phut = $end_minutes - $start_minutes;
                    $tong_tien = ($phut / 60) * 45000;
                } else {
                    $phut_truoc_17h = $moc_17h - $start_minutes;
                    $phut_sau_17h = $end_minutes - $moc_17h;
                    $tong_tien = ($phut_truoc_17h / 60) * 20000 + ($phut_sau_17h / 60) * 45000;
                }

                $tien_thanh_toan = number_format($tong_tien, 0, ',', '.') . " VNĐ";
            }
        } else {
            $error = "Giờ kết thúc phải lớn hơn giờ bắt đầu!";
        }
    } else {
        $error = "Vui lòng chọn đầy đủ giờ bắt đầu và giờ kết thúc!";
    }
}

if (isset($_POST['reset'])) {
    $gio_bat_dau = "";
    $gio_ket_thuc = "";
    $tien_thanh_toan = "";
    $error = "";
}
?>

<div class="container">
    <div class="header">
        <h2>Tính Tiền Karaoke</h2>
    </div>
    <div class="content">
        <?php if (!empty($error)): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="gio_bat_dau">Giờ bắt đầu</label>
                <div class="input-wrapper">
                    <input type="time" id="gio_bat_dau" name="gio_bat_dau" 
                           value="<?php echo htmlspecialchars($gio_bat_dau); ?>" required>
                    <span class="unit">(hh:mm)</span>
                </div>
            </div>

            <div class="form-group">
                <label for="gio_ket_thuc">Giờ kết thúc</label>
                <div class="input-wrapper">
                    <input type="time" id="gio_ket_thuc" name="gio_ket_thuc" 
                           value="<?php echo htmlspecialchars($gio_ket_thuc); ?>" required>
                    <span class="unit">(hh:mm)</span>
                </div>
            </div>

            <div class="form-group">
                <label for="tien_thanh_toan">Tiền thanh toán</label>
                <div class="input-wrapper">
                    <input type="text" id="tien_thanh_toan" name="tien_thanh_toan" 
                           value="<?php echo htmlspecialchars($tien_thanh_toan); ?>" 
                           readonly placeholder="0 VNĐ">
                    <span class="unit">(VND)</span>
                </div>
            </div>

            <div class="btn-group">
                <input type="submit" name="tinh_tien" value="Tính tiền">
                <input type="submit" name="reset" value="Nhập lại">
            </div>
        </form>
    </div>
</div>

</body>
</html>