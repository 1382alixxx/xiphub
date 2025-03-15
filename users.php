<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // تابع برای دریافت و اضافه کردن اطلاعات به users.json
    function get_data() {
        $file_name = 'users.json';

        // چک کردن اینکه فایل وجود دارد یا خیر
        if (file_exists($file_name)) {
            // خواندن داده‌های موجود در فایل
            $current_data = file_get_contents($file_name);
            $array_data = json_decode($current_data, true);
        } else {
            // اگر فایل وجود ندارد، یک آرایه خالی ایجاد می‌کنیم
            $array_data = [];
        }

        // اطلاعات جدید کاربر برای اضافه کردن به آرایه
        $extra = array(
            'user' => $_POST['email'],  // ایمیل کاربر
            'password' => $_POST['password'],  // پسورد کاربر
            'position' => $_POST['position'],  // موقعیت کاربر
        );

        // اضافه کردن اطلاعات جدید به آرایه
        $array_data[] = $extra;

        // برگرداندن داده‌ها به فرمت JSON و با فرمت زیبا
        return json_encode($array_data, JSON_PRETTY_PRINT);
    }

    // نوشتن داده‌ها به فایل
    $file_name = 'users.json';
    if (file_put_contents($file_name, get_data())) {
        echo 'true';  // در صورت موفقیت
    } else {
        echo 'There is some error';  // در صورت وجود مشکل
    }
}
?>
