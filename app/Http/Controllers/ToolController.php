<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToolRequest;
use App\Http\Requests\UpdateToolRequest;
use App\Models\Tool;

class ToolController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        return view('tools.show', compact('tool'));
    }
}
