<?php

function save_mess() {
	$str = $_POST['name'] . '|' . $_POST['text'] . '|' . date('Y-m-d H:i:s'). "\n***\n";
	file_put_contents(MESSAGE_BOX, $str, FILE_APPEND);
}

function get_mess() {
	return file_get_contents(MESSAGE_BOX);
}

function array_mess($messages) {
	$messages = explode("\n***\n", $messages);
	array_pop($messages);
	return array_reverse($messages);
}

function print_arr($arr) {
	echo '<pre>' . print_r($arr, true) . '</pre>';
}

function get_format_message($message){
	return explode('|', $message);
}