<?php
/**
 * Створити неіснуючі папки до файлу.
 * 
 * Важливо! Шлях вже має бути нормалізованим згідно роздільника директорій для поточної ОС
 * (для цього доступні наступні функції: dsNormalize, pathNormalize, pathNormalizePlus з пакету ra7/utils_path-normalize).
 */
function createEmptyDirsToFile(string $fileName, int $permissions = 0777, bool $recursive = true, $context = null): bool {
    $fileName = dirname($fileName);
    if (!is_dir($fileName)) {
        return mkdir($fileName, $permissions, $recursive, $context);
    }
    return false;
}

/**
 * Створити файл і записати дані в нього з автоматичним створенням неіснуючих папок на шляху.
 *
 * Важливо! Шлях вже має бути нормалізованим згідно роздільника директорій для поточної ОС
 * (для цього доступні наступні функції: dsNormalize, pathNormalize, pathNormalizePlus з пакету ra7/utils_path-normalize).
 *
 * Всі параметри мають відповідати стандартній функції file_put_contents!
 */
function createFile(string $fileName, mixed $data, int $flags = 0, $context): int|bool {
    createEmptyDirsToFile($fileName);
    if (is_file($fileName)) {
        return file_put_contents($fileName, $data, $flags, $context) !== false;
    }
    return false;
}