# SSH Lib
### SSH Library For Php , to Connect to Linux Servers With SSH

## Useage

```php
    <?php
        include ('Services/sshlib/Crypt/RSA.php');
        include ('sshlib/Net/SSH2.php');
        $ip = "Yor IP";
        $port = 22;
        $username = 'root';
        $private_key_path = 'Private Key Path';
        $ssh = new Net_SSH2($ip, $port);
        $key = new Crypt_RSA();
        $key->loadKey(file_get_contents($private_key_path));
        $ssh->login($username, $key);
        $result = $ssh->exec('ls');
        echo $result;
```
