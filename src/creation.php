<?php
/**
 * Створити неіснуючі папки до файлу.
 * 
 * Важливо! Шлях вже має бути нормалізованим згідно роздільника директорій для поточної ОС
 * (для цього доступні наступні функції: dsNormalize, pathNormalize, pathNormalizePlus з пакету ra7/utils_path-normalize).
 *
 * @param string $path
 */
function createEmptyDirsToFile(string $path, int $permissions = 0777, bool $recursive = true, $context = null): bool {
    $path = dirname($path);
    if (!is_dir($path)) {
        return mkdir($path, $permissions, $recursive, $context);
    }
    return false;
}