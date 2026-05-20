<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));*/

        $query = Contact::query();
        if ($search = request('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        if ($category = request('category')) {
            $query->where('category', $category);
        }
        $contacts = $query->orderBy('name')->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'nullable|email|unique:contacts,email',
            'phone' => 'nullable|string|max:20',
            'category' => 'required|in:personal,work,family,other',
            'notes' => 'nullable|string|max:1000',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'category' => $request->category,
            'notes' => $request->notes,
            'favorite' => $request->boolean('favorite'),
        ]);

        return redirect()->route('contacts.index')->with('success', 'El contacto fue creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'nullable|email|unique:contacts,email,' . $contact->id,
            'phone' => 'nullable|string|max:20',
            'category' => 'required|in:personal,work,family,other',
            'notes' => 'nullable|string|max:1000',
        ]);

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'category' => $request->category,
            'notes' => $request->notes,
            'favorite' => $request->boolean('favorite'),
        ]);

        return redirect()->route('contacts.index')->with('success', 'Los cambios fueron guardados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'El contacto fue eliminado.');
    }

    public function toggleFavorite(Contact $contact)
    {
        $contact->favorite = !$contact->favorite;
        $contact->save();
        
        $message = $contact->favorite ? 'Contacto marcado como favorito.' : 'Favorito eliminado.';
        return redirect()->route('contacts.index')->with('success', $message);
    }
}
