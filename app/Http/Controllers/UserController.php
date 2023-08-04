<?php


namespace App\Http\Controllers;

use App\Models\BindRole;
use App\Models\Cart;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use App\Models\Item;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UserController extends Controller
{
    use HasApiTokens, HasFactory, Notifiable;

    public function register_seller(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => 'required|min:10|numeric|unique:' . User::class,
            'company' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $comp = Company::create([
            'company' => $request->company,
            'seller_id' => $user->id,
        ]);

        $role = BindRole::create([
            'role_id' => '1',
            'user_id' => $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);

    }

    public function changeInf(Request $request)
    {
        $userId = auth()->user()->getAuthIdentifier();
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $pass = $request->pass;
        if (User::where('email', '=', $email and 'id' !== $userId)->exists()) {
            return (['res' => 'exist']);
        }
        if (User::where('phone', '=', $phone and 'id' !== $userId)->exists()) {
            return (['res' => 'phone']);
        }
        if ($data = User::where('id', $userId)->first()) {
            $pass = Hash::check($request->pass, $data->password);
            if ($pass) {
                User::where('id', $userId)->update(['name' => $name, 'phone' => $phone, 'email' => $email]);
                return (['res' => 'success']);
            } else {
                return (['res' => 'fail']);
            }
        }
    }

    public function profile()
    {
        $userId = auth()->user()->getAuthIdentifier();
        $user = \App\Models\User::where('id', $userId)->first();
        $company = \App\Models\Company::where('seller_id', $userId)->first();
        if (BindRole::where('user_id', $userId)->exists()) {
            $bindRole = BindRole::where('user_id', $userId)->first();
            $role = Role::where('id', $bindRole->role_id)->first();
            $isAdmin = $bindRole->role_id == 2;
            $isSeller = $bindRole->role_id == 1;
            return view('pages.profile', ['isAdmin' => $isAdmin, 'isSeller' => $isSeller, 'user' => $user, 'role' => $role, 'company' => $company]);
        }
        return view('pages.profile', ['isAdmin' => '', 'isSeller' => '', 'user' => $user, 'role' => '', 'company' => '']);
    }

    public function showUser(Request $request)
    {
        $admId = auth()->user()->getAuthIdentifier();
        $userId = $request->user_id;
        if ($admId == $userId) {
            return redirect()->intended('/profile');
        }
        $user = \App\Models\User::where('id', $userId)->first();
        $company = \App\Models\Company::where('seller_id', $userId)->first();
        $roleAdm = BindRole::where('user_id', $admId)->first()->role_id;
        if (BindRole::where('user_id', $userId)->exists()) {
            $bindRole = BindRole::where('user_id', $userId)->first();
            $role = Role::where('id', $bindRole->role_id)->first();
            $isAdmin = $bindRole->role_id == 2;
            $isSeller = $bindRole->role_id == 1;
            return view('pages.userProfile', ['user' => $user, 'isAdmin' => $isAdmin, 'isSeller' => $isSeller, 'role' => $role, 'company' => $company, 'adm' => $roleAdm]);
        }
        return view('pages.userProfile', ['user' => $user, 'isAdmin' => '', 'isSeller' => '', 'role' => '', 'company' => '', 'adm' => $roleAdm]);
    }

    public function deleteUser()
    {
        $userId = auth()->user()->getAuthIdentifier();
        User::where('id', $userId)->delete();
        Cart::where('user_id', $userId)->delete();
        Company::where('seller_id', $userId)->delete();
        Item::where('seller_id', $userId)->delete();
        BindRole::where('user_id', $userId)->delete();
        return redirect()->intended('/');
    }
}

