<?php
use Illuminate\support\facades\route;
use App\Http\Controllers\BarangController;
route::get('/',function (){
    return
    redirect()->route('barang.index');
});
Route::resource('barang', BarangController::class);
