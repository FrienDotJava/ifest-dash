<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_activity;
use App\Models\AllEvent;
use App\Models\TeamMember;
use App\Models\Detail_task;
use App\Models\Task;
use App\Models\EventTeam;
use App\Models\User;
use App\Models\Timeline;
use App\Models\Notificatioon;
use App\Models\DonorDarah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;
use App\Mail\Verification;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DonorDarahExport;


class AdminController extends Controller
{
    // Dashboard
    public function dashboard(){
        $activity = Admin_activity::orderBy('created_at', 'DESC')->limit(10)->get();
        $i2c = EventTeam::where('id_event', 'i2c')->count();
        $wdc = EventTeam::where('id_event', 'wdc')->count();
        $muc = EventTeam::where('id_event', 'muc')->count();
        $semnas = EventTeam::where('id_event', 'semnas')->count();
        $nw_pdft = EventTeam::orderBy('created_at', 'desc')->limit(5)->get();
        $staffs = User::where('user_type', 'staff')->get();
        $not_verified = EventTeam::where('status', '0')->count();
        $timeline = Timeline::where('start', '<=', now())->where('close', '>=', now())->orderBy('start', 'ASC')->limit(5)->get();
        $detail_task = Detail_task::all();
        $notification = Notificatioon::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('admin_.dashboard', compact('staffs', 'nw_pdft', 'i2c', 'wdc', 'muc', 'semnas', 'activity', 'not_verified', 'timeline', 'detail_task', 'notification'));
    }

    // profil
    public function profil(){
        $activity = Admin_activity::orderBy('created_at', 'DESC')->limit(10)->get();
        $staffs = User::where('user_type', 'staff')->get();
        $notification = Notificatioon::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('admin_.profil.index', compact('staffs', 'activity', 'notification'));
    }
    
    public function edit_profil(Request $request){
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'no_telpon' => ['required', 'numeric'],
            'id_line' => ['required']
        ]);
        User::find(Auth::user()->id)->update($request->all());
        return redirect('/su_admin/profil')->with('notif', 'Data berhasil diperbarui!');
    }

    public function change_password(Request $request){
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
        return redirect('/su_admin/profil')->with('notif', 'Password berhasil diperbarui!');
    }

    // all event
    //  index
    public function index_event($event){
        $activity = Admin_activity::orderBy('created_at', 'DESC')->limit(10)->get();
        $staffs = User::where('user_type', 'staff')->get();
        $team_event = EventTeam::where('id_event', $event)->orderBy('created_at', 'DESC')->paginate(8);
        $task_team = Task::where('id_event', $event)->get();
        $task_event = Detail_task::where('event_id', $event)->get();
        $count_task = Detail_task::where('event_id', $event)->where('condition_task', NULL)->count();
        $notification = Notificatioon::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('admin_.'.$event.'.index', compact('staffs', 'activity', 'team_event', 'task_team', 'task_event', 'count_task', 'notification'));
    }
    
    public function filter_index($event, $filter){
        $activity = Admin_activity::orderBy('created_at', 'DESC')->limit(10)->get();
        $staffs = User::where('user_type', 'staff')->get();
        $team_event = EventTeam::where('id_event', $event)->where('status', $filter)->orderBy('created_at', 'DESC')->paginate(8);
        $task_team = Task::where('id_event', $event)->get();
        $task_event = Detail_task::where('event_id', $event)->get();
        $count_task = Detail_task::where('event_id', $event)->where('condition_task', NULL)->count();
        $notification = Notificatioon::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('admin_.'.$event.'.index', compact('staffs', 'activity', 'team_event', 'task_team', 'task_event', 'filter', 'count_task', 'notification'));
    }

    public function index_donor_darah(){
        $activity = Admin_activity::orderBy('created_at', 'DESC')->limit(10)->get();
        $staffs = User::where('user_type', 'staff')->get();
        $donor_darah = DonorDarah::orderBy('created_at', 'DESC')->get();
        $notification = Notificatioon::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('admin_.dcr.index', compact('staffs', 'activity', 'donor_darah', 'notification'));
    }

    public function detail_donor_darah($id){
        $activity = Admin_activity::orderBy('created_at', 'DESC')->limit(10)->get();
        $staffs = User::where('user_type', 'staff')->get();
        $donor_darah = DonorDarah::find($id);
        $notification = Notificatioon::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('admin_.dcr.detail', compact('staffs', 'activity', 'donor_darah', 'notification'));
    }

    public function export_donor_darah(){
        return Excel::download(new DonorDarahExport, 'data_donor_darah.xlsx');
    }

    // detail data
    public function detail_team($event, $team_id){
        $activity = Admin_activity::orderBy('created_at', 'DESC')->limit(10)->get();
        $staffs = User::where('user_type', 'staff')->get();
        $data_team = EventTeam::where('team_id', $team_id)->where('id_event', $event)->firstorfail();
        $task_type = Detail_task::where('event_id', $event)->get();
        $task_team = [];
        foreach($task_type as $task_all) {
            foreach($task_all->task as $tim_task){
                if($tim_task->team_id == $team_id){
                    array_push($task_team, $tim_task);
                }
            }
        }
        $anggota_team = TeamMember::where('team_id', $team_id)->where('id_event', $event)->get();
        $notification = Notificatioon::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('admin_.'.$event.'.detail', compact('staffs', 'activity', 'anggota_team', 'data_team', 'task_team', 'task_type', 'notification'));
    }

    // verifikasi/blacklist/hapus tim
    public function verifikasi_data($event, $type, $team_id){
        if($type == 'verifikasi'){
            EventTeam::where('team_id', $team_id)->where('id_event', $event)->update(['status' => '1']);
            Admin_activity::create([
                'id_admin' => Auth::user()->id,
                'activity' => '<a href="'.env('APP_URL').'/su_admin/'.$event.'/team/'.$team_id.'">Memverifikasi Tim</a>',
                'icon' => 'check'
            ]);
            // send to email team
            $team = EventTeam::where('team_id', $team_id)->where('id_event', $event)->first();
            $email = $team->owner->email;
            $subject = 'Verifikasi Tim';
            $message = 'Tim anda telah diverifikasi oleh admin';
            Mail::to($email)->send(new Verification($email));
            Notificatioon::where('id_team', $team_id)->where('id_event', $event)->delete();
            return redirect()->back();
        }elseif($type == 'batal_verif'){
            EventTeam::where('team_id', $team_id)->where('id_event', $event)->update(['status' => '0']);
            Admin_activity::create([
                'id_admin' => Auth::user()->id,
                'activity' => '<a href="'.env('APP_URL').'/su_admin/'.$event.'/team/'.$team_id.'">Membatalkan Verifikasi Tim</a>',
                'icon' => 'x'
            ]);
            return redirect()->back();
        }elseif($type == 'blacklist'){
            EventTeam::where('team_id', $team_id)->where('id_event', $event)->update(['status' => 'bl']);
            Admin_activity::create([
                'id_admin' => Auth::user()->id,
                'activity' => '<a href="'.env('APP_URL').'/su_admin/'.$event.'/team/'.$team_id.'">Blacklist Tim</a>',
                'icon' => 'slash'
            ]);
            return redirect()->back();
        }elseif($type == 'batal_bl'){
            EventTeam::where('team_id', $team_id)->where('id_event', $event)->update(['status' => '0']);
            Admin_activity::create([
                'id_admin' => Auth::user()->id,
                'activity' => '<a href="'.env('APP_URL').'/su_admin/'.$event.'/team/'.$team_id.'">Membatalkan Blacklist Tim</a>',
                'icon' => 'x'
            ]);
            return redirect()->back();
        }elseif($type == 'hapus'){
            $data = EventTeam::where('team_id', $team_id)->where('id_event', $event)->first();
            $tasks = Task::where('team_id', $team_id)->where('id_event', $event)->get();
            Admin_activity::create([
                'id_admin' => Auth::user()->id,
                'activity' => 'Menghapus Tim '.$data->team_name,
                'icon' => 'trash'
            ]);
            foreach($tasks as $task){
                unlink(storage_path('app/public/task_'.$event.'/'.$team_id.'/'.$task->task_name));
            }
            if(file_exists(storage_path('app/public/task_'.$event.'/'.$team_id))){
                rmdir(storage_path('app/public/task_'.$event.'/'.$team_id));
                EventTeam::where('team_id', $team_id)->where('id_event', $event)->delete();
                Task::where('team_id', $team_id)->where('id_event', $event)->delete();
                TeamMember::where('team_id', $team_id)->where('id_event', $event)->delete();
                return redirect('/su_admin/'.$event);
            }
            EventTeam::where('team_id', $team_id)->where('id_event', $event)->delete();
            Task::where('team_id', $team_id)->where('id_event', $event)->delete();
            TeamMember::where('team_id', $team_id)->where('id_event', $event)->delete();
            return redirect('/su_admin/'.$event);
        }else{
            return '404 - command not found';
        }
    }

    // delete task
    public function delete_task($event, $team_id, $task_id){
        $task = Task::where('id_event', $event)->where('team_id', $team_id)->where('task_id', $task_id)->first();
        unlink(storage_path('app/public/task_'.$event.'/'.$team_id.'/'.$task->task_name));
        $task = Task::where('id_event', $event)->where('team_id', $team_id)->where('task_id', $task_id)->delete();
        return redirect('/su_admin/'.$event.'/team/'.$team_id)->with('notif', 'Task berhasil dihapus!');
    }

    // users index
    public function users(){
        $activity = Admin_activity::orderBy('created_at', 'DESC')->limit(10)->get();
        $staffs = User::where('user_type', 'staff')->get();
        $users = User::where('user_type', 'superuser')->orWhere('user_type', 'staff')->get();
        $notification = Notificatioon::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('admin_.users.index', compact('staffs', 'activity', 'users', 'notification'));
    }

    public function add_user(){
        $activity = Admin_activity::orderBy('created_at', 'DESC')->limit(10)->get();
        $staffs = User::where('user_type', 'staff')->get();
        $notification = Notificatioon::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('admin_.users.add', compact('staffs', 'activity', 'notification'));
    }

    public function store_user(Request $request){
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_telpon' => ['required', 'numeric'],
            'id_line' => ['required']
        ]);

        // Generate initial avatar
        $path = 'user/avatar/'.time().'.png';
        $firstName = $request->fullname;
        $image = imagecreate(200,200);
        $red = rand(0, 255);
        $green = rand(0, 255);
        $blue = rand(0, 255);
        imagecolorallocate($image, $red, $green, $blue);
        $text_color = imagecolorallocate($image, 255, 255, 255);
        $font = public_path('fonts/avatar.ttf');
        imagettftext($image, 100, 0, 60, 150, $text_color, $font, strtoupper($firstName[0][0]));
        header('Content-Type: image/png');
        imagepng($image, 'storage/app/public/'.$path);
        imagedestroy($image);
        // End Generate

        if($request->user_type == null){
            $request->user_type = 'staff';
        }

        if($request->email_verified_at != null){
            User::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'foto' => $path,
                'user_type' => $request->user_type,
                'no_telpon' => $request->no_telpon,
                'id_line' => $request->id_line,
                'email_verified_at' => now()
            ]);
            return redirect('/su_admin/users')->with('notif', 'Pengguna berhasil ditambah!');
        }else{
            $user = User::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'foto' => $path,
                'user_type' => $request->user_type,
                'no_telpon' => $request->no_telpon,
                'id_line' => $request->id_line,
            ]);
            event(new Registered($user));
            return redirect('/su_admin/users')->with('notif', 'Pengguna berhasil ditambah!');
        }

    }

    public function delete_user(User $user){
        User::destroy($user->id);
        return redirect('/su_admin/users')->with('notif', 'Pengguna berhasil dihapus!');
    }

    // Settings
    public function settings(){
        $activity = Admin_activity::orderBy('created_at', 'DESC')->limit(10)->get();
        $staffs = User::where('user_type', 'staff')->get();
        $events = AllEvent::all();
        $notification = Notificatioon::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('admin_.pengaturan.index', compact('staffs', 'activity', 'events', 'notification'));
    }

    public function edit_event(Request $request){
        $event = AllEvent::where('event_code', $request->event_code)->first();
        $request->validate([
            'event_name' => ['required'],
            'start_regis' => ['required'],
            'close_regis' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);
        if($request->event_type == 'Tim'){
            $request->validate([
                'max_member' => ['required']
            ]);
            $data = request()->except('_method', '_token'); 
            $data['event_type'] = "Tim";
            if($request->image_event != null){
                unlink(storage_path('app/public/'.$event->image_event));
                $data['image_event'] = $request->file('image_event')->store('events/avatar', 'public');
                AllEvent::where('event_code', $request->event_code)->update($data);
            }else{
                $data['image_event'] = $event->image_event;
                AllEvent::where('event_code', $request->event_code)->update($data);
            }
        }else{
            $data = request()->except('_method', '_token');
            $data['max_member'] = NULL;
            $data['event_type'] = "Solo";
            if($request->image_event != null){
                unlink(storage_path('app/public/'.$event->image_event));
                $data['image_event'] = $request->file('image_event')->store('events/avatar', 'public');
                AllEvent::where('event_code', $request->event_code)->update($data);
            }else{
                $data['image_event'] = $event->image_event;
                AllEvent::where('event_code', $request->event_code)->update($data);
            }
        }
        return redirect('/su_admin/pengaturan_web')->with('notif', 'Data kompetisi berhasil diubah!');
    }

    public function delete_event($event){
        $data = AllEvent::where('event_code', $event)->first();
        unlink(storage_path('app/public/'.$data->image_event));
        AllEvent::where('event_code', $event)->delete();
        return redirect('/su_admin/pengaturan_web')->with('notif', 'Kompetisi/Event berhasil dihapus!');
    }

    // TIMELINE
    public function timeline(){
        $activity = Admin_activity::orderBy('created_at', 'DESC')->limit(10)->get();
        $staffs = User::where('user_type', 'staff')->get();
        $events = AllEvent::all();
        $notification = Notificatioon::orderBy('created_at', 'DESC')->limit(5)->get();
        $timeline = Timeline::all();
        return view('admin_.pengaturan.timeline.index', compact('staffs', 'activity', 'events', 'notification', 'timeline'));
    }

    public function get_timeline($id){
        $timeline = Timeline::where('id', $id)->first();
        return response()->json($timeline);
    }

    public function add_timeline(Request $request){
        $request->validate([
            'timeline' => ['required'],
            'start' => ['required'],
            'close' => ['required'],
            'icon' => ['required']
        ]);
        Timeline::create([
            'timeline' => $request->timeline,
            'start' => $request->start,
            'close' => $request->close,
            'icon' => $request->icon
        ]);
        return redirect('/su_admin/pengaturan_web/timeline')->with('notif', 'Timeline berhasil ditambah!');
    }

    public function edit_timeline(Request $request){
        $request->validate([
            'timeline' => ['required'],
            'start' => ['required'],
            'close' => ['required'],
            'icon' => ['required']
        ]);
        $data = request()->except('_method', '_token');
        Timeline::where('id', $request->id)->update($data);
        return redirect('/su_admin/pengaturan_web/timeline')->with('notif', 'Timeline berhasil diubah!');
    }

    public function delete_timeline($id){
        Timeline::destroy($id);
        return redirect('/su_admin/pengaturan_web/timeline')->with('notif', 'Timeline berhasil dihapus!');
    }

}