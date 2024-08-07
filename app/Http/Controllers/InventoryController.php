<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Label\Label;

class InventoryController extends Controller
{
    public function show(){
        return response()->json(Inventory::all());
    }
    public function create(Request $request){
        $status = '';
        if ($request->status == 'good'){
            $status='Рабочий';
        }
        elseif ($request->status == 'bad'){
            $status='Не рабочий';
        }
        $text = "

        Тип: {$request->type}
        Модель: {$request->model}
        Характеристики: {$request->character}
        Состояние: {$status}
        Кабинет: {$request->cabinet}


";

        $label = Label::create($request->number_invent);
        $qr_code = QrCode::create($text);

        $writer = new PngWriter;
        $result = $writer->write($qr_code, null, $label);
        $result->saveToFile(storage_path("app/public/images/{$request->number_invent}.png"));

        $inventory = new Inventory();

        $inventory->model = $request->model;
        $inventory->type = $request->type;
        $inventory->number_invent = $request->number_invent;
        $inventory->character = $request->character;
        $inventory->status = $status;
        $inventory->cabinet = $request->cabinet;
        $inventory->src_qrcode = 'storage/images/'.$request->number_invent.'.png';
        $inventory->save();
        return response()->json('Инвентарь успешно добавлен!', 200);
    }
}

// /public/ storage/images/
