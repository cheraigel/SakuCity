<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyResourceRequest;
use App\Http\Requests\StoreResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Resource;

class ResourcesController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('resource_access'), 403);

        $resources = Resource::all();

        return view('admin.resources.index', compact('resources'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('resource_create'), 403);

        return view('admin.resources.create');
    }

    public function store(StoreResourceRequest $request)
    {
        abort_unless(\Gate::allows('resource_create'), 403);

        $resource = Resource::create($request->all());

        return redirect()->route('admin.resources.index');
    }

    public function edit(Resource $resource)
    {
        abort_unless(\Gate::allows('resource_edit'), 403);

        return view('admin.resources.edit', compact('resource'));
    }

    public function update(UpdateResourceRequest $request, Resource $resource)
    {
        abort_unless(\Gate::allows('resource_edit'), 403);

        $resource->update($request->all());

        return redirect()->route('admin.resources.index');
    }

    public function show(Resource $resource)
    {
        abort_unless(\Gate::allows('resource_show'), 403);

        return view('admin.resources.show', compact('resource'));
    }

    public function destroy(Resource $resource)
    {
        abort_unless(\Gate::allows('resource_delete'), 403);

        $resource->delete();

        return back();
    }

    public function massDestroy(MassDestroyResourceRequest $request)
    {
        Resource::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
