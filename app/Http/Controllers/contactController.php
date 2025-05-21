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
        $contacts = Contact::orderBy('names', 'asc')->get();
        // $contacts = Contact::paginate(25, ['id', 'names', 'email', 'tel', 'libele']);
        return view('contacts.index', [
            'contacts' => $contacts,
        ]);
    }

    public function create(Request $request)
    {
        return view('contacts.create', ['action'=>'Enregistrer']);
    }
    public function edit(Request $request, string $name, string $id)
    {
        $contact = Contact::where('id', $id)->firstOrFail();
        return view('contacts.create', ['contact' => $contact]);
    }
    public function store(Request $request): RedirectResponse
    {
        $id=$request->id;
        if($id) {
            $contact = Contact::findOrFail($id);
            $contact->update([
                'names' => $request->names,
                'email' => $request->email,
                'tel' => $request->tel,
                'libele' => $request->libele,
            ]);
        } else {
            $contact = Contact::create([
                'names' => $request->names,
                'email' => $request->email,
                'tel' => $request->tel,
                'libele' => $request->libele,
            ]);
        }
        return redirect()->route('contacts.show', ['name' => $contact->names, 'id' => $contact->id])
            ->with('success', $id ? 'Contact modifié avec succès' : 'Contact créé avec succès');
    }
    public function destroy(string $id): RedirectResponse
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')
            ->with('success', 'Contact supprimé avec succès');
    }

    public function show(string $name, string $id): View
    {
        $contact = Contact::where('id', $id)->firstOrFail();
        return view('contacts.show', ['contact' => $contact]);
    }
}
