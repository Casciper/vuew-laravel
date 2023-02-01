<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonStoreRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        return Person::all();
    }

    public function person(Person $person)
    {
        return $person;
    }

    public function store(PersonStoreRequest $request)
    {
        $data = $request->validated();
        return Person::create($data);
    }

    public function update(PersonStoreRequest $request, Person $person)
    {
        $data = $request->validated();
        return $person->update($data);
    }

    public function delete(Person $person)
    {
        return $person->delete();
    }
}
