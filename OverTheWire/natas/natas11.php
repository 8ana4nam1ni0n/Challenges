<?php

$defaultdata = array( "showpassword"=> "yes", "bgcolor"=>"#ffffff");
$encryptedMsg = base64_decode('ClVLIh4ASCsCBE8lAxMacFMZV2hdVVotEhhUJQNVAmhSEV4sFxFeaAw%3D');
$keyRetrieved = 'qw8J';

function xor_encrypt($in, $key) {
    $text = $in;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}

function getKey($encoded, $in) {
	$cipherText = $encoded;
	$text = $in;
	$outText = '';

	for($i=0;$i<strlen($text);$i++) {
		$outText .= $text[$i] ^ $cipherText[$i % strlen($cipherText)];
	}
	return $outText;
}



function loadData($def) {
    global $_COOKIE;
    $mydata = $def;
    if(array_key_exists("data", $_COOKIE)) {
    $tempdata = json_decode(xor_encrypt(base64_decode($_COOKIE["data"])), true);
    if(is_array($tempdata) && array_key_exists("showpassword", $tempdata) && array_key_exists("bgcolor", $tempdata)) {
        if (preg_match('/^#(?:[a-f\d]{6})$/i', $tempdata['bgcolor'])) {
        $mydata['showpassword'] = $tempdata['showpassword'];
        $mydata['bgcolor'] = $tempdata['bgcolor'];
        }
    }
    }
    return $mydata;
}

function saveData($d) {
    setcookie("data", base64_encode(xor_encrypt(json_encode($d))));
}


//$data = loadData($defaultdata);

//echo 'The key is ' . getKey($encryptedMsg, json_encode($defaultdata));
echo 'The Cookie to use for login in is: ' . base64_encode(xor_encrypt(json_encode($defaultdata), $keyRetrieved));

?>
