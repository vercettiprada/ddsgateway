<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;
use App\Services\User1Service;



class UserController_Old extends Controller
{
    use ApiResponser;

    public $user1Service;

    public function __construct(User1Service $user1Service)
    {
       $this->user1Service = $user1Service;
    }

  

    public function index()
    {
       return $this->successResponse($this->userService->obtainUsers1());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->user1Service->createUser1($request->all(),Response::HTTP_CREATED));
    }

    public function show($id)
    {
   
    }
public function delete($id)
{

  

    }
}