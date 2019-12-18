<?php

/**
 * Для правильной работы класса автозагрузчика
 * необходимо прописывать классам пространство имён,
 * где в роли должны выступать имена папок.
 *
 * Для использования класса:
 * 1. подключаем класс в файл;
 * 2. создаём экземпляр класса: $loader = new Loader();
 * 3. регистрируем функцию как __autoload: spl_autoload_register([$loader, 'loadClass']);
 *
 * В аргументе получаем (namespace\Class)
 *
 * Class Loader
 */
class Loader
{
    public function loadClass($className)
    {
        $path   = '';
        $arr    = explode('\\', $className);
        $prefix = array_shift($arr);
        
        $path = "$prefix/classes/" . array_shift($arr) . '.php';

        if(is_file($path)){
            require_once $path;
        }
    
        unset($path, $arr, $prefix, $className);
    }
}