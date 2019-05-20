<?php
declare(strict_types=1);
namespace App\Services\Contracts;

/** 
 * Send Email Interface functionality 
 *
 *
 */
interface SendEmailInterface {

	public function sendMail(array $userDetails);
}