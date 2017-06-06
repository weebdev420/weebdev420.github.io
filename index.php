<?php 

define('MESSAGE_BOX', 'gb.txt');


header("Contennt-type: text/html; charset=utf-8");
error_reporting(-1);

require_once 'funcs.php';

if (!empty($_POST)) {
	save_mess();
	header("Location: {$_SERVER['PHP_SELF']}");
	exit;
}

$messages = get_mess();
$messages = array_mess($messages);
// print_arr($messages);

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Guest book</title>

 	<style>
 		.message{
 			border: 1px solid #ccc;
 			padding: 10px;
 			margin-bottom: 20px;

 		}


 	</style>
 </head>
 <body>
 	
 	<form action="index.php" method="post">
 		<p>
 			<label for="name">Name</label><br>
 			<input type="text" name="name" id="name">
 		</p>
 		<p>
 			<label for="text">Text</label><br>
 			<textarea type="text" name="text"></textarea>
 		</p>
 		<button type="submit">--Send--</button>


 	</form>

 	<hr>

 	<?php if (!empty($messages)): ?>
 		<?php foreach ($messages as $message): ?>
 			<?php $message = get_format_message($message) ?>
 			<div class="message">
 				<p> Автор: <?=$message[0]?> | Дата: <?=$message[2]?> </p>
 				<div><?=nl2br($message[1])?></div>
 			</div>
 		<?php endforeach; ?>
 	<?php endif; ?>	
 
 </body>
 </html>