<?php

namespace App\controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\models\ContactForm;

class SiteController extends Controller
{

    public function home()
    {
        $param = [
            'name' => 'Chuj'
        ];

        return $this->render('home', $param);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();

        if ($request->isPost()) {

            $contact->loadData($request->getBody());

            if ($contact->validate()) {
                $response->redirect('/');
            }
        }

        return $this->render('contact', [
            'model' => $contact
        ]);
    }
}


?>