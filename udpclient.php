<?php

if($argc != 4) {
		fprintf(STDERR, "Usage Error\n\t%s ip_addr port len\n", $argv[0]);
			exit(1);
}

$remote_ip = $argv[1];
$remote_port = $argv[2];
$datalength = $argv[3];

$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP); //创建UDP套接字

if(!socket_set_option($sock, SOL_SOCKET, SO_REUSEADDR, 1)) {
		echo 'Unable to set option on socket: ' . socket_strerror(socket_last_error()) . PHP_EOL;
}

$fpr = fopen('/dev/urandom', 'r');

$msg = '';
while($datalength) {
		$msg .= fgetc($fpr);
			$datalength--;
}

$len = strlen($msg);
$md5 = md5($msg);

fclose($fpr);

while(1) {
		if(false === socket_sendto($sock, $msg, $len, 0, $remote_ip, $remote_port)) {
					echo 'senderror: '. socket_strerror(socket_last_error()) . PHP_EOL;
							break;
								}
			break;
}
echo "$len Bytes Send, md5: $md5\n";

socket_close($sock);

?>

