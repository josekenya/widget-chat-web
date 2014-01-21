<?php
	require_once 'server/auth.php';
	$version = '2.0.0b';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>QB Group Chat Room (XMPP)</title>
	<link rel="stylesheet" href="qbchatroom.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
	<script>
		var QBAPP = {
			app_id: '<?php echo $appId; ?>',
			auth_key: '<?php echo $authKey; ?>',
			auth_secret: '<?php echo $authSecret; ?>'
		};
		var FBAPP = {
			app_id: '368137086642884',
			graph_server: 'https://graph.facebook.com'
		};
		var CHAT = {
			server: 'chat.quickblox.com',
			bosh_server: 'http://chat.quickblox.com:5280',
			room_jid: '<?php echo $roomJid; ?>'
		};
	</script>
</head>
<body>
	<div id="fb-root"></div>
	<script src="js/flexible_styles.js"></script>
	
	<div id="main" class="layout">
		<div class="bubbles">
			<div class="bubble bubble_green version"><?php echo $version; ?></div>
			<div class="bubble bubble_blue"></div>
			<div class="bubble bubble_light_blue"></div>
		</div>
		<header class="header">
			<div class="center">
				<h1>QuickBlox<br><b>Chat Room</b></h1>
			</div>
		</header>
		
		<div id="auth">
			<div class="center">
				<button id="authFB" class="btn_fb"><span>Login with FB</span></button>
				<button id="authQB" class="btn_qb"><span>Login with QB</span></button>
			</div>
		</div>
		
		<div id="login-fom" class="hidden">
			<form action="#" class="center">
				<fieldset>
					<input id="login" type="text" placeholder="Login or email">
					<input id="pass" type="password" placeholder="Password">
				</fieldset>
				<button id="dataLogin" class="btn_qb"><span>Connect</span></button>
				<span class="not-registered">Not registered yet?<br>
					<a href="#" id="signUp">Register an account QuickBlox</a>
				</span>
			</form>
		</div>
	</div>
	
	<div id="connecting" class="layout hidden">
		<span class="progress">
			<p>Connecting. Please wait...</p>
			<progress></progress>
		</span>
	</div>
	
	<div id="signup-form" class="layout hidden">
		<form action="#" class="center" enctype="multipart/form-data">
			<fieldset>
				<input id="signup_name" type="text" placeholder="Full Name">
				<input id="signup_email" type="text" placeholder="Email">
				<input id="signup_login" type="text" placeholder="Login">
				<input id="signup_pass" type="password" placeholder="Password">
				<div class="uploader-wrap">
					<img src="images/upload.png" alt="upload">
					<input class="uploader-text" type="text" placeholder="User picture">
					<input id="signup_avatar" type="file" accept="image/*">
				</div>
			</fieldset>
			<button id="dataSignup" class="btn_qb"><span>Register</span></button>
		</form>
	</div>
	
	<div id="signup-success" class="layout hidden">
		<span class="progress">Thanks for your<br>registration!</span>
	</div>
	
	<div id="chat" class="layout hidden">
		<header class="chat-header">
			<a href="#" class="users"><span class="users-count">0</span></a>
			<a href="#" class="logout"><img src="images/logout.png" alt="logout"></a>
			<h2 class="chat-name">Group Chat</h2>
			<ul class="users-list hidden"></ul>
		</header>
		
		<section class="chat-content"></section>
		
		<footer class="chat-footer">
			<form action="#" id="send-message-form">
				<textarea id="message" placeholder="Enter Message" rows="1"></textarea>
				<a href="#" class="smile"><img src="images/smile.png" alt="smile"></a>
				<div class="smiles-list hidden"></div>
			</form>
		</footer>
	</div>
	
	<script src="js/libs/quickblox.js"></script>
	<script src="js/libs/strophe.js"></script>
	<script src="js/libs/strophe.muc.js"></script>
	<script src="js/libs/jquery.timeago.js"></script>
	<script src="js/libs/jquery.scrollTo-min.js"></script>

	<script src="js/smiles.js"></script>
	<script src="js/helpers.js"></script>
	<script src="qbchatroom.js"></script>
</body>
</html>
