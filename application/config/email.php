<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'protocol' => 'smtp',
	// 'smtp_host'   => 'mail.digicoders.in',
	'smtp_host' => 'smtp.gmail.com',
	// 'smtp_host'   => 'mail.programmerkashyap.com',
	// 'smtp_port'   => 465,
	'smtp_port' => 587,
	// 'smtp_user'   => 'noreply@digicoders.in',
	'smtp_user' => 'digicodersdevelopment@gmail.com',
	'smtp_pass' => 'xumfdsvhorxrltxx',
	// 'smtp_crypto' => 'ssl',
	'smtp_crypto' => 'tls',
	'mailtype' => 'html',
	'charset' => 'utf-8',
	'newline' => "\r\n",
	'crlf' => "\r\n",
	'wordwrap' => TRUE
);
