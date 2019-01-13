<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\EventRepository;

class EventController extends Controller
{

    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(EventRepository $repository){
        $this->repository = $repository;
    }

    public function create(Request $request)
    {
       /* $v = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:3|confirmed',
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }*/

        $event = $this->repository->create( $request::all() );
        
        return response()->json(['status' => 'success'], 200);
    }

}
