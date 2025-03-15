<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت داده‌ها از POST (که باید به صورت JSON ارسال شوند)
    $data = json_decode($_POST['management'], true);

    // چک کردن اینکه داده‌ها به درستی ارسال شده‌اند
    if ($data) {
        // نوشتن داده‌ها در فایل
        file_put_contents('users.json', json_encode($data, JSON_PRETTY_PRINT));
        echo 'Data updated successfully';
    } else {
        echo 'Invalid data';  // در صورت وجود مشکل در داده‌ها
    }
}
?>
