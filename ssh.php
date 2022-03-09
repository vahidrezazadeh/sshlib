<?php

include ('Crypt/RSA.php');
include ('Net/SSH2.php');

class SshLib {
    private static $connection;

    public function __construct($host, $port, $username, $private_key_full_path) {
        $ssh = new Net_SSH2($host, $port);
        $key = new Crypt_RSA();
        $key->loadKey(file_get_contents($private_key_full_path));
        $ssh->login($username, $key);
        self::$connection = $ssh;
    }

    public function exec($command) {
        if (self::$connection == null) {
            throw new Error('Ssh connection has not been made.');
        }
        return self::$connection->exec($command);
    }
}
