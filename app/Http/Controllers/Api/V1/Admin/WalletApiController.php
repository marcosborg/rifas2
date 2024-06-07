<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Http\Resources\Admin\WalletResource;
use App\Models\StarPlay;
use App\Models\User;
use App\Models\Wallet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WalletApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WalletResource(Wallet::with(['user', 'star_play'])->get());
    }

    public function store(StoreWalletRequest $request)
    {
        $wallet = Wallet::create($request->all());

        return (new WalletResource($wallet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Wallet $wallet)
    {
        abort_if(Gate::denies('wallet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WalletResource($wallet->load(['user', 'star_play']));
    }

    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        $wallet->update($request->all());

        return (new WalletResource($wallet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Wallet $wallet)
    {
        abort_if(Gate::denies('wallet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wallet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function walletsByStarPlayId($star_play_id)
    {
        return Wallet::where([
            'star_play_id' => $star_play_id
        ])->first();
    }

    public function starPlayById(Request $request)
    {
        return StarPlay::find($request->star_play_id)->load('star.award');
    }

    public function tranferValue(Request $request)
    {

        $wallet = new Wallet;
        $wallet->user_id = $request->user()->id;
        $wallet->star_play_id = $request->star_play_id;
        $wallet->save();

        $star_play = StarPlay::find($request->star_play_id)->load('star.award');
        
        $user = User::find($request->user()->id);
        $credits = $user->wallet;
        $user->wallet = $credits + $star_play->star->award->credits;
        $user->save();

    }

}