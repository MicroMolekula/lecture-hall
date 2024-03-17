<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return FileResource::collection(File::all());
    }
}
