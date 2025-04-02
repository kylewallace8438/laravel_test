<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ListAccountRequest;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\ShowAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\DestroyAccountRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

use Exception;

class AccountController extends Controller
{

    public function list(ListAccountRequest $request)
    {
        try {
            $paginate = $request->get('paginate');
            $accounts = Account::paginate($paginate);
            return response()->json($accounts);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        try {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $account = Account::create($data);
            return response()->json($account);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowAccountRequest $request, string $id)
    {
        try {
            $account = Account::find($id);
            return response()->json($account);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, string $id)
    {
        try {
            $account = Account::find($id);
            $account->fill($request->all());
            $account->save();
            return response()->json($account);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            $account = Account::find($id);
            $account->delete();
            return response()->json($account);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
