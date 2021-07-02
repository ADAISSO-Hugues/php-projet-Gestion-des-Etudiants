<?php
namespace ism\lib;

class Validator{

    private array $arrayError=[];


    public function estVide(string $val, string $key,   $sms="champ obligatoire"):bool{
 
        if(empty($val)){
            $this->arrayError[$key] = $sms;
            return true;
        }
        return false;
        
    }
    
    
    //Fonction PHP pour controler une adresse Mail
    public function estMail(string $val, string $key,  $sms="verifier votre saisie email"):bool{
        if (!filter_var($val, FILTER_VALIDATE_EMAIL)){
            $this->arrayError[$key] = $sms;
            return false;
        }
        return true;
    }
        
    public function formValide():bool {
        return count($this->arrayError)===0;
    }
    

    /**
     * Get the value of array_error
     */ 
    public function getErrors():array
    {
        return $this->arrayError;
    }
    public function setErrors(string $key, string $error):void
    {
         $this->arrayError[$key]=$error;
    }
    public static function generateRandomString()
    {
        $include_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $charLength = strlen($include_chars);
        $randomString = '';
        $int=1;
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $include_chars[rand(0, $charLength - 1)];
        }
        while($int<=2){
            $randomString .="-";
            for ($i = 0; $i < 3; $i++) {
                $randomString .= $include_chars[rand(0, $charLength - 1)];
            }
            $int++;
        }
        return $randomString;
    }
}
?>