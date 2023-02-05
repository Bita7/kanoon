<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Category;
use App\Models\Course;
use App\Models\Order;
use App\Models\File;
use DB;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\DatabaseObject;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Table;
use Psy\Util\Str;

class MyController extends Controller
{
    public function welcome()
    {
        $val = DB::table('sliders')->get();
        $courses = Course::all();
        $topcourses = Course::orderBy('sale', 'desc')->get();
        $topviewcourses = Course::orderBy('view', 'desc')->get();
        return view('home', compact(['val', 'courses', 'topcourses', 'topviewcourses']));
    }

    public function adminloginform()
    {
        return view('adminlogin');
    }

    public function adminregisterform()
    {
        return view('adminregister');
    }

    public function adminpanel()
    {
        return view('adminpanel');
    }

    public function updatestudent($id, Request $request)
    {
        DB::table('users')->where("id", $id)->update(["name" => $request->name]);
        DB::table('users')->where("id", $id)->update(["id" => $request->id]);
        DB::table('users')->where("id", $id)->update(["email" => $request->email]);

        return redirect("studentsmanage");
    }

    public function uploadslider(Request $request)
    {
        $ext = $request->file('picture')->getClientOriginalExtension();
        if ($ext == "jpg" || $ext == "png") {
            $PicName = $request->file('picture')->getClientOriginalExtension();
            $NewPicName = time() . $PicName;
            $path = "images/slider";
            $request->picture->move($path, $NewPicName);
            $count = DB::table('sliders')->count();
            if ($count < 3) {
                DB::table('sliders')->insert(['src' => 'images/slider/' . $NewPicName]);
                return redirect("slidermanage");

            } else {
                return "tedad bishtar az 3!!";
            }
        } else {
            return "این پسوند جهت اپلود فایل مجاز نیست";

        }
    }

    public function addcourses(Request $request)

    {

        $ext = $request->file('picture')->getClientOriginalExtension();
        if ($ext == "jpg" || $ext == "png") {
            $PicName = $request->file('picture')->getClientOriginalExtension();
            $NewPicName = time() . $PicName;
            $path = "images";
            $request->picture->move($path, $NewPicName);

            $course = new Course();
            $course->picture = 'images/' . $NewPicName;
            $course->title = $request->title;
            $course->description = $request->description;
            $course->price = $request->price;
            $course->save();
        }

        $file = new File();
        $file->name = time() . $request->file('course_file')->getClientOriginalName();
        $file->course_id = $course->id;
        $file->save();
        $uploaded_file = $request->course_file;
        $request->course_file->storeAs('courses', $course->id . '/' . $file->name);
        return redirect()->back()->with(['success' => 'دوره با موفقیت اضافه شد']);

    }

    public function deleteCourse($id)
    {

        $c = Course::findOrFail($id);
        $c->delete();
        return redirect()->back()->with(['success' => 'دوره با موفقیت حذف شد']);

    }
    public function deleteslider($id)
    {

        $c = Slider::findOrFail($id);
        $c->delete();
        return redirect()->back()->with(['success' => 'اسلاید با موفقیت حذف شد']);

    }
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $course->view++;
        $course->save();
        return view('dore', compact('course'));

    }

    public function darsmanageform()
    {
        $courses = DB::table("courses")->get();
        return view('darsmanageform', compact('courses'));
    }

    public function slidermanage()
    {
        $val = DB::table("sliders")->get();
        return view('slidermanage', compact('val'));
    }

    public function delstudent($id)
    {
        DB::table("users")->where("id", $id)->delete();
        return redirect("studentsmanage");
    }

    public function editstudentform($id)
    {
        $val = DB::table("users")->where("id", $id)->get();
        return view("editstudentform", compact('val'));
    }

    public function studentsmanage()
    {
        $val = DB::table("users")->get();
        return view('showallstudents', compact('val'));
    }

    public function adminlogin(Request $request)
    {
        $i = 0;
        $admins = db::table('admin')->where('username', $request->username)->where('password', $request->password)->get();
        foreach ($admins as $admin) {
            $i++;

        }
        if ($i > 0) {
            return redirect('adminpanel');
        } else {
            return redirect('alogin');
        }
    }

    public function adminregister(Request $request)
    {
        DB::table('admin')->insert(['username' => $request->username, 'email' => $request->email, 'password' => md5($request->password)]);
        return "Admin Add Successfuly ";
        return redirect("adminregisterform");
    }

    public function addToCart($id, Request $request)
    {
        $course = Course::whereId($id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($course, $course->id);
        $request->session()->put('cart', $cart);
        return back()->with(['success' => 'دوره با موفقیت به سبد خرید اضافه شد']);

    }

    public function removeItem(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($course, $course->id);
        $request->session()->put('cart', $cart);
        return back();
    }

    public function getCart()
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        if($cart!=null)
            return view('cart', compact(['cart']));
                else
        return redirect()->to('/');

    }

    public function payment(Request $request)
    {
        $cart = Session::has('cart')  ? Session::get('cart') : null;
        if ($cart!=null) {
            $order = new Order();
            $order->code = rand(1000, 9000);
            $order->user_id = auth()->id();
            $order->total_price = $cart->totalPrice;
            $order->save();
            $coursesIdQty = [];
            $coursesId = [];
            foreach ($cart->items as $key => $product) {
                $coursesIdQty[$key] = ['qty' => $product['qty']];
                $coursesId[] = $key;
                $course = Course::findOrFail($key);
                $course->sale++;
                $course->save();
                Session::forget('cart');

            }
            $order->courses()->sync($coursesIdQty);
            $user = auth()->user();
            $user->courses()->sync($coursesId);

            return redirect()->to('/dashboard')->with(['success' => 'دوره با موفقیت خریداری شد']);
        } else {
            redirect()->back()->with(['success' => 'سبد خرید شما خالی است    ']);
        }


    }

    public function download($id)
    {

        $course = Course::findOrFail($id);
        $file = $course->files()->first();

        $user_courses = auth()->user()->courses()->get();

        if ($user_courses->contains('id', $course->id)) {

            return Storage::download('courses/' . $course->id . '/' . $file->name);

        } else {
            return abort('404');
        }


    }

    public function orders()
    {
        $orders=Order::all();
        return view('orders', compact(['orders']));
    }


    public function logout()
    {
        Session::flush();
        auth()->logout();
        return redirect('login');

    }

}
