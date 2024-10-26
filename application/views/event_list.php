<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายการกิจกรรม</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .user-info {
            text-align: right;
            margin-bottom: 10px;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .card {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card h2 {
            margin: 0 0 10px 0;
            color: #333;
        }
        .card p {
            margin: 5px 0;
        }
        .register-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            cursor: pointer;
            text-align: center;
        }
        .register-button:hover {
            background-color: #0056b3;
        }
        .registration-count {
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="user-info">
        <?php if ($this->session->userdata('username')): ?>
            <p>ยินดีต้อนรับ, <?php echo $this->session->userdata('username'); ?></p>
        <?php endif; ?>
    </div>
    <h1>รายการกิจกรรม</h1>
    <?php if (isset($events) && !empty($events)): ?>
        <div class="card-container">
            <?php foreach ($events as $event): ?>
                <div class="card">
                    <h2><?php echo $event->name; ?></h2>
                    <p><strong>วันที่:</strong> <?php echo $event->date; ?></p>
                    <p><strong>สถานะ:</strong> <?php echo $event->status; ?></p>
                    <p><strong>รายละเอียด:</strong> <?php echo $event->description; ?></p>
                    
                    <!-- จำนวนผู้ลงทะเบียน -->
                    <p class="registration-count"><strong>จำนวนผู้ลงทะเบียน:</strong> <?php echo isset($event->registration_count) ? $event->registration_count : 0; ?></p>

                    <a href="<?php echo site_url('auth/register_event/' . $event->id); ?>" class="register-button">ลงทะเบียนเข้ากิจกรรม</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>ไม่มีข้อมูลกิจกรรมที่กำลังดำเนินการ</p>
    <?php endif; ?>
</body>
</html>
