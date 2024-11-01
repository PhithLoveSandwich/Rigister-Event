<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียนผู้ใช้</title>
    <style>
        body {
            font-family: 'Itim', sans-serif;
            background-color: #F5EDED;
            color: #522258;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #E2DAD6;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center; /* จัดให้ข้อความอยู่กลาง */
        }
        h2 {
            margin-bottom: 20px;
            color: #8C3061;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 20px); /* ให้ความกว้างของ input ลดลงเพื่อไม่ให้ทับขอบ */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #C63C51;
            border-radius: 5px;
            box-sizing: border-box; /* ให้ขนาดรวมการ padding และ border */
        }
        input[type="submit"] {
            background-color: #C63C51;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #D95F59;
        }
        p {
            margin-top: 20px;
        }
        a {
            color: #8C3061;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ลงทะเบียนผู้ใช้</h2>
        <?php echo form_open('auth/register_user'); ?>
            <label for="username">ชื่อผู้ใช้:</label>
            <input type="text" name="username" required>

            <label for="password">รหัสผ่าน:</label>
            <input type="password" name="password" maxlength="8" required>

            <label for="identification_number">รหัสประจำตัว:</label>
            <input type="text" name="identification_number" required>

            <label for="faculty">คณะ:</label>
            <input type="text" name="faculty" required>

            <label for="major">สาขาวิชา:</label>
            <input type="text" name="major" required>

            <label for="user_type">ประเภทบุคลากร:</label>
            <select name="user_type" required>
                <option value="student">นักศึกษา</option>
                <option value="faculty">บุคลากรทางการศึกษา</option>
            </select>

            <input type="submit" value="ลงทะเบียน">
        <?php echo form_close(); ?>
        <p>คุณมีบัญชีอยู่แล้ว? <a href="<?php echo site_url('auth/login'); ?>">เข้าสู่ระบบที่นี่</a>.</p>
    </div>
</body>
</html>
