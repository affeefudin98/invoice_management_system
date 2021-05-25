<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Rules\MatchPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class AccountController extends Controller
{
    public function profile()
    {
        return view('client.accounts.profile');
    }

    public function password()
    {
        return view('client.accounts.password');
    }

    public function profileUpdate(Request $request, User $user)
    {
        //dd($request->all());
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'ic_no' => ['required', 'string', ],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        // $data = request()->only(['name', 'email']);

        $user = $user->update($request->all());

        // $user->name = $data['name'];
        // $user->email = $data['email'];

        // $user->update($data);

        return redirect(route('client.accounts.profile'));
    }

    public function upload(Request $request)
    {
        $data = request()->only(['picture']);

        if($request->hasFile('picture'))
        {
            $filename = auth()->user()->name.'-'.date("d-m-Y").'.'.$request->picture->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($request->picture));
            auth()->user()->update(['picture' => $filename]);
        }

        return redirect(route('client.accounts.profile', auth()->user()->id));
    }

    public function passwordUpdate(Request $request, User $user)
    {
        //dd($request->all());
        $request->validate([
            'password' => ['required', new MatchPassword],
            'new_password' => ['required'],
            'password_confirmation' => ['same:new_password'],
        ]);

        $data = request()->only(['new-password', 'password', 'password_confirmation']);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        
        return redirect(route('client.accounts.profile'));
        
    }
}