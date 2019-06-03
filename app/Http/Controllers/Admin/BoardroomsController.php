<?php

namespace App\Http\Controllers\Admin;

use App\Boardroom;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBoardroomRequest;
use App\Http\Requests\StoreBoardroomRequest;
use App\Http\Requests\UpdateBoardroomRequest;

class BoardroomsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('boardroom_access'), 403);

        $boardrooms = Boardroom::all();

        return view('admin.boardrooms.index', compact('boardrooms'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('boardroom_create'), 403);

        return view('admin.boardrooms.create');
    }

    public function store(StoreBoardroomRequest $request)
    {
        abort_unless(\Gate::allows('boardroom_create'), 403);

        $boardroom = Boardroom::create($request->all());

        return redirect()->route('admin.boardrooms.index');
    }

    public function edit(Boardroom $boardroom)
    {
        abort_unless(\Gate::allows('boardroom_edit'), 403);

        return view('admin.boardrooms.edit', compact('boardroom'));
    }

    public function update(UpdateBoardroomRequest $request, Boardroom $boardroom)
    {
        abort_unless(\Gate::allows('boardroom_edit'), 403);

        $boardroom->update($request->all());

        return redirect()->route('admin.boardrooms.index');
    }

    public function show(Boardroom $boardroom)
    {
        abort_unless(\Gate::allows('boardroom_show'), 403);

        return view('admin.boardrooms.show', compact('boardroom'));
    }

    public function destroy(Boardroom $boardroom)
    {
        abort_unless(\Gate::allows('boardroom_delete'), 403);

        $boardroom->delete();

        return back();
    }

    public function massDestroy(MassDestroyBoardroomRequest $request)
    {
        Boardroom::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
