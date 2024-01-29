<?php namespace krupka\trapManager\Http\Controllers;

use Illuminate\Routing\Controller;
use krupka\trapManager\Models\Manager;
use krupka\trapManager\Http\Resources\TrapResource; // Corrected use statement

class TrapsController extends Controller
{
    public function index()
    {
        $traps = Manager::all();
        return TrapResource::collection($traps);
    }

    public function show($id)
    {
        $trap = Manager::findOrFail($id);
        return TrapResource::make($trap);
    }
}
