<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\EventTeam;
use App\Models\AllEvent;
use App\Models\TeamMember;
use App\Models\Detail_task;
use App\Models\RulesBook;
use App\Models\Task;
use App\Models\TmpFile;
use App\Models\Timeline;
use App\Models\Notificatioon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;


class UserController extends Controller
{

    private $nullvalue;
    private $user;

    public function __construct(){
        $this->middleware(function ($request, $next) {
            $this->user = $request->user();
            $datacheck = User::where('id', $this->user->id)->first();
            if($datacheck->id_line == null){
                $this->nullvalue += 1;
            }
            if($datacheck->instagram == null){
                $this->nullvalue += 1;
            }
            if($datacheck->nomor_id == null){
                $this->nullvalue += 1;
            }
            if($datacheck->alamat == null){
                $this->nullvalue += 1;
            }
            if($datacheck->no_telpon == null){
                $this->nullvalue += 1;
            }
            if($datacheck->tgl_lahir == null){
                $this->nullvalue += 1;
            }
            return $next($request);
        });
        
    }

    // Dashboard
    public function dashboard(){
        $datacheck = User::where('id',Auth::user()->id)->get();
        $nullvalue = 0;
        $data_lomba = EventTeam::where('owner_id', Auth::user()->id)->get();
        foreach($datacheck as $row){
            if($row->id_line == null){
                $nullvalue += 1;
            }
            if($row->instagram == null){
                $nullvalue += 1;
            }
            if($row->nomor_id == null){
                $nullvalue += 1;
            }
            if($row->alamat == null){
                $nullvalue += 1;
            }
            if($row->no_telpon == null){
                $nullvalue += 1;
            }
            if($row->tgl_lahir == null){
                $nullvalue += 1;
            }
        }
        $timeline = Timeline::where('start', '>=', now())->where('close', '>=', now())->orderBy('start', 'ASC')->limit(5)->get();
        return view('user_.dashboard', compact('nullvalue', 'data_lomba', 'timeline'));
    }

    // profil
    public function profil(){
        return view('user_.profil.index');
    }
    
