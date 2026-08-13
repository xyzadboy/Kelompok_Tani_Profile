<?php

namespace App\Http\Controllers;

use App\Models\ContactPerson;

class ContactController extends Controller
{
    /**
     * Menampilkan daftar pengurus / contact person.
     */
    public function index()
    {
        $contacts = ContactPerson::latest()->get();

        return view('pages.contact', compact('contacts'));
    }
}
