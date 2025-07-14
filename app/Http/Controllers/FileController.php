<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    /**
     * Безопасно отдает приватный файл.
     *
     * @param string $path
     * @return \Illuminate\Http\Response|StreamedResponse
     */
    public function servePrivateFile(string $path)
    {
        // Проверяем, существует ли файл в нашем приватном хранилище
        if (!Storage::exists($path)) {
            abort(404); // Если файла нет, выдаем ошибку 404
        }

        // Отдаем файл браузеру.
        // Браузер отобразит его, если сможет (картинку, видео), или предложит скачать.
        return Storage::response($path);
    }
}
