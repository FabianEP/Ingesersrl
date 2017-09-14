<?php

class LogManager 
{ 

    private $pre_name = 'log_';

    private $rootdirectorie = __DIR__;

    private $logdirectorie = "logs";

    public function __construct(){
    }

    private function GetFilePath(){
        //get system time
        $date = new DateTime();
        //echo $date->format('Y-m-d H:i:s');
        
        $filename = $this->pre_name . $date->format('Ymd');
        
        $tmp_faile = $this->rootdirectorie .'\..\\'. $this->logdirectorie .'\\'.$filename .'.txt';

        return $tmp_faile;
    }

    private function GetFullMessage($domine, $message){
        $date = new DateTime();
        
        //[date and time] domine - message
        $fullmessage = "[".$date->format('Y-m-d H:i:s')."] : ". $domine .' - '. $message . PHP_EOL;

        return $fullmessage;
    }

    private function openfile(){        
        $tmp_faile = $this->GetFilePath();

        return fopen($tmp_faile, 'a+');
    }

    public function appendfile($domine, $message){
    
        $afile = $this->openfile();

        $fullmessage = $this->GetFullMessage($domine, $message);

        if ($afile){
            fwrite($afile, $fullmessage);
        }
        
        fclose($afile);
    }

    public function appendfileV2($domine, $message)
    {       
        file_put_contents($this->GetFilePath(), $this->GetFullMessage($domine, $message), FILE_APPEND | LOCK_EX);
    }
}
?>