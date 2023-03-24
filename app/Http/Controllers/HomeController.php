<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $phonebooks = json_decode(file_get_contents("phonebook.json"), true);

        return view('index-phonebook', compact('phonebooks'));
    }

    public function create()
    {
        return view('create-phonebook');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'famili' => 'required|string',
            'tel1' => 'required|numeric',
            'tel2' => 'nullable|numeric',
        ]);

        $handle = fopen("phonebook.json", "a+");
        filesize('phonebook.json') ? filesize('phonebook.json') : 1;
        $data = json_decode(file_get_contents("phonebook.json"), true);
        $data[] = array("id" => rand(1000, 6000), "name" => $request->name, "famili" => $request->famili, "tel1" => $request->tel1, "tel2" => $request->tel2);
        file_put_contents("phonebook.json", json_encode($data));
        fclose($handle);
        return redirect()->route('home.index');
    }

    public function edit($personId)
    {
        $phonebooks = json_decode(file_get_contents("phonebook.json"), true);
        foreach ($phonebooks as $phonebook) {
            if ($phonebook['id'] == $personId) {
                $person = $phonebook;
            }
        }
        return view('edit-phonebook', compact('person'));
    }

    public function update(Request $request, $personId)
    {
        $request->validate([
            'name' => 'required|string',
            'famili' => 'required|string',
            'tel1' => 'required|numeric',
            'tel2' => 'nullable|numeric',
        ]);
        $jsonString = file_get_contents('phonebook.json');
        $data = json_decode($jsonString, true);
        foreach ($data as $key => $entry) {
            if ($entry['id'] == $personId) {
                $data[$key]['name'] = $request->name;
                $data[$key]['famili'] = $request->famili;
                $data[$key]['tel1'] = $request->tel1;
                $data[$key]['tel2'] = $request->tel2;
            }
        }
        $newJsonString = json_encode($data);
        file_put_contents('phonebook.json', $newJsonString);
        return redirect()->route('home.index');
    }

    public function destroy($personId)
    {
        // read json file
        $data = file_get_contents('phonebook.json');
        // decode json to associative array
        $json_arr = json_decode($data, true);
        // get array index to delete
        $arr_index = array();
        foreach ($json_arr as $key => $value) {
            if ($value['id'] == $personId) {
                $arr_index[] = $key;
            }
        }
        // delete data
        foreach ($arr_index as $i) {
            unset($json_arr[$i]);
        }
        // rebase array
        $json_arr = array_values($json_arr);
        // encode array to json and save to file
        file_put_contents('phonebook.json', json_encode($json_arr));
        return redirect()->route('home.index');
    }
}
