<?php
/**
 * Створити неіснуючі папки до файлу.
 *
 * Важливо! Шлях вже має бути нормалізованим згідно роздільника директорій для поточної ОС
 * (для цього призначено функцію `pathNormalize()` та `pathNormalizePlus()` з пакету `ra7/utils_normalizers`).
 *
 * Треба передавати шлях до файлу, а не до директорії (ця функція автоматично визначить потрібну директорію).
 *
 * Якщо треба створити директорію на основі шляху до директорії - скористайтесь функцією `createEmptyDirsToDir()`.
 */
function createEmptyDirsToFile(string $path, int $permissions = 0777, bool $recursive = true, $context = null): bool {
    $path = dirname($path);
    if (!is_dir($path)) {
        return mkdir($path, $permissions, $recursive, $context);
    }
    return false;
}

/**
 * Створити неіснуючі папки до вказаної папки.
 *
 * Важливо! Шлях вже має бути нормалізованим згідно роздільника директорій для поточної ОС
 * (для цього призначено функцію `pathNormalize()` та `pathNormalizePlus()` з пакету `ra7/utils_normalizers`).
 *
 * Треба передавати шлях до кінцевої директорії, а не до файлу.
 *
 * Якщо треба створити директорію на основі шляху до файлу - скористайтесь функцією `createEmptyDirsToFile()`.
 */
function createEmptyDirsToDir(string $path, int $permissions = 0777, bool $recursive = true, $context = null): bool {
    if (!is_dir($path)) {
        return mkdir($path, $permissions, $recursive, $context);
    }
    return false;
}



/**
 * Створити файл і записати дані в нього з автоматичним створенням неіснуючих папок на шляху (перезапише або доповнить існуючий файл в залежності від $flags).
 *
 * Важливо! Шлях вже має бути нормалізованим згідно роздільника директорій для поточної ОС
 * (для цього призначено функцію `pathNormalize()` та `pathNormalizePlus()` з пакету `ra7/utils_normalizers`).
 *
 * Всі параметри мають відповідати стандартній функції `file_put_contents()`!
 */
function createFile(string $path, mixed $data = '', int $flags = 0, $context = null): int|bool {
    if (!is_file($path)) {
        createEmptyDirsToFile($path);
    }
    return file_put_contents($path, $data, $flags, $context) !== false;
}

/**
 * Створити файл і записати дані в нього з автоматичним створенням неіснуючих папок на шляху (без його перезапису якщо файл вже існує).
 *
 * Важливо! Шлях вже має бути нормалізованим згідно роздільника директорій для поточної ОС
 * (для цього призначено функцію `pathNormalize()` та `pathNormalizePlus()` з пакету `ra7/utils_normalizers`).
 *
 * Всі параметри мають відповідати стандартній функції `file_put_contents()`!
 */
function createFileWithoutRewrite(string $path, mixed $data = '', int $flags = 0, $context = null): int|bool {
    if (!is_file($path)) {
        createEmptyDirsToFile($path);
        return file_put_contents($path, $data, $flags, $context) !== false;
    }
    return false;
}