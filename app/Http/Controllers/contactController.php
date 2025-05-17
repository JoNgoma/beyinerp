<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function index():View
    {
        $contacts = Contact::paginate(25, ['names', 'email', 'tel', 'libele']);
        return view('contacts.index', [
            'contacts' => $contacts,
        ]);
    }

    public function create(Request $request)
    {
        return view('contacts.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $contact = Contact::create([
            'names' => $request->names,
            'email' => $request->email,
            'tel' => $request->tel,
            'libele' => $request->libele,
        ]);
        
        return redirect()->route('contacts.index')
            ->with('success', 'Contact créé avec succès');
    }

    public function show(string $name, string $id): RedirectResponse | Contact | array
    {
        $contact = Contact::where('id', $id)->firstOrFail();
        if ($name !== $contact->names) {
            return to_route('contacts.show', ['name' => $contact->names, 'id' => $contact->id]);
        }
        //     if($name === $contact->names || $id!==$contact->id) {
        //     return to_route('contacts.bad');
        // }
        return [
            // 'id' => $contact->id,
            'name' => $contact->names,
            'email' => $contact->email,
            'tel' => $contact->tel,
            'libele' => $contact->libele,
        ];
    }
}
