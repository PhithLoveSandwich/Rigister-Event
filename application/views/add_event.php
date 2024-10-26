<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มกิจกรรม</title>
</head>
<body>
    <h1>เพิ่มกิจกรรมใหม่</h1>
    <form action="<?php echo site_url('event/insert_event'); ?>" method="post">
        <label for="name">ชื่อกิจกรรม:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="description">รายละเอียดกิจกรรม:</label>
        <textarea name="description" id="description" required></textarea>
        
        <label for="date">วันที่:</label>
        <input type="date" name="date" id="date" required>
        
        <label for="start_date">วันที่เริ่มต้น:</label>
        <input type="date" name="start_date" id="start_date" required>
        
        <label for="end_date">วันที่สิ้นสุด:</label>
        <input type="date" name="end_date" id="end_date" required>
        
        <input type="submit" value="เพิ่มกิจกรรม">
    </form>
    <a href="<?php echo site_url('event/index'); ?>">กลับไปหน้ารายการกิจกรรม</a>
</body>
</html>
