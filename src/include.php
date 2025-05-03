<?php
/**
 * Підключити файл в режимі include (без передачі другого аргументу)
 * або include_once (передавши true другим аргументом).
 * 
 * Важливо! Шлях вже має бути нормалізованим згідно роздільника директорій для поточної ОС
 * (для цього доступні наступні функції: dsNormalize, pathNormalize, pathNormalizePlus з пакету ra7/utils_path-normalize).
 * 
 * Рекомендується передавати абсолютний шлях!
 * 
 * Функція може приймати масив змінних для доступу до них в підключеному файлі!
 */
function includeFile(string $path, bool $once = false, array $variables = []): mixed {
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
 * Підключити файл в режимі require (без передачі другого аргументу)
 * або require_once (пердавши true дргуим аргументом).
 * 
 * Важливо! Шлях вже має бути нормалізованим згідно роздільника директорій для поточної ОС
 * (для цього доступні наступні функції: dsNormalize, pathNormalize, pathNormalizePlus з пакету ra7/utils_path-normalize).
 * 
 * Рекомендується передавати абсолютний шлях!
 * 
 * Функція може приймати масив змінних для доступу до них в підключеному файлі!
 */
function requireFile(string $path, bool $once = false, array $variables = []): mixed {
    if (!empty($variables)) {
        extract($variables);
    }
    if ($once !== false) {
        return require_once $path;
    } else {
        return require $path;
    }
}