<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Mail\ContactMail;
use Session;
use Images;
use Yajra\Datatables\Datatables;
class SessionController extends Controller
{
    //
    public function login(){
      $this->validate(request(),[
        'email'=>'required|email',
        'password'=>'required'
      ]);
      $data = array(
        'email'=>request('email'),
        'password'=>request('password')
      );
      if(Auth::attempt($data)){
        return redirect('/');
      } else
        Session::flash('message','Error with login!');
        return redirect()->back();
    }
    public function logout(){
      Auth::logout();
      Session::flash('message','Logout success!');
      return redirect()->back();
    }

    public function contact(){
      $this->validate(request(),[
        'name'=>'required',
        'email'=>'required|email',
        'subject'=>'required|email',
        'message'=>'required|email',
      ]);
      $message = request('message');
      \Mail::to(auth()->user())->send(new ContactMail($message));
      Session::flash('message','Send mail success!');
      return redirect()->back();
    }

    public function getUsers(){

       $users = User::where('role_id','<>',0)->latest()->get();
       return Datatables::of($users)
            ->addColumn('role', function ($users) {

                if($users->role_id == 1)
                  $role = 'Admin';
                else $role = 'Guest';
                return $role;
            })
            ->addColumn('action', function ($users) {
                if($users->role_id == 2)
                  return '<a href="/admin/blockUser/'. $users->id.'" class="btn btn-xs btn-primary" onclick="javascript:return confirmDel()"><i class="glyphicon glyphicon-del"></i> Delete</a>';
            })
            ->make(true);
    }

    public function showUsers(){
      return view('admin/showUsers');
    }

    public function viewProfile(){
      $user = auth()->user();
      return view('admin/editProfile',compact('user'));
    }
    public function createUserGuess(){
      $this->validate(request(),[
        'name'=>'required|unique:users|max:255',
        'email'=>'required|unique:users|email',
        'password'=>'required',
      ]);
      $user = User::create([
          'name' => request('name'),
          'email' =>request('email'),
          'password' => bcrypt(request('password')),
          'role_id'=>2
      ]);

      auth()->login($user);
      Session::flash('message','Register account success!');
      return redirect('/');
    }
    public function createUser(Request $request){
      $this->validate(request(),[
        'name'=>'required|unique:users|max:255',
        'email'=>'required|email',
        'about'=>'required',
        'avatar'=>'required',
        'password'=>'required',
      ]);
      $image_url = '';
      if($request->hasFile('avatar')) {
       //get filename with extension
       $filenamewithextension = $request->file('avatar')->getClientOriginalName();

       //get filename without extension
       $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

       //get file extension
       $extension = $request->file('avatar')->getClientOriginalExtension();

       //filename to store
       $filenametostore = $filename.'_'.time().'.'.$extension;

       //Upload File
       $request->file('avatar')->storeAs('public/avatar', $filenametostore);
       $request->file('avatar')->storeAs('public/avatar/thumbnail', $filenametostore);

       //Resize image here
       $thumbnailpath = public_path('storage/avatar/thumbnail/'.$filenametostore);
       $img = Images::make($thumbnailpath)->resize(164, 164);
       $img->save($thumbnailpath);

       $image_url = 'storage/avatar/thumbnail/'.$filenametostore;
      }
      $data = array(
        'name'=>request('name'),
        'email'=>request('email'),
        'about'=>request('about'),
        'role'=>1,
        'password'=>request('password'),
        'avatar'=>$image_url,
      );
      User::create($data);
      Session::flash('message','Create user admin success!');
      return redirect('admin/showUsers');
    }

    public function editProfile(Request $request){
      $user = auth()->user();
      if(request('name') != $user->name)
        $this->validate(request(),['name'=>'unique:users']);
      $this->validate(request(),[
        'name'=>'required|max:255',
        'email'=>'required|email',
        'about'=>'required',
        'password'=>'required',
      ]);
      $image_url = $user->avatar ;
      if($request->hasFile('avatar')) {
       //get filename with extension
       $filenamewithextension = $request->file('avatar')->getClientOriginalName();

       //get filename without extension
       $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

       //get file extension
       $extension = $request->file('avatar')->getClientOriginalExtension();

       //filename to store
       $filenametostore = $filename.'_'.time().'.'.$extension;

       //Upload File
       $request->file('avatar')->storeAs('public/avatar', $filenametostore);
       $request->file('avatar')->storeAs('public/avatar/thumbnail', $filenametostore);

       //Resize image here
       $thumbnailpath = public_path('storage/avatar/thumbnail/'.$filenametostore);
       $img = Images::make($thumbnailpath)->resize(164, 164);
       $img->save($thumbnailpath);

       $image_url = 'storage/avatar/thumbnail/'.$filenametostore;
      }
      $data = array(
        'name'=>request('name'),
        'email'=>request('email'),
        'about'=>request('about'),
        'role'=>1,
        'password'=>request('password'),
        'avatar'=>$image_url,
      );
      $user->update($data);
      Session::flash('message','Update your profile success!');
      return redirect('admin/showUsers');
    }

    public function blockUser(User $user){
        $user->update(array('role_id'=>0));
        Session::flash('message','Delete user success!');
        return redirect('admin/showUsers');
    }


}
