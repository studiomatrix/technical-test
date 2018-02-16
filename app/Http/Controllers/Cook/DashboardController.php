<?php namespace App\Http\Controllers\Cook;

use App\CookingRequest;
use App\Http\Controllers\Controller;
use App\Repository\Contract\CookingRequestRepositoryInterface;
use App\Repository\Contract\CookRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * @todo complete this functionality
 *
 * Class DashboardController
 * @package App\Http\Controllers\Cook
 */
class DashboardController extends Controller
{
    /**
     * @param CookRepositoryInterface $cookRepository
     * @return View
     */
    public function index(CookRepositoryInterface $cookRepository)
    {
        if (!$cook = $cookRepository->where('user_id', auth()->user()->getAuthIdentifier())->first()) {
            abort(404);
        }

        return view('cook.index')
            ->with('cookingRequests', $cook->cookingRequests()->paginate())
            ->with('availabilities', $cook->availabilities()->get());
    }

    /**
     * @param CookingRequest $cookingRequest
     * @return RedirectResponse
     */
    public function approveCookingRequest(CookingRequest $cookingRequest)
    {
        if ($cookingRequest->cook->user_id != auth()->user()->getAuthIdentifier()) {
            abort(403);
        }

        if ($cookingRequest->approveRequest()) {
            return redirect()->back()->withSuccesses('Successfully approved cooking request.');
        } else {
            return redirect()->back()->withErrors('Could not approve cooking request.');
        }
    }

    /**
     * @param CookingRequest $cookingRequest
     * @return RedirectResponse
     */
    public function unapproveCookingRequest(CookingRequest $cookingRequest)
    {
        if ($cookingRequest->cook->user_id != auth()->user()->getAuthIdentifier()) {
            abort(403);
        }

        if ($cookingRequest->unapproveRequest()) {
            return redirect()->back()->withSuccesses('Successfully unapproved cooking request.');
        } else {
            return redirect()->back()->withErrors('Could not unapprove cooking request.');
        }
    }


    /**
     * @param CookingRequest $cookingRequest
     * @return RedirectResponse
     */
    public function deleteCookingRequest(CookingRequest $cookingRequest)
    {
        if ($cookingRequest->cook->user_id != auth()->user()->getAuthIdentifier()) {
            abort(403);
        }

        if ($cookingRequest->delete()) {
            return redirect()->back()->withSuccesses('Successfully deleted cooking request.');
        } else {
            return redirect()->back()->withErrors('Could not delete cooking request.');
        }
    }

    /**
     * @param CookingRequest $cookingRequest
     */
    public function approveCookingRequestAndReplaceExisting(CookingRequest $cookingRequest)
    {
        if ($cookingRequest->cook->user_id != auth()->user()->getAuthIdentifier()) {
            abort(403);
        }

        if (!$currentRequestForAvailability = $cookingRequest->availability->getApprovedCookingRequest()) {
            abort(404);
        }

        if ($currentRequestForAvailability->unapproveRequest() && $cookingRequest->approveRequest()) {
            return redirect()->back()->withSuccesses('Successfully replaced cooking request approval on availability.');
        } else {
            return redirect()->back()->withErrors('Could not replace cooking request approval on availability.');
        }
    }
}
