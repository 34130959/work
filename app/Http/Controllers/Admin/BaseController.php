<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    // 分页的数量
    protected $pagesize;

    public function __construct()
    {
        $this->pagesize = env('PAGESIZE');
    }
}
