<?php

namespace App\Http\Controllers;

use illuminate\Http\Response;
use App\Traits\ApiResponser;
use illuminate\Http\Request;
use DB;
use App\Service\User1Service;

class User2Controller extends Controller {
    use ApiResponser;

    public $user2Service;

    public function __construct(User2Service $user2Service) {
        $this->user2Service = $user2Service;
    }
}