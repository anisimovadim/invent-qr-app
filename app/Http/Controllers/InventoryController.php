<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Label\Label;
use Illuminate\Support\Js;

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
    public function delete(Request $request){
        $inventory = Inventory::query()->where('id', $request->id)->first();
        if ($inventory){
            $inventory->delete();
            return response()->json('Инвентарь успешно удален', 200);
        } else{
            return response()->json('Инвентарь ранее был удален', 401);
        }
    }
    public function get_qrs(Request $request){
        $inventories_for_cabs = Inventory::query()->whereIn('cabinet', $request->cabinets)->pluck('src_qrcode');
        if ($inventories_for_cabs){
            return response()->json($inventories_for_cabs, 200);
        }
        return response()->json('Данные не найдены', 404);
    }
}

// /public/ storage/images/
