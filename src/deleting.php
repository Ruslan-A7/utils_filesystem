<?php
/**
 * Видалити файл.
 *
 * Важливо! Шлях вже має бути нормалізованим згідно роздільника директорій для поточної ОС
 * (для цього доступні наступні функції: dsNormalize, pathNormalize, pathNormalizePlus з пакету ra7/utils_path-normalize).
 */
function deleteFile(string $fileName): bool {
    if (is_file($fileName)) {
        return unlink($fileName);
    }
    throw new Exception($fileName . ' не є файлом!');
    return false;
}