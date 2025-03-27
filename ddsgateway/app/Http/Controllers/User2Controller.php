<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;        // Response Components
use App\Traits\ApiResponser;        // <-- use to standardize our code for api response
use Illuminate\Http\Request;        // <-- handling http request in lumen
use App\Services\User2Service;      // user2 Services

class User2Controller extends Controller 
{
    // use to add your Traits ApiResponser
    use ApiResponser;

    /**
     * The service to consume the User2 Microservice
     * @var User2Service
     */
    public $user2Service;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(User2Service $user2Service)
    {
        $this->user2Service = $user2Service;
    }

    /**
     * Return the list of users
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->user2Service->obtainUsers2());
    }

    /**
     * Create a new user record
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        return $this->successResponse(
            $this->user2Service->createUser2($request->all()),
            Response::HTTP_CREATED
        );
    }

    /**
     * Obtain and show one user by ID
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->successResponse($this->user2Service->getUser2($id));
    }

    /**
     * Update an existing user record
     * @param Request $request
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->successResponse(
            $this->user2Service->updateUser2($id, $request->all())
        );
    }

    /**
     * Remove an existing user
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->successResponse($this->user2Service->deleteUser2($id));
    }
}