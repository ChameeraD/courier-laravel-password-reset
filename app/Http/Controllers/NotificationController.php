<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Courier\CourierClient;

class NotificationController extends Controller
{
    public function store()
    {
        $courier = new CourierClient("https://api.courier.com/", "pk_prod_2PFXS8MMET4Q4JMEJHDA6GZ7TR55");

        $result = $courier->sendEnhancedNotification(
          (object) [
            'to' => [
              'subject' => "Password Reset",
              'email' => "chameeradulanga87@gmail.com",
            ],
            'template' => "6D64YV33QYMGWHKGKT3MYC2GC291", 
            'data' => [
              'UserName' => "User",
              'ResetPasswordLink' => "Reset Password Link Goes Here",
            ],
          ],
        );
            
        return [
            "status" => 1,
            "data" => $result->requestId
        ];
    }
}
