<?php
namespace App\Services\Contracts;

/** 
 * Send Email Interface functionality 
 *
 *
 */
interface SendEmailInterface {

	public function sendMail(array $userDetails);
}