<?php

namespace App\Http\Controllers\Admin;

use App\Boardroom;
use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBookingRequest;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Resource;
use App\User;

class BookingsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('booking_access'), 403);

        $bookings = Booking::all();

        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('booking_create'), 403);

        $owners = User::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $room_names = Boardroom::all()->pluck('room_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $resources_neededs = Resource::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bookings.create', compact('owners', 'room_names', 'resources_neededs'));
    }

    public function store(StoreBookingRequest $request)
    {
        abort_unless(\Gate::allows('booking_create'), 403);

        $booking = Booking::create($request->all());

        return redirect()->route('admin.bookings.index');
    }

    public function edit(Booking $booking)
    {
        abort_unless(\Gate::allows('booking_edit'), 403);

        $owners = User::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $room_names = Boardroom::all()->pluck('room_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $resources_neededs = Resource::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $booking->load('owner', 'room_name', 'resources_needed');

        return view('admin.bookings.edit', compact('owners', 'room_names', 'resources_neededs', 'booking'));
    }

    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        abort_unless(\Gate::allows('booking_edit'), 403);

        $booking->update($request->all());

        return redirect()->route('admin.bookings.index');
    }

    public function show(Booking $booking)
    {
        abort_unless(\Gate::allows('booking_show'), 403);

        $booking->load('owner', 'room_name', 'resources_needed');

        return view('admin.bookings.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        abort_unless(\Gate::allows('booking_delete'), 403);

        $booking->delete();

        return back();
    }

    public function massDestroy(MassDestroyBookingRequest $request)
    {
        Booking::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
