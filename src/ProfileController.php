<?php


namespace WebFlax\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function update(Request $request,$id)
    {

        $user = User::find($id);

        $user->address = $request['address'];
        $user->save();

    }
}

