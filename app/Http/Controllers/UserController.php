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
              <form onsubmit="destroy(event)" action="' .  route('user.destroy', $user->id) . '" method="POST">
                    <input type="hidden" name="_token" value="' . @csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn-danger btn btn-sm  mr-2">
                        <i class="fa fa-trash"></i>
                    </button>
                    </td>
                </form>
        ';
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();

        toastr()->success("Sukses Menghapus User $user->name");
    }
}