    public function edit_profil(Request $request){
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'no_telpon' => ['required', 'numeric'],
            'id_line' => ['required'],
            'instagram' => ['required'],
            'tgl_lahir' => ['required', 'date'],
            'nomor_id' => ['required'],
            'alamat' => ['required'],
        ]);
        User::find(Auth::user()->id)->update($request->all());
        return redirect('/user/profil')->with('notif', 'Data berhasil diperbarui!');
    }

    public function change_password(Request $request){
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
        return redirect('/user/profil')->with('notif', 'Password berhasil diperbarui!');
    }

    // event
    public function events(){
        $events = AllEvent::all();
        if($this->nullvalue == 0){
            return view('user_.event.index', compact('events'));
        }else{
            return redirect()->back();
        }
    }

    public function detail_event($event){
        $event_dt = AllEvent::where('event_code', $event)->first();
        if($event_dt == null){
            return abort(404);
        }
        if(now() >= $event_dt->start_regis && now() <= $event_dt->close_regis && $event_dt->status != 1){
            if($this->nullvalue == 0){
                if(EventTeam::where('owner_id', Auth::user()->id)->where('id_event', $event)->first()){
                    return redirect()->back()->with('info', 'Kamu sudah mendaftar dalam lomba ini!');
                }
                $detail = AllEvent::where('event_code', $event)->first();
                return view('user_.event.'.$event.'.index', compact('detail'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('/user/events')->with('info', 'Pendaftaran kompetisi ini telah tutup atau belum dibuka!');
        }
    }

    public function regist_team($event, Request $request){
        if($event == 'wdc' || $event == 'muc'){
            $request->validate([
                'team_name' => ['required', 'unique:event_team'],
                'asal_ins' => ['required'],
                'alamat_ins' => ['required']
            ]);
            if($request->nama_pendamping != null and $request->no_hp != null){
                EventTeam::create([
                    'id_event' => $event,
                    'team_id' => md5($request->team_name),
                    'team_name' => $request->team_name,
                    'asal_ins' => $request->asal_ins,
                    'alamat_ins' => $request->alamat_ins,
                    'nama_pendamping' => $request->nama_pendamping,
                    'no_hp' => $request->no_hp,
                    'owner_id' => Auth::user()->id,
                    'status' => '0',
                ]);
            }elseif($request->nama_pendamping == null and $request->no_hp != null){
                return redirect('/user/events/'.$event)->with('danger', 'Jika mengisi nama pendamping, no. HP pendamping wajib diisi!');
            }elseif($request->nama_pendamping != null and $request->no_hp == null){
                return redirect('/user/events/'.$event)->with('danger', 'Jika mengisi no. HP pendamping, Nama pendamping wajib diisi!');
            }else{
                EventTeam::create([
                    'id_event' => $event,
                    'team_id' => md5($request->team_name),
                    'team_name' => $request->team_name,
                    'asal_ins' => $request->asal_ins,
                    'alamat_ins' => $request->alamat_ins,
                    'nama_pendamping' => 'Tidak Ada',
                    'no_hp' => 'Tidak Ada',
                    'owner_id' => Auth::user()->id,
                    'status' => '0',
                ]);
            }
        }else{
            $request->validate([
                'team_name' => ['required', 'unique:event_team'],
                'asal_ins' => ['required'],
                'alamat_ins' => ['required'],
                'nama_pendamping' => ['required'],
                'no_hp' => ['required'],
            ]);
            EventTeam::create([
                'id_event' => $event,
                'team_id' => md5($request->team_name),
                'team_name' => $request->team_name,
                'asal_ins' => $request->asal_ins,
                'alamat_ins' => $request->alamat_ins,
                'nama_pendamping' => $request->nama_pendamping,
                'no_hp' => $request->no_hp,
                'owner_id' => Auth::user()->id,
                'status' => '0',
            ]);
        }
        return redirect('user/events/'.$event.'/success_regist')->with('notif', $request->team_name.' berhasil didaftarkan, selanjutnya silahkan lengkapi informasi anggota tim anda dan kumpulkan task yang sudah diberikan.');
    }

    public function add_member($event, Request $request){
        $tim = EventTeam::where('id_event', $event)->where('team_id', $request->team_id)->first();
        $request->validate([
            'nama_anggota' => ['required'],
            'no_iden' => ['required'],
            'email' => ['required', 'email'],
            'no_telp' => ['required'],
            'id_line' => ['required'],
            'instagram' => ['required'],
            'tgl_lahir' => ['required'],
        ]);
        if($event == 'wdc'){
            if($request->asal_ins == null and $request->alamat_ins != null){
                return redirect('/user/regis_event/'.$event.'/detail_tim')->with('danger', 'Alamat Institusi dan Asal Institusi harus diisi!');
            }elseif($request->asal_ins != null and $request->alamat_ins == null){
                return redirect('/user/regis_event/'.$event.'/detail_tim')->with('danger', 'Alamat Institusi dan Asal Institusi harus diisi!');
            }elseif($request->asal_ins != null and $request->alamat_ins != null){
                TeamMember::create([
                    'id_event' => $event,
                    'team_id' => $request->team_id,
                    'nama_anggota' => $request->nama_anggota,
                    'no_iden' => $request->no_iden,
                    'email' => $request->email,
                    'asal_ins' => $request->asal_ins,
                    'alamat_ins' => $request->alamat_ins,
                    'no_telp' => $request->no_telp,
                    'id_line' => $request->id_line,
                    'instagram' => $request->instagram,
                    'tgl_lahir' => $request->tgl_lahir,
                ]);
            }else{
                TeamMember::create([
                    'id_event' => $event,
                    'team_id' => $request->team_id,
                    'nama_anggota' => $request->nama_anggota,
                    'no_iden' => $request->no_iden,
                    'email' => $request->email,
                    'asal_ins' => $tim->asal_ins,
                    'alamat_ins' => $tim->alamat_ins,
                    'no_telp' => $request->no_telp,
                    'id_line' => $request->id_line,
                    'instagram' => $request->instagram,
                    'tgl_lahir' => $request->tgl_lahir,
                ]);
            }
        }else{
            TeamMember::create([
                'id_event' => $event,
                'team_id' => $request->team_id,
                'nama_anggota' => $request->nama_anggota,
                'no_iden' => $request->no_iden,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'id_line' => $request->id_line,
                'instagram' => $request->instagram,
                'tgl_lahir' => $request->tgl_lahir,
            ]);
        }
        return redirect('/user/regis_event/'.$event.'/detail_tim')->with('notif', 'Anggota tim berhasil ditambahkan!');
    }

    public function upload_task(Request $request){
        if($request->hasFile('task_file')){
            $file = $request->file('task_file');
            $filename = $file->getClientOriginalName();
            $folder = uniqid().'-'.now()->timestamp;
            $file->storeAs('/public/tmp/'.$folder, $filename);

            TmpFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;

        }
        return '';
    }
    
    public function delete_task_tmp(Request $request){
        $dir = storage_path('app/public/tmp/'.$request->getContent());
        if (! is_dir($dir)) {
            throw new InvalidArgumentException("$dir must be a directory");
        }
        if (substr($dir, strlen($dir) - 1, 1) != '/') {
            $dir .= '/';
        }
        $files = glob($dir . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                rmdir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dir);
        TmpFile::where('folder', $request->getContent())->delete();
    }

    public function save_task($event, Request $request){
        $dt_task = Detail_task::where('event_id', $event)->first();
        if(Task::where('id_event', $event)->where('team_id', $request->team_id)->where('task_id', $request->task_id)->first()){
            return redirect('/user/regis_event/'.$event.'/detail_tim')->with('danger', 'Task sudah diunggah!!!');
        }elseif(now() > $dt_task->close_task){
            return redirect('/user/regis_event/'.$event.'/detail_tim')->with('danger', 'Task sudah ditutup!');
        }else{
            $tmpfile = TmpFile::where('folder', $request->task_file)->first();
            if(file_exists(storage_path('app/public/task_'.$event.'/'.$request->team_id.'/'.$tmpfile->filename))){
                unlink(storage_path('app/public/tmp/'.$request->task_file.'/'.$tmpfile->filename));
                rmdir(storage_path('app/public/tmp/'.$request->task_file));
                $tmpfile->delete();
                return redirect('/user/regis_event/'.$event.'/detail_tim')->with('danger', 'File dengan nama task tersebut sudah ada!');
            }
            $task = Task::create([
                'task_id' => $request->task_id,
                'id_event' => $event,
                'task_name' => $tmpfile->filename,
                'owner_id' => Auth::user()->id,
                'task_location' => 'task_'.$event.'/'.$request->team_id,
                'team_id' => $request->team_id
            ]);
            if($tmpfile){
                Storage::move('public/tmp/'.$request->task_file.'/'.$tmpfile->filename, '/public/task_'.$event.'/'.$request->team_id.'/'.$tmpfile->filename);
                rmdir(storage_path('app/public/tmp/'.$request->task_file));
                $tmpfile->delete();
                return redirect('/user/regis_event/'.$event.'/detail_tim')->with('notif', 'Task berhasil diunggah!');
            }
        }
    }

    public function delete_task($event, Request $request){
        $file = Task::where('task_id', $request->task_id)->where('team_id', $request->team_id)->first();
        unlink(storage_path('app/public/task_'.$event.'/'.$request->team_id.'/'.$file->task_name));
        $file->delete();
        return redirect('/user/regis_event/'.$event.'/detail_tim')->with('notif', 'Task berhasil dihapus!');
    }

    public function success_regist($event){
        if($this->nullvalue == 0){
            $rule_book = RulesBook::where('event_id', $event)->first();
            return view('user_.event.'.$event.'.success', compact('rule_book'));
        }else{
            return redirect()->back();
        }
    }

    public function request_verif(Request $request){
        $check  = Notificatioon::where('id_event', $request->id_event)->where('id_team', $request->id_team)->first();
        if($check){
            if(now()->diffInHours($check->created_at) > 24){
                $check->delete();
                Notificatioon::create([
                    'id' => now()->timestamp+rand(1, 10000),
                    'id_event' => $request->id_event,
                    'id_team' => $request->id_team,
                    'message' => $request->message,
                ]);
                return 200;
            }else{
                return 'invalid';
            }
        }else{
            Notificatioon::create([
                'id' => now()->timestamp+rand(1, 10000),
                'id_event' => $request->id_event,
                'id_team' => $request->id_team,
                'message' => $request->message,
            ]);
            return 200;
        }
    }

    // all regis event
    public function regis_event(){
        if(EventTeam::where('owner_id', Auth::user()->id)->first() == null){
            return redirect()->back();
        }
        $event_regis = EventTeam::where('owner_id', Auth::user()->id)->get();
        return view('user_.regis_event.index', compact('event_regis'));
    }

    public function detail_team($event){
        if(EventTeam::where('id_event', $event)->where('owner_id', Auth::user()->id)->first() == null){
            return redirect()->back();
        }
        $event_dt = AllEvent::where('event_code', $event)->first();
        $data_tim = EventTeam::where('id_event', $event)->where('owner_id', Auth::user()->id)->first();
        if($data_tim->status == 'bl'){
            return redirect('/user/regis_event/')->with('notif_danger', 'Tim kamu sudah di blacklist!');
        }
        $task_type = Detail_task::where('event_id', $event)->get();
        $anggota_team = TeamMember::where('team_id', $data_tim->team_id)->where('id_event', $event)->get();
        $task_team = [];
        foreach($task_type as $task_all) {
            foreach($task_all->task as $tim_task){
                if($tim_task->team_id == $data_tim->team_id){
                    array_push($task_team, $tim_task);
                }
            }
        }
        $count_task = Detail_task::where('event_id', $event)->where('condition_task', NULL)->count();
        return view('user_.regis_event.detail_regis', compact('data_tim', 'anggota_team', 'task_type', 'task_team', 'event_dt', 'count_task'));
    }
}
