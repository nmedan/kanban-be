<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CardRequest;

use App\Card;

use App\Column;

class CardsController extends Controller
{
    public function store($id, CardRequest $request) {
        $column = Column::findOrFail($id);
        if (($column->capacity > sizeof($column->cards)) || $column->capacity==null) {
            $card = Card::create([
                'column_id' => $id
            ]);
        }
        else {
            response()->json(['error' => 'Request failed with status code 422'], 422);
        }
    }

    public function changeColumn($id, $toId) {
        $card = Card::find($id);
        $column = Column::find($toId);
        if (($column->capacity > sizeof($column->cards)) || $column->capacity==null) {
            $card->update([
               'column_id' => $column->id
            ]);
        }
        else {
            response()->json(['error' => 'Request failed with status code 422'], 422);
        }
        return $card;
    }
}
