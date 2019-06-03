<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Boardroom;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBoardroomRequest;
use App\Http\Requests\UpdateBoardroomRequest;

class BoardroomsApiController extends Controller
{
    public function index()
    {
        $boardrooms = Boardroom::all();

        return $boardrooms;
    }

    public function store(StoreBoardroomRequest $request)
    {
        return Boardroom::create($request->all());
    }

    public function update(UpdateBoardroomRequest $request, Boardroom $boardroom)
    {
        return $boardroom->update($request->all());
    }

    public function show(Boardroom $boardroom)
    {
        return $boardroom;
    }

    public function destroy(Boardroom $boardroom)
    {
        return $boardroom->delete();
    }
}
