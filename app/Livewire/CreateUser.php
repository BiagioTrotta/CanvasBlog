<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class CreateUser extends Component
{
    public $user;
    public $name;
    public $email;
    public $password;
    public $isAdmin = false;
    public $isRevisor = false;

    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'isAdmin' => 'boolean',
        'isRevisor' => 'boolean',
    ];

    protected $messages = [
        'email.email' => 'The attribute: address format is not valid.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Esporta metodo edit
    protected $listeners = [
        'edit'
    ];

    public function createUser()
    {
        // Validazione dei dati
        $this->validate();

        // Controlla se stai creando un nuovo utente o modificando un utente esistente
        if ($this->user) {
            // Modifica l'utente esistente
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email, // Non è necessario verificare l'unicità qui
                'password' => bcrypt($this->password),
                'isAdmin' => $this->isAdmin,
                'isRevisor' => $this->isRevisor,
            ]);

            // Emetti un messaggio di successo
            session()->flash('success', 'Utente modificato con successo.');
        } else {
            // Verifica l'unicità dell'email solo quando stai creando un nuovo utente
            $existingUser = User::where('email', $this->email)->first();

            if ($existingUser) {
                // L'utente con questa email esiste già nel database
                session()->flash('error', 'The email entered is already associated with another user.');
            } else {
                // Creazione di un nuovo utente
                User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                    'isAdmin' => $this->isAdmin,
                    'isRevisor' => $this->isRevisor,
                ]);

                // Emetti un messaggio di successo
                session()->flash('success', 'Utente creato con successo.');
            }
        }

        // Pulisci i campi del modulo dopo la creazione o la modifica
        $this->newUser();

        $this->dispatch('loadUsers');
    }



    public function mount()
    {
        $this->newUser();
    }

    // Creazione nuovo utente
    public function newUser()
    {
        $this->user = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    //Edita utente
    public function edit($user_id)
    {
        $this->user = User::find($user_id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->password = '';
    }
    public function render()
    {
        return view('livewire.create-user');
    }
}
