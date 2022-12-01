<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $contacts = Contact::where("user_id", Auth::id())
            ->when($request->has("keyword"), function ($q) {
                $q->where(function ($q){
                    $q->orwhere("name", "like", "%".request('keyword')."%")
                    ->orwhere("phone", "like", "%".request('keyword')."%")
                    ->orwhere("email", "like", "%".request('keyword')."%");
                });
            })
            ->paginate(10)->withQueryString();

        return response()->json([
            "success" => true,
            "contacts" => $contacts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            "name" => "required|min:2|max:20",
            "phone" => "required|numeric",
            "address" => "nullable|max:100",
            "email" => "nullable|email|max:100",
        ]);

        $contact = Contact::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "address" => $request->address,
            "email" => $request->email,
            "user_id" => Auth::id()
        ]);
        return response()->json([
            "success" => true,
            "message" => "contact created",
            "contact" => $contact
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $contact = Contact::find($id);

        if (is_null($contact)) {
            return response()->json([
                "success" => false,
                "message" => "contact not found"
            ],404);
        }

        Gate::authorize("view",$contact);

        return response()->json([
            "success" => true,
            "contact" => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            "name" => "nullable|min:2|max:20",
            "phone" => "nullable|numeric",
            "address" => "nullable|max:100",
            "email" => "nullable|email|max:100",
        ]);


        $contact = Contact::find($id);

        if (is_null($contact)) {
            return response()->json([
                "success" => false,
                "message" => "contact not found"
            ],404);
        }

        Gate::authorize("update",$contact);

        if ($request->has('name')) {
            $contact->name = $request->name;
        }

        if ($request->has('phone')) {
            $contact->phone = $request->phone;
        }

        if ($request->has('address')) {
            $contact->address = $request->address;
        }

        if ($request->has('email')) {
            $contact->email = $request->email;
        }

        $contact->update();

        return response()->json([
            "success" => true,
            "message" => "contact updated",
            "contact" => $contact
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {

        $contact = Contact::find($id);

        if (is_null($contact)) {
            return response()->json([
                "success" => false,
                "message" => "contact not found"
            ],404);
        }

        Gate::authorize("delete",$contact);

        $contact->delete();

        return response()->json([
            "success" => true,
            "message" => "contact deleted"
        ]);
    }

}
