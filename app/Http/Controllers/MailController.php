<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    //
    public function basic()
    {
        $data = [
            'message' => 'Bienvenidos al Workshop',
        ];

        Mail::send([], $data, function ($body) {
            $body
                ->to('samuel_-_rojas@hotmail.com', 'Samuel R.')
                ->subject('Laravel')
                ->from('samuel@devexteam', 'Samuel R.');
        });

        return response()->json([
            'response' => 'Se ha enviado correctamente el correo...',
            'code' => Response::HTTP_OK
        ]);
    }

    public function sendHTML()
    {
        $data = [
            'title' => 'Bienvenidos al Workshop',
            'message' => '',
        ];

        Mail::send([], $data, function ($body) {
            $body
                ->to('samuel_-_rojas@hotmail.com', 'Samuel R.')
                ->subject('Nuevos cursos ')
                ->from('samuel@devexteam', 'Samuel R.');
        });

        return response()->json([
            'response' => 'Se ha enviado correctamente el correo...',
            'code' => Response::HTTP_OK
        ]);
    }
}
