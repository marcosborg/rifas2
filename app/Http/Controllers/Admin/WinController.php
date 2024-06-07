<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWinRequest;
use App\Http\Requests\StoreWinRequest;
use App\Http\Requests\UpdateWinRequest;
use App\Models\Star;
use App\Models\StarPlay;
use App\Models\User;
use App\Models\Win;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WinController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('win_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wins = Win::with(['star', 'star_play', 'user'])->get();

        return view('admin.wins.index', compact('wins'));
    }

    public function create()
    {
        abort_if(Gate::denies('win_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stars = Star::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $star_plays = StarPlay::pluck('payed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.wins.create', compact('star_plays', 'stars', 'users'));
    }

    public function store(StoreWinRequest $request)
    {
        $win = Win::create($request->all());

        return redirect()->route('admin.wins.index');
    }

    public function edit(Win $win)
    {
        abort_if(Gate::denies('win_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stars = Star::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $star_plays = StarPlay::pluck('payed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $win->load('star', 'star_play', 'user');

        return view('admin.wins.edit', compact('star_plays', 'stars', 'users', 'win'));
    }

    public function update(UpdateWinRequest $request, Win $win)
    {
        $win->update($request->all());

        return redirect()->route('admin.wins.index');
    }

    public function show(Win $win)
    {
        abort_if(Gate::denies('win_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $win->load('star', 'star_play', 'user');

        return view('admin.wins.show', compact('win'));
    }

    public function destroy(Win $win)
    {
        abort_if(Gate::denies('win_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $win->delete();

        return back();
    }

    public function massDestroy(MassDestroyWinRequest $request)
    {
        $wins = Win::find(request('ids'));

        foreach ($wins as $win) {
            $win->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
