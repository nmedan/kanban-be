<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ColumnRequest;

use App\Column;

use App\Card;


class ColumnsController extends Controller
{
    public function index() {
        $columns = Column::with('cards')->get();
        return $columns;
    }

    public function show($id) {
        $column = Column::with('cards')->findOrFail($id);
        return $column;
    }

    public function setCapacity($id, ColumnRequest $request) {       
        $column = Column::findOrFail($id);
        if (($request->capacity >= sizeof($column->cards)) || $request->capacity==null) {
            $column->update([
                'capacity' => $request->capacity
            ]);
        }
        else {
            response()->json(['error' => 'Request failed with status code 422'], 422);
        }
    }

    public function updateCards($id, ColumnRequest $request) {
        $column = Column::findOrFail($id);
        if (($column->capacity > sizeof($column->cards)) || $column->capacity==null) {
            $column->cards()->delete();
            foreach ($request->cards as $cd) {
                $newcard = (object)$cd;
                $card = Card::create([
                    'column_id' => $column->id
                ]);
                $column->cards()->save($card);
            }
        }
    }
}
