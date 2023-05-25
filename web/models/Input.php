<?php
declare(strict_types=1);
namespace models;

/**
 * Input
 */
class Input 
{
    
    /**
     * getPostValue
     *
     * @param  mixed $field
     * @return mixed
     */
    public static function getPostValue($field): mixed {
		$result = "";
		if(self::inputExist($field)){
			$value = $_POST[$field];
			$result = self::validateFields($field, $value);
		}
		return $result;
	}
	
	
	/**
	 * getFileData
	 *
	 * @param  string $inputname
	 * @return array
	 */
	public static function getFileData(string $inputname): array
	 {
		$arr= [];
		if(self::fileExist($inputname)) {
			$filename = $_FILES[$inputname]['name'];
			$tempname = $_FILES[$inputname]['tmp_name'];
			if (!empty($filename) && !empty($tempname)){
				$arr["name"] = $filename;
				$arr["tmp_name"] = $tempname;
			}
		}
		return $arr;
	}
	    
       
    /**
     * inputExist
     *
     * @param  string $name
     * @return bool
     */
    public static function inputExist(string $name): bool
	{
	    return array_key_exists($name, $_POST);
    }
	
	/**
	 * fileExist
	 *
	 * @param  string $name
	 * @return bool
	 */
	public static function fileExist(string $name): bool
	{
	    return array_key_exists($name, $_FILES);
    }
    
    /**
     * validateFields
     *
     * @param  mixed $field
     * @param  mixed $value
     * @return mixed
     */
    public static function validateFields($field, $value): mixed {
		
        if ($field === 'clientemail'){
           return filter_var($value, FILTER_SANITIZE_EMAIL);
        }
        else {
           return  filter_var($value, FILTER_SANITIZE_STRING);
        }

   }
   
}