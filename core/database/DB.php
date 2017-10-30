<?php

namespace App\Core\Database;

class DB
{
    public static function save($filename, $data)
    {
        if (!file_exists($filename)) {
            file_put_contents($filename, json_encode([$data]));
        } else {
            $fileData = json_decode(file_get_contents($filename));
            $fileData[] = $data;
            file_put_contents($filename, json_encode($fileData));
        }
    }

    public static function isAlreadyExists($filename, $data)
    {
        if (file_exists($filename)) {
            $items = json_decode(file_get_contents($filename));
            foreach ($items as $item) {
                foreach ($item as $key => $field) {
                    if ($field === $data[$key]) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public static function getItem($filename, $data)
    {
        if (file_exists($filename)) {
            $items = json_decode(file_get_contents($filename));
            foreach ($items as $item) {
                if ($item[0] === $data) {
                    return $item;
                }
            }
        }
        return false;
    }
}