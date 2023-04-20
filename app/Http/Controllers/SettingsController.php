<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsFormRequest;
use App\Models\Setting;
use Exception;

class SettingsController extends Controller
{

    /**
     * Display a listing of the settings.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settings = Setting::paginate(15);

        return view('settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new setting.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('settings.create');
    }

    /**
     * Store a new setting in the storage.
     *
     * @param App\Http\Requests\SettingsFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(SettingsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Setting::create($data);

            return redirect()->route('settings.setting.index')
                ->with('success_message', 'Setting was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified setting.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $setting = Setting::findOrFail($id);

        return view('settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified setting.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        

        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the specified setting in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\SettingsFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, SettingsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $setting = Setting::findOrFail($id);
            $setting->update($data);

            return redirect()->route('settings.setting.index')
                ->with('success_message', 'Setting was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified setting from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $setting = Setting::findOrFail($id);
            $setting->delete();

            return redirect()->route('settings.setting.index')
                ->with('success_message', 'Setting was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
