<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;
class WorkerApiController extends Controller
{

    public function index()
    {
        return WorkerResource::collection(Worker::all());
    }

    public function show($id)
    {
        return new WorkerResource(Worker::findOrFail($id));
    }

}
