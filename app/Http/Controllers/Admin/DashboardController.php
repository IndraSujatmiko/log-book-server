<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Device;


class DashboardController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        $devices = Device::all(); // ambil semua device

        return view('admin.dashboard', compact('locations', 'devices'));
    }
}

