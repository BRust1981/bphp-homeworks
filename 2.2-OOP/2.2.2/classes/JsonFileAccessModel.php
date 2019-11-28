<?php

class JsonFileAccessModel 
{
    protected $fileName;
    protected $file;

    function __construct($file)
    {
        $this->fileName = Config::DATABASE_PATH . $file . '.json';
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
    {
        return json_encode($this->read(), JSON_PRETTY_PRINT);
    }

    public function writeJson($text)
    {
        $this->connect();
        fwrite($this->file, json_encode($text, JSON_PRETTY_PRINT));
        $this->disconnect();
    }

}
?>