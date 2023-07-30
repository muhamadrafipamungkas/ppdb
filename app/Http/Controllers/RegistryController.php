<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Family;
use App\Registry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user && $user->role == 'admin') {
            $registries = Registry::latest()->paginate(5);
            return view('admin.registry.index',compact('registries'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return redirect('/');
        }
    }

    public function showRegistryByUserId()
    {
        $user = Auth::user();
        if ($user) {
            $registries = Registry::where('user_id', $user->id)->latest()->paginate(5);
            if (!$registries) {
                abort(404);
            }
            return view('user.registry.index',compact('registries', 'user'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.registry.create');
    }

    public function store(Request $request)
    {
        $sibling_amount = $request->sibling_amount ? $request->sibling_amount : 0;

        // Personal Data
        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:9,13',
            'nisn' => 'required|min:10|max:16',
            'sex' => 'required|in:F,M',
            'previous_school' => 'required|min:5|max:255',
            'birth_place' => 'required|min:5|max:255',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'religion' => 'required|in:buddhism,catholicism,confucianism,hinduism,islam,protestantism',
            'attachment' => 'required|max:5024|mimes:jpg,jpeg,png,pdf',
        ];

        // Parent Data
        // Father
        $father_data_rules = [
            'father_name' => 'required|min:3|max:255',
            'father_email' => 'required|email',
            'father_phone' => 'required|numeric|digits_between:9,13',
            'father_nik' => 'required|min:16|max:16',
            'father_birth_place' => 'required|min:5|max:255',
            'father_birth_date' => 'required|date|date_format:Y-m-d',
        ];
        // Mother
        $mother_data_rules = [
            'mother_name' => 'required|min:3|max:255',
            'mother_email' => 'required|email',
            'mother_phone' => 'required|numeric|digits_between:9,13',
            'mother_nik' => 'required|min:16|max:16',
            'mother_birth_place' => 'required|min:5|max:255',
            'mother_birth_date' => 'required|date|date_format:Y-m-d',
        ];

        $rules = array_merge($rules, $father_data_rules, $mother_data_rules);

        // Siblings
        for($i = 1; $i <= $sibling_amount; $i++) {
            $sibling_rules = [];
            $sibling_rules['sibling_name_'.$i] = 'required|min:3|max:255';
            $sibling_rules['sibling_email_'.$i] = 'required|email';
            $sibling_rules['sibling_phone_'.$i] = 'required|numeric|digits_between:9,13';
            $sibling_rules['sibling_nik_'.$i] = 'required|min:16|max:16';
            $sibling_rules['sibling_birth_place_'.$i] = 'required|min:5|max:255';
            $sibling_rules['sibling_birth_date_'.$i] = 'required|date|date_format:Y-m-d';
            $rules = array_merge($rules, $sibling_rules);
        }

        $request->validate($rules);

        $random_id = Str::uuid()->toString();
        $user = Auth::user();
        if ($user) {

            $data = $request->all();

            $registry = Registry::create([
                'registry_number' => $random_id,
                'name' => $data["name"],
                'email' => $data["email"],
                'phone' => $data["phone"],
                'nisn' => $data["nisn"],
                'sex' => $data["sex"],
                'previous_school' => $data["previous_school"],
                'birth_place' => $data["birth_place"],
                'birth_date' => $data["birth_date"],
                'religion' => $data["religion"],
                'sibling' => 1,
                'status' => "WAITING_APPROVAL",
                'user_id' => $user->id,
            ]);
            $file = $request->file('attachment');
            $tujuan_upload = 'public/attachments/registry';
//            dd($file->getClientOriginalExtension());

            $filename = $random_id . "." . $file->getClientOriginalExtension();
            $file->storeAs($tujuan_upload, $filename);

            Attachment::create([
                "filename" => $filename,
                "registry_id" => $registry->id,
                "attachment_type" => "DOCUMENT"
            ]);

            // Father
            Family::create([
                'name' => $request->father_name,
                'birth_date' => $request->father_birth_date,
                'birth_place' => $request->father_birth_place,
                'email' => $request->father_email,
                'phone' => $request->father_phone,
                'nik' => $request->father_nik,
                'sex' => $request->father_sex,
                'relation_type' => "father",
                'registry_id' => $registry->id,
                'sex' => 'M'
            ]);

            // Mother
            Family::create([
                'name' => $request->mother_name,
                'birth_date' => $request->mother_birth_date,
                'birth_place' => $request->mother_birth_place,
                'email' => $request->mother_email,
                'phone' => $request->mother_phone,
                'nik' => $request->mother_nik,
                'sex' => $request->mother_sex,
                'relation_type' => "mother",
                'registry_id' => $registry->id,
                'sex' => 'F'
            ]);

            // Siblings
            for($i = 1; $i <= $sibling_amount; $i++) {
                $sibling_rules = [];
                $sibling_rules['sibling_name_'.$i] = 'required|min:3|max:255';
                $sibling_rules['sibling_email_'.$i] = 'required|email';
                $sibling_rules['sibling_phone_'.$i] = 'required|numeric|digits_between:9,13';
                $sibling_rules['sibling_nik_'.$i] = 'required|min:16|max:16';
                $sibling_rules['sibling_birth_place_'.$i] = 'required|min:5|max:255';
                $sibling_rules['sibling_birth_date_'.$i] = 'required|date|date_format:Y-m-d';
                $rules = array_merge($rules, $sibling_rules);

                $sibling_sex = "M";
                if ($request["sibling_relation_".$i]) {
                    if (in_array($request["sibling_relation_".$i], ["younger_sister", "older_sister"] )) {
                        $sibling_sex = "F";
                    }
                }

                Family::create([
                    'name' => $request["sibling_name_".$i],
                    'birth_date' => $request["sibling_birth_date_".$i],
                    'birth_place' => $request["sibling_birth_place_".$i],
                    'email' => $request["sibling_email_".$i],
                    'phone' => $request["sibling_phone_".$i],
                    'nik' => $request["sibling_nik_".$i],
                    'sex' => $sibling_sex,
                    'relation_type' => $request["sibling_relation_".$i],
                    'registry_id' => $registry->id,
                    'sex' => 'F'
                ]);
            }
            return redirect()->route('registries.mine')
                ->with('success','Suggestion created successfully.');
        } else {
            return redirect('/');
        }
        return view('user.registry.create');
    }

    public function show($id) {

        $user = Auth::user();
        if ($user) {
            $registry = Registry::findOrFail($id);
            $attachment = Attachment::where("registry_id", $registry->id)->first();
            $father = Family::where("registry_id", $registry->id)->where('relation_type', 'father')->first();
            $mother = Family::where("registry_id", $registry->id)->where('relation_type', 'mother')->first();
            $siblings = Family::where("registry_id", $registry->id)->whereIn('relation_type', ['mother','father'])->get();

            if ($user->role == 'admin') {
                return view('admin.registry.show',compact('registry', 'user', 'attachment', 'father', 'mother', 'siblings'));
            } else if ($user->id == $registry->user_id) {
                return view('user.registry.show',compact('registry', 'user', 'attachment', 'father', 'mother', 'siblings'));
            } else {
                abort(403);
            }
        } else {
            return redirect('/');
        }
    }

    public function approve(Request $request, $id)
    {
        $user = Auth::user();
        $book = Registry::findOrFail($id);
        if($user && $user->role == 'admin') {
            $book->update([
                'status' => "APPROVED"
            ]);

            $response = [
                "status" => true,
                "message" => "Approval Success"
            ];
        } else {
            $response = [
                "status" => false,
                "message" => "Unauthorized"
            ];

        }
        return response()->json($response);
    }


    public function reject(Request $request, $id)
    {
        $user = Auth::user();
        $book = Registry::findOrFail($id);
        if($user && $user->role == 'admin') {
            $book->update([
                'status' => "REJECTED"
            ]);

            $response = [
                "status" => true,
                "message" => "Rejection Success"
            ];
        } else {
            $response = [
                "status" => false,
                "message" => "Unauthorized"
            ];

        }
        return response()->json($response);
    }
}
