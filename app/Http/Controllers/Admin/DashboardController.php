<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * @todo complete this functionality
 *
 * Class DashboardController
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index');
    }
}
