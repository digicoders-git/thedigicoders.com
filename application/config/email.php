<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'protocol'          => 'smtp',
	// 'smtp_host'      => 'mail.digicoders.in',
	'smtp_host'         => 'smtp.gmail.com',
	// 'smtp_port'      => 465,
	'smtp_port'         => 587,
	// 'smtp_user'      => 'noreply@digicoders.in',
	'smtp_user'         => 'devdigicoders@gmail.com',
	'smtp_pass'         => 'iiiolwdzarguhsui',
	// 'smtp_crypto'    => 'ssl',
	'smtp_crypto'       => 'tls',
	'mailtype'          => 'html',
	'charset'           => 'utf-8',
	'newline'           => "\r\n",
	'crlf'              => "\r\n",
	'wordwrap'          => TRUE,
	'smtp_conn_options' => array(
		'ssl' => array(
			'verify_peer'      => FALSE,
			'verify_peer_name' => FALSE,
			'allow_self_signed' => TRUE
		)
	)
);

