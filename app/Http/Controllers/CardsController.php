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
            return $card;
        }
        else {
            return response()->json(['error' => 'Request failed with status code 422'], 422);
        }
    }

    public function changeColumn($id, $toId) {
        $card = Card::findOrFail($id);
        $column = Column::findOrFail($toId);
        if (($column->capacity > sizeof($column->cards)) || $column->capacity==null) {
            $card->column_id = $column->id;
            $card->save();
            return $card;
        }
        else {
            return response()->json(['error' => 'Request failed with status code 422'], 422);
        }       
    }
}
