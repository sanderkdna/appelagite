<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessagesFormRequest;
use App\Models\Message;
use Exception;

class MessagesController extends Controller
{

    /**
     * Display a listing of the messages.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $messages = Message::paginate(15);

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new message.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('messages.create');
    }

    /**
     * Store a new message in the storage.
     *
     * @param App\Http\Requests\MessagesFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(MessagesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Message::create($data);

            return redirect()->route('messages.message.index')
                ->with('success_message', 'Message was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified message.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified message.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $message = Message::findOrFail($id);
        

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified message in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\MessagesFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, MessagesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $message = Message::findOrFail($id);
            $message->update($data);

            return redirect()->route('messages.message.index')
                ->with('success_message', 'Message was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified message from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $message = Message::findOrFail($id);
            $message->delete();

            return redirect()->route('messages.message.index')
                ->with('success_message', 'Message was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
