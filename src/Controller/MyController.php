<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MyController extends AbstractController {


    public function index() {

        return $this->render('index.html.twig');
    }


    public function imageUpload(Request $request){

        $file = $request->files->get('myfile');
        $dir = $request->server->get('DOCUMENT_ROOT') . '/assets/files';

        $fileName = $file->getClientOriginalName();
        $file->move($dir, $fileName);

        return $this->render('index.html.twig');
    }
}