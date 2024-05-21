<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Market;
use App\Models\User;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $user = User::oldest('name')->get();
        $market = Market::oldest('name')->get();
        return view('users.index', compact('market', 'user'));
    }

    public function json()
    {
        $users = User::with('market')->with('roles')->oldest('name')->get();

        return DataTables::of($users)->addColumn('aksi', function ($data) {
            return '<button type="button" class="btn btn-icon btn-outline-warning btn-sm btn-edit" id="btn-edit" data-url="users/' . $data->id . '" data-method="PUT" data-id="' . $data->id . '"> <i class="ti ti-edit"> </i> </button> <button type="button" class="btn btn-icon btn-outline-danger btn-sm btn-delete" id="btn-delete" data-id="' . $data->id .  '"> <i class="ti ti-trash"> </i> </button> ';
        })->editColumn('date', function ($data) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d F Y');
            return $formatedDate;
        })->addColumn('roles', function ($data) {
            return $data->roles->pluck('name')->implode(', ');
        })->rawColumns(['aksi'])->addIndexColumn()->toJson();
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $createUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'market_id' => $request->market_id,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            'success' => true,
            'message' => __('Data berhasil disimpan.'),
            'data' => $createUser
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil diambil.'),
            'data' => $user
        ]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'market_id' => $request->market_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil diubah.'),
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => __('Data berhasil dihapus.'),
            'data' => $user
        ]);
    }
}
