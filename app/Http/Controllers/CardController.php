<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\CardStoreRequest;
use App\Http\Requests\CardUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Card::class);

        $search = $request->get('search', '');

        $students = Student::pluck('name', 'id');

        $cards = Card::search($search)
            ->latest()
            ->get();
        ;

        return view('app.cards.index', compact('cards', 'students'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Card::class);

        $students = Student::pluck('name', 'id');

        return view('app.cards.create', compact('students'));
    }

    /**
     * @param \App\Http\Requests\CardStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardStoreRequest $request)
    {
        $this->authorize('create', Card::class);

        $validated = $request->validated();

        $card = Card::create($validated);

        return redirect()
            ->route('cards.edit', $card)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Card $card
     * @return \Illuminate\Http\Response
     */
    

    public function show(Request $request, Card $card)
    {
        $this->authorize('view', $card);

        // Get the currently logged-in user
        $loggedInUser = Auth::user();

        // Retrieve the student associated with the card
        $student = $card->student;

        if ($student) {
            // Use the student details as needed
            $studentName = $student->name;
            $studentId = $student->id;

            // Get details of the currently logged-in user
            $loggedInUserName = $loggedInUser->name;
            $loggedInUserEmail = $loggedInUser->email;
  
        }

        // Handle the case where no student is associated with the card
        return view('app.cards.show', compact('card', 'student'));
    }



    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Card $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Card $card)
    {
        $this->authorize('update', $card);

        $students = Student::pluck('name', 'id');

        return view('app.cards.edit', compact('card', 'students'));
    }

    /**
     * @param \App\Http\Requests\CardUpdateRequest $request
     * @param \App\Models\Card $card
     * @return \Illuminate\Http\Response
     */
    public function update(CardUpdateRequest $request, Card $card)
    {
        $this->authorize('update', $card);

        $validated = $request->validated();

        $card->update($validated);

        return redirect()
            ->route('cards.edit', $card)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Card $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Card $card)
    {
        $this->authorize('delete', $card);

        $card->delete();

        return redirect()
            ->route('cards.index')
            ->withSuccess(__('crud.common.removed'));
    }

    /**
     * @param \App\Http\Requests\CardUpdateRequest $request
     * @param \App\Models\Card $card
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus(Card $card)
    {
        $this->authorize('update', $card);

        $newStatus = $card->status === 'active' ? 'inactive' : 'active';
        $card->status = $newStatus;
        $card->save();

        return redirect()
            ->route('cards.index', $card)
            ->withSuccess(__('crud.common.saved'));
    }
}
