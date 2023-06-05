<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.list');
    }
    public function list(Request $request)
    {
        return datatables()
            ->eloquent(User::query()->when(!$request->order, function ($query) {
                $query->latest('created_at');
            }))
            ->addColumn('action', function ($user) {
                return '
            <div class="d-flex">
                <form onsubmit="destroy(event)" action="" method="POST">
                    <input type="hidden" name="_token" value="' . @csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn-danger btn btn-sm  mr-2">
                        <i class="fa fa-trash"></i>
                    </button>
                    </td>
                </form>
                <button
                type="button"
                class="btn btn-primary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#ModalEdit' . $user->id . '"
                >
                    <i class="fa fa-pen-alt"></i>
                </button>
            </div>
        ';
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }
}
