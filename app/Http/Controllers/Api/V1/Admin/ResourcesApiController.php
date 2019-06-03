<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Resource;

class ResourcesApiController extends Controller
{
    public function index()
    {
        $resources = Resource::all();

        return $resources;
    }

    public function store(StoreResourceRequest $request)
    {
        return Resource::create($request->all());
    }

    public function update(UpdateResourceRequest $request, Resource $resource)
    {
        return $resource->update($request->all());
    }

    public function show(Resource $resource)
    {
        return $resource;
    }

    public function destroy(Resource $resource)
    {
        return $resource->delete();
    }
}
