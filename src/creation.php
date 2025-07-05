<?php
/**
 * Створити неіснуючі папки до файлу.
 *
 * Важливо! У цій функції шлях обробляється функцією `pathNormalize()` з пакету `ra7/utils_normalizers` для його нормалізації,
 * тому слід використовувати `/` або `\` для розділення директорій.
 */
function createEmptyDirsToFile(string $path, int $permissions = 0777, bool $recursive = true, $context = null): bool {
    $path = dirname(pathNormalize($path));

    if (!is_dir($path)) {
        return mkdir($path, $permissions, $recursive, $context);
    }
    return false;
}

/**
 * Створити файл і записати дані в нього з автоматичним створенням неіснуючих папок на шляху.
 *
 * Важливо! У цій функції шлях обробляється функцією `pathNormalize()` з пакету `ra7/utils_normalizers` для його нормалізації,
 * тому слід використовувати `/` або `\` для розділення директорій.
 *
 * Всі параметри мають відповідати стандартній функції `file_put_contents`!
 */
function createFile(string $path, mixed $data = '', int $flags = 0, $context): int|bool {
    $path = pathNormalize($path);

    createEmptyDirsToFile($path);

    if (is_file($path)) {
        return file_put_contents($path, $data, $flags, $context) !== false;
    }
    return false;
}