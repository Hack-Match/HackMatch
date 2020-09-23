<?php /** @noinspection PhpMissingFieldTypeInspection */
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/20/2020
 * Time: 4:39 PM
 */

date_default_timezone_set('America/Los_Angeles');
echo "\n\n> stream wrappers:\n\n";

class StreamDB
{
    const TABLE = 'perceptron_stream';
    protected $stream, $position, $data, $url, $origUrl, $id, $exists;
    
    /**
     * gets called with: fopen()
     *
     * @param $url
     * @param $mode
     *
     * @return bool
     */
    public function stream_open($url, $mode) {
        $this->position = 0;
        $this->origUrl = $url;
        $url = parse_url($url);
        $path = explode('/', $url['path']);
        $this->id = (int)$path[2];
        $table = static::TABLE;
        $id = $this->id;
        
        try {
            $host = $url['host'];
            $db = $path[1];
            $dsn = "mysql:host=$host;dbname=$db";
            
            $username = $url['user'];
            $password = $url['pass'];
            $pdo = new PDO($dsn, 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        catch(Exception $e) {
            exit($e->getMessage());
        }
        
        switch($mode) {
            case 'w':
                $check = $pdo->prepare("select id from $table where id = $id");
                $check->execute();
                if($check->fetch()) {
                    $this->exists = true;
                    $this->stream = $pdo->prepare(
                        "update $table set data=?, date=? where id=$id"
                    );
                }
                else {
                    $this->stream = $pdo->prepare(
                        "insert into $table values ($id, ?, now())"
                    );
                }
                return true;
            case 'r':
                $this->stream = $pdo->prepare(
                    "select * from $table where id = $id"
                );
                return true;
        }
        return false;
    }
    
    /**
     * gets called with: fwrite()
     *
     * @param $data
     *
     * @return int|null
     */
    public function stream_write($data) {
        $str_len = strlen($data);
        $this->position += $str_len;
        $binding = [$data];
        
        if($this->exists) {
            $dt = new DateTime('now');
            $binding [] = $dt->format('Y-m-d H:m:s');
        }
        
        return $this->stream->execute($binding) ? $str_len : null;
    }
    
    public function stream_read() {
        $this->stream->execute([$this->id]);
        if(0 === $this->stream->rowCount()) return false;
        return implode(', ', $this->stream->fetch());
    }
    
    public function stream_tell() {
        return $this->id;
    }
    
    public function stream_eof() {
        return (bool)$this->stream->rowCount();
    }
}

(function(){
    
    stream_wrapper_register('Perceptron', StreamDB::class);
    
    // scheme://user:pass@host/dbname/value1[/value2...]
    $wrapper = 'Perceptron://php_ninja:Php7num1!@127.0.0.1/hack_match/1';
    
    // write to the db stream
    $writeStream = fopen($wrapper, 'w') or null;
    if($writeStream) {
        if($bytesAdded = fwrite($writeStream, 'ai archetype')) echo "-> Streamed $bytesAdded bytes to resource.";
        else echo '__>> Data Stream Script only works on localhost at the moment.';
        fclose($writeStream);
    }
    
    echo "\r\n \r\n";
    
    // read from the db stream
    $readStream = fopen($wrapper, 'r') or null;
    if($readStream) {
        $dbRecord = var_export(fread($readStream, 100), true);
        echo "Database record from db stream = $dbRecord";
        fclose($readStream);
    }
    
    
    echo "\r\n \r\n";
    
})();


