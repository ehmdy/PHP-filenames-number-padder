<?php

// تحديد مسار الفولدر (مسار ثابت)
$directory = 'C:\Users\ehmdy\Videos';

// عدد الأرقام المطلوب في الاسم (مثلاً: 3 ليكون الاسم 001)
$padLength = 3;

// التحقق من وجود الفولدر
if (!is_dir($directory)) {
    die("Error: Directory does not exist!\n$directory\n");
}

// قراءة كل الملفات
$files = scandir($directory);

if ($files === false) {
    die("Error: Could not read directory!\n");
}

foreach ($files as $file) {

    // تجاهل الملفات الخاصة بالنظام
    if ($file === '.' || $file === '..') {
        continue;
    }

    // المسار الكامل للملف القديم
    $oldFilePath = $directory . DIRECTORY_SEPARATOR . $file;

    // التأكد إنه ملف مش فولدر
    if (!is_file($oldFilePath)) {
        continue;
    }

    // استخراج الرقم من بداية الاسم
    if (preg_match('/^(\d+)/', $file, $matches)) {

        $number = $matches[1];

        // تحويل الرقم إلى الطول المطلوب (padLength)
        $newNumber = str_pad($number, $padLength, '0', STR_PAD_LEFT);

        // استبدال الرقم في الاسم
        $newFileName = preg_replace('/^\d+/', $newNumber, $file);

        // التحقق مما إذا كان الاسم سيبقى كما هو
        if ($file === $newFileName) {
            continue;
        }

        // المسار الكامل للملف الجديد
        $newFilePath = $directory . DIRECTORY_SEPARATOR . $newFileName;

        // التحقق من عدم وجود ملف بنفس الاسم مسبقاً
        if (file_exists($newFilePath)) {
            echo "Skipped: '$newFileName' already exists.\n";
            continue;
        }

        // إعادة التسمية
        if (rename($oldFilePath, $newFilePath)) {
            echo "Renamed: $file → $newFileName\n";
        } else {
            echo "Error: Could not rename $file\n";
        }
    }
}