<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MyController extends AbstractController {

    //function to render index page
    public function index() {
        return $this->render('index.html.twig');
    }

    //function to upload the image/file and render the index page casually
    public function imageUpload(Request $request){

        //getting the file from the form with key as 'myfile'
        $file = $request->files->get('myfile');

        //selecting the server directory to save the image/file
        $dir = $request->server->get('DOCUMENT_ROOT') . '/assets/files';

        $fileName = $file->getClientOriginalName();

        //with move function we are saving the file to the directory
        $file->move($dir, $fileName);

        return $this->render('index.html.twig');
    }
}