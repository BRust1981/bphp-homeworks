<?php

class JsonFileAccessModel 
{
    protected $fileName;
    protected $file;

    function __construct($file)
    {   if(is_readable(Config::DATABASE_PATH . $file . '.json')){
            $this->fileName = Config::DATABASE_PATH . $file . '.json';
        } else {
            $this->fileName = './.' . Config::DATABASE_PATH . $file . '.json';
        }
    }

    private function connect()
    {
        $this->file = fopen($this->fileName, 'c+');
    }

    private function disconnect()
    {
        fclose($this->file);
    }

    public function read()
    {   
        $this->connect();
        $res = '';
        while (!feof($this->file)) {
            $res = $res . fread($this->file, 1);
        }
        $this->disconnect();
        return $res;
    }

    public function write($text)
    {   
        $this->connect();
        fwrite($this->file, $text);
        $this->disconnect();
    }

    public function readJson()
    {   //var_dump(json_decode($this->read()));
        return json_decode($this->read());
    }

    public function writeJson($text)
    {
        $this->connect();
        fwrite($this->file, json_encode($text, JSON_PRETTY_PRINT));
        $this->disconnect();
    }

}
?>