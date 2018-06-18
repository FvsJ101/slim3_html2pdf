<?php

namespace App\Controllers\Home;

use App\Controllers\Controller;

class HomeController extends Controller
{
    
    public function index($request, $response)
    {
    
        /**
         * NOTE THAT THE AMOUNT OF CSS EFFECT THE RENDER TIME NEEDS TO BE INLINE CSS.
         *
         *
         */
        
        echo "fecth file <br>";
        $testing = $this->view->fetch('email/contact.twig', array(
            'name' => "test",
            'phone' => "test",
            'email' => "test",
            'message' => "working",
        ));
    
        echo "save the file <br>";
        file_put_contents(__DIR__ . "/testing.html", $testing);
    
        echo "load html to dompdf <br>";
        $this->dompdf->loadHtml(file_get_contents(__DIR__ . "/testing.html"));
    
        echo "render dompdf <br>";
        $this->dompdf->render();
        echo "stream dompdf <br>";
        
        $output = $this->dompdf->output();
        
        file_put_contents(__DIR__ . "/testing.pdf", $output);
        
        
        //return $this->view->render($response, 'home.twig');
        
        die("winning");
    }
    
}