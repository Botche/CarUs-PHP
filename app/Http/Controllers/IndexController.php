<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // Get data from DB in here and pass it to the view

        return view('index.index', [
            'title' => 'Welcome to CarUs!',
            'text' => '
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h2 class="d-flex text-center align-middle">Here you will find everything you need for your next dream car based
                            on YOUR criteria!</h2>
                    </div>
                    <div class="col-sm">
                        <figure class="figure">
                            <img src="https://images.unsplash.com/photo-1592840062661-a5a7f78e2056?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1189&q=80"
                             width="450px" height="350px"
                                class="figure-img img-fluid rounded mx-auto text-center">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="lead text-center text-decoration-underline fw-bold">
                <a href="/cars">Head over to the car offers tab for more info!</a>
            </div>'
        ]);
    }
}
