<?php
/**
 * Підключити файл в режимі include (без передачі другого аргументу або передавши ним `false`)
 * або include_once (передавши `true` другим аргументом).
 *
 * Важливо! У цій функції шлях обробляється функцією `pathNormalize()` з пакету `ra7/utils_normalizers` для його нормалізації,
 * тому слід використовувати `/` або `\` для розділення директорій.
 *
 * Рекомендується передавати абсолютний шлях!
 *
 * Функція може приймати масив змінних для доступу до них в підключеному файлі!
 */
function includeFile(string $path, bool $once = false, array $variables = []): mixed {
    $path = pathNormalize($path);

    if (!empty($variables)) {
        extract($variables);
    }

    if ($once !== false) {
        return include_once $path;
    } else {
        return include $path;
    }
}

/**
 * Підключити файл в режимі require (без передачі другого аргументу або передавши ним `false`)
 * або require_once (передавши `true` другим аргументом).
 *
 * Важливо! У цій функції шлях обробляється функцією `pathNormalize()` з пакету `ra7/utils_normalizers` для його нормалізації,
 * тому слід використовувати `/` або `\` для розділення директорій.
 *
 * Рекомендується передавати абсолютний шлях!
 *
 * Функція може приймати масив змінних для доступу до них в підключеному файлі!
 */
function requireFile(string $path, bool $once = false, array $variables = []): mixed {
    $path = pathNormalize($path);

    if (!empty($variables)) {
        extract($variables);
    }

    if ($once !== false) {
        return require_once $path;
    } else {
        return require $path;
    }
}