<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'protocol'    => 'smtp',
	'smtp_host'   => 'mail.digicoders.in',
	// 'smtp_host'   => 'mail.programmerkashyap.com',
	'smtp_port'   => 465,
	'smtp_user'   => 'noreply@digicoders.in',
	// 'smtp_user'   => 'student@programmerkashyap.com',
	'smtp_pass'   => 'VU1*M3W5WGggqakt',
	// 'smtp_pass'   => 'v_7cNZhLo!s#Aqxa',
	'smtp_crypto' => 'ssl',
	'mailtype'    => 'html',
	'charset'     => 'utf-8',
	'newline'     => "\r\n",
	'crlf'        => "\r\n",
	'wordwrap'    => TRUE
);
