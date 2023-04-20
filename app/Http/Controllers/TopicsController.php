<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopicsFormRequest;
use App\Models\Topic;
use Exception;

class TopicsController extends Controller
{

    /**
     * Display a listing of the topics.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $topics = Topic::paginate(15);

        return view('topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new topic.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('topics.create');
    }

    /**
     * Store a new topic in the storage.
     *
     * @param App\Http\Requests\TopicsFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(TopicsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Topic::create($data);

            return redirect()->route('topics.topic.index')
                ->with('success_message', 'Topic was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified topic.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $topic = Topic::findOrFail($id);

        return view('topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified topic.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        

        return view('topics.edit', compact('topic'));
    }

    /**
     * Update the specified topic in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\TopicsFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, TopicsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $topic = Topic::findOrFail($id);
            $topic->update($data);

            return redirect()->route('topics.topic.index')
                ->with('success_message', 'Topic was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified topic from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $topic = Topic::findOrFail($id);
            $topic->delete();

            return redirect()->route('topics.topic.index')
                ->with('success_message', 'Topic was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
