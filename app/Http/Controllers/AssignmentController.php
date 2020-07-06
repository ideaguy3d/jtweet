<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public bool $completed;
    
    //
    public function complete() {
        $this->completed = true;
        $this->save();
    }
}
