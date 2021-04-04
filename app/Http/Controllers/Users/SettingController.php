<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
class SettingController extends Controller
{
    public function main() {
       return view('pages.users.setting');
    }
}
