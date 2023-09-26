<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $usersData = [
        [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'email_verified_at' => '2023-09-25 00:00:00',
            'password' => '$2y$10$T2q3oNO1DeaQG8sMq2Vi/.e3EaJ6WMyW5HEkbhRcnzFGlqr7TR5j6',
            'remember_token' => 'a5e53a7fc7f7d638b7339f9b79',
            'created_at' => '2023-09-25 00:00:00',
            'updated_at' => '2023-09-25 00:00:00',
        ],
        [
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'email_verified_at' => '2023-09-25 00:00:00',
            'password' => '$2y$10$T2q3oNO1DeaQG8sMq2Vi/.e3EaJ6WMyW5HEkbhRcnzFGlqr7TR5j6',
            'remember_token' => 'b6a5e53a7fc7f7d638b7339f9b7',
            'created_at' => '2023-09-25 00:00:00',
            'updated_at' => '2023-09-25 00:00:00',
        ],
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->usersData;
        return view('admin/user/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/user/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
    public function edit(string $name)
    {
        $user = null;
        foreach ($this->usersData as $key => $value) {
            if ($value['name'] == $name) {
                $user = $value;
                break;
            }
        }
        return view(('admin/user/edit'), compact('user'));
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
    public function destroy(string $name)
    {
    }
}
