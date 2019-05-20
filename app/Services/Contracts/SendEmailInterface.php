<?php
declare(strict_types=1);
namespace App\Services\Contracts;

interface SendEmailInterface {

/** 
 * Send Email Interface functionality 
 *
 */

    public function sendMail(array $userDetails);
}