<?php
// deployed to EC2 instance running processor; save to /var/www/html/
// googleassist.sh needs to be runnable as sudo as the apache user
// ie. sudo visudo
// apache ALL=(ALL) NOPASSWD: /home/ec2-user/google-assistant-grpc/googleassist.sh
// Above is not required when running locally (Ubuntu)
header('Content-Type: application/json');
chdir('/usr/local/grpc/google-assistant-grpc');

if( $_GET['command'] == 'projectoron' ) {
    $output = trim(shell_exec( '/usr/local/grpc/google-assistant-grpc/googleassist.sh "turn projector on"' ));
    echo ($output == "undefined" ? '{ "message": "ok" }' : '{ "message": ' . json_encode($output) . ' }');
} elseif( $_GET['command'] == 'projectoroff' ) {
    $output = trim(shell_exec( '/usr/local/grpc/google-assistant-grpc/googleassist.sh "lights out"' ));
    sleep(3);
    $output = trim(shell_exec( '/usr/local/grpc/google-assistant-grpc/googleassist.sh "lights out"' ));
    sleep(3);
    $output = trim(shell_exec( '/usr/local/grpc/google-assistant-grpc/googleassist.sh "lights out"' ));
    echo ($output == "undefined" ? '{ "message": "ok" }' : '{ "message": ' . json_encode($output) . ' }');
} elseif( $_GET['command'] == 'restart_wan9' ) {
    $output = trim(shell_exec( '/usr/local/grpc/google-assistant-grpc/googleassist.sh "turn off wan9"' ));
    sleep(5);
    $output = trim(shell_exec( '/usr/local/grpc/google-assistant-grpc/googleassist.sh "turn on wan9"' ));
    echo ($output == "undefined" ? '{ "message": "ok" }' : '{ "message": ' . json_encode($output) . ' }');
} elseif( $_GET['command'] == 'restart_wan10' ) {
    $output = trim(shell_exec( '/usr/local/grpc/google-assistant-grpc/googleassist.sh "turn off wan10"' ));
    sleep(5);
    $output = trim(shell_exec( '/usr/local/grpc/google-assistant-grpc/googleassist.sh "turn on wan10"' ));
    echo ($output == "undefined" ? '{ "message": "ok" }' : '{ "message": ' . json_encode($output) . ' }');
} elseif( $_GET['command'] == 'time' ) {
    $output = trim(shell_exec( '/usr/local/grpc/google-assistant-grpc/googleassist.sh "what time is it?"' ));
    echo ($output == "undefined" ? '{ "message": "ok" }' : '{ "message": ' . json_encode($output) . ' }');
} else {
    echo '{ "message": "bugger off!" }';
}
?>
