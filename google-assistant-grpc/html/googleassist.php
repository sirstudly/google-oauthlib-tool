<?php
// deployed to EC2 instance running processor; save to /var/www/html/
// googleassist.sh needs to be runnable as sudo as the apache user
// ie. sudo visudo
// apache ALL=(ALL) NOPASSWD: /home/ec2-user/google-assistant-grpc/googleassist.sh
header('Content-Type: application/json');
chdir('/home/ec2-user/google-assistant-grpc');
if( $_GET['command'] == 'projectoron' ) {
    $output = trim(shell_exec( 'sudo /home/ec2-user/google-assistant-grpc/googleassist.sh "turn projector on"' ));
    echo ($output == "undefined" ? '{ "message": "ok" }' : '{ "message": ' . json_encode($output) . ' }');
} elseif( $_GET['command'] == 'projectoroff' ) {
    $output = trim(shell_exec( 'sudo /home/ec2-user/google-assistant-grpc/googleassist.sh "lights out"' ));
    echo ($output == "undefined" ? '{ "message": "ok" }' : '{ "message": ' . json_encode($output) . ' }');
} elseif( $_GET['command'] == 'time' ) {
    $output = trim(shell_exec( 'sudo /home/ec2-user/google-assistant-grpc/googleassist.sh "what time is it?"' ));
    echo ($output == "undefined" ? '{ "message": "ok" }' : '{ "message": ' . json_encode($output) . ' }');
} else {
    echo '{ "message": "bugger off!" }';
}
?>
