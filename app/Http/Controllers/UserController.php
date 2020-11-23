<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Cache;

class UserController extends Controller
{
    public function userOnlineStatus()
    {
        $users = khachhang::get();
    
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->Id_KH))
                echo "User " . $user->Ten_KH . " is online.";
            else
                echo "User " . $user->Ten_KH . " is offline.";
        }
    }
}
