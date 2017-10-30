<?php

namespace App\Core;


class Validator
{
    public static function validate($data)
    {
       $errors = [];
       foreach ($data as $key => $item) {
           $error = self::parseRule($key, $item);
           if ($error) {
               $errors[] = $error;
           }
       }
       return $errors;
    }

    private static function parseRule($field, $rules)
    {
        $rulesArray = explode( '|', $rules);
        $fieldValue = $_POST[$field];
        return self::validateRule($rulesArray, $fieldValue, $field);
    }

    private static function validateRule($rulesArray, $fieldValue, $field)
    {
        $response = '';
        foreach ($rulesArray as $item) {
            $itemArr = explode(':', $item);
            $item = $itemArr[0];
            switch ($item) {
                case 'required':
                    if (!$fieldValue)
                        $response = $field . ' is required';
                    break;
                case 'min':
                    if ($itemArr[1] > strlen($fieldValue))
                        $response =  $field . ' should not be less then ' . $itemArr[1] . ' characters';
                    break;
                case 'confirmed':
                    if ($fieldValue !== $_POST['passwordConfirm'])
                        $response = 'Password wasn\'t confirmed!';
                    break;
                default:
                    break;
            }
        }
        return $response;
    }
}