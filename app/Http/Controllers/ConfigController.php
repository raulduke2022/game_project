<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigRequest;
use App\Models\Config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configs = Config::paginate(10);
        return view('admin/config/index', compact('configs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/config/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConfigRequest $request)
    {
        Config::create($request->all());
        session()->flash('success', 'Настройки успешно добавлены');
        return redirect()->route('configs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Config $config)
    {
        return view('admin/config/show', compact('config'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Config $config)
    {
        return view('admin/config/edit', compact('config'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConfigRequest $request, Config $config)
    {
        session()->flash('success', 'Настройки были успешно обновлены');
        $config->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Config $config)
    {
        $config->delete();
        session()->flash('success', 'Настройки были успешно удалены');
        return redirect()->back();
    }
}
