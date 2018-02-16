<?php namespace App\Http\Controllers;

use App\Repository\Contract\CookRepositoryInterface;

/**
 * Class GuestController
 * @package App\Http\Controllers
 */
class GuestController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('guest.index');
    }

    public function cooks(CookRepositoryInterface $cooks)
    {
        return view('guest.cooks')->with('cooks', $cooks->paginateCooks(15));
    }
}
