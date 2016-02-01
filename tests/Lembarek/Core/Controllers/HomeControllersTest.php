<?php

class HomeControllerTest extends TestCase
{

    /**
    * @test
    */
    public function it_visit_home_page()
    {
        $this->visit(route('home'));
    }

}

