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
            'body' => "My money's in that office, right? If she start giving me some bullshit about it ain't there, and we got to go someplace else and get it, I'm gonna shoot you in the head then and there. Then I'm gonna shoot that bitch in the kneecaps, find out where my goddamn money is. She gonna tell me too. Hey, look at me when I'm talking to you, motherfucker. You listen: we go in there, and that nigga Winston or anybody else is in there, you the first motherfucker to get shot. You understand?
            ",
        ];

        Mail::send('email.testing', $data, function ($body) use ($data) {
            $body
                ->to('samuel_-_rojas@hotmail.com', 'Samuel R.')
                ->subject("Nuevos cursos {$data['title']}")
                ->from('samuel@devexteam', 'Samuel R.');
        });

        return response()->json([
            'response' => 'Se ha enviado correctamente el correo...',
            'code' => Response::HTTP_OK
        ]);
    }

    public function sendTemplate()
    {
        $data = [
            'title' => 'Bienvenidos al Workshop',
            'body' => "My money's in that office, right? If she start giving me some bullshit about it ain't there, and we got to go someplace else and get it, I'm gonna shoot you in the head then and there. Then I'm gonna shoot that bitch in the kneecaps, find out where my goddamn money is. She gonna tell me too. Hey, look at me when I'm talking to you, motherfucker. You listen: we go in there, and that nigga Winston or anybody else is in there, you the first motherfucker to get shot. You understand?
            ",
        ];

        Mail::send('email.template', $data, function ($body) use ($data) {
            $body
                ->to('samuel_-_rojas@hotmail.com', 'Samuel R.')
                ->subject("Nuevos cursos {$data['title']}")
                ->from('samuel@devexteam', 'Samuel R.');
        });

        return response()->json([
            'response' => 'Se ha enviado correctamente el correo...',
            'code' => Response::HTTP_OK
        ]);
    }
}
