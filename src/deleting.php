<?php
/**
 * Видалити файл.
 *
 * Важливо! Шлях вже має бути нормалізованим згідно роздільника директорій для поточної ОС
 * (для цього призначено функцію `pathNormalize()` та `pathNormalizePlus()` з пакету `ra7/utils_normalizers`).
 */
function deleteFile(string $path): bool {
    if (is_file($path)) {
        return unlink($path);
    }
    return false;
}