<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

/**
 * @todo complete this functionality
 *
 * Class DashboardController
 * @package App\Http\Controllers\User
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account()
    {
        return view('user.account');
    }
}
