<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\Contract\CookingRequestRepositoryInterface;
use App\Repository\CookingRequestRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class CookingRequestController
 * @package App\Http\Controllers\User
 */
class CookingRequestController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request, CookingRequestRepositoryInterface $cookingRequestRepository)
    {
        $cookingRequestValues = $request->validate([
            'cook' => 'exists:cooks,id',
            'availability' => 'exists:availabilities,id'
        ]);

        $cookingRequest = $cookingRequestRepository->create([
            'cook_id' => $cookingRequestValues['cook'],
            'availability_id' => $cookingRequestValues['availability'],
            'user_id' => auth()->user()->getAuthIdentifier(),
            'approved' => 0
        ]);

        if (!is_null($cookingRequest)) {
            return redirect()->back()->withSuccesses('Successfully created request.');
        } else {
            return redirect()->back()->withErrors('Could not create request.');
        }
    }
}