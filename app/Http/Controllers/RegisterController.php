<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $password = $request->input('password');

        DB::beginTransaction();

        try {
            User::create([
                'name' => $fullname,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            DB::commit();

            return response()->json([
                "success" => true,
                "message" => "Register Berhasil"
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                "success" => false,
                "message" => "Register Gagal"
            ], 400);
        }

        // if ($user) {
        //     return response()->json([
        //         "success" => true,
        //         "message" => "Register Berhasil"
        //     ], 201);
        // } else {
        //     return response()->json([
        //         "success" => false,
        //         "message" => "Register Gagal"
        //     ], 400);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
