<?php
/**
 * Видалити файл.
 *
 * Важливо! У цій функції шлях обробляється функцією `pathNormalize()` з пакету `ra7/utils_normalizers` для його нормалізації,
 * тому слід використовувати `/` або `\` для розділення директорій.
 */
function deleteFile(string $path): bool {
    $path = pathNormalize($path);

    if (is_file($path)) {
        return unlink($path);
    }
    return false;
}