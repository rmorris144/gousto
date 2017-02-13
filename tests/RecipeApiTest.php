<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RecipeApiTest extends TestCase
{
    use WithoutMiddleware;

    public function testPostRegister()
    {
        $this->withoutMiddleware();

        $this->json('POST', '/api/register', ['username' => 'John', 'email' => 'john@gmail.com', 'password' => 'ilovecats'])
            ->seeJson([
                'username' => 'John'
            ]);
    }

    public function testGetRecipes()
    {
        $this->withoutMiddleware();

        $this->json('GET', 'api/recipes')
            ->seeJson([
               'box_type' => 'gourmet'
            ]);
    }

    public function testIndividualRecipe()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk3ZTNjNjU0Mzk4ZDVlNDAwOTliY2ExN2Y5MDQ1NzY2MGVlZGNjYWY4MDY1MGQxOTc5Y2U5MTcwYWE2ZTNlNjhkNzFjZTYzMGIzNjYyOGM5In0.eyJhdWQiOiIyIiwianRpIjoiOTdlM2M2NTQzOThkNWU0MDA5OWJjYTE3ZjkwNDU3NjYwZWVkY2NhZjgwNjUwZDE5NzljZTkxNzBhYTZlM2U2OGQ3MWNlNjMwYjM2NjI4YzkiLCJpYXQiOjE0ODY5OTI3ODksIm5iZiI6MTQ4Njk5Mjc4OSwiZXhwIjoxNTE4NTI4Nzg5LCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.WJdZtxONDAUfQrjAairkhGr6zLRRMrJspN7-g0V2SYAvLFnDPfbw7rVvPG0Ls8MS0EVMFtXjqHiZ3f6ZnKGD859Ip7FO6QNNEsqCWo030O6HAzo2XSLj0ie25B9XwS4fh3hNnfHRRH6cagxxmenOUe8rPpcMFnoRQIaUzXzDOcVr68fJR_s3CcgzVYRVKD3ZeUAXWNqzgMa9E9cGLDuwV-VdLNNdbZVMd8pd6cL_WmOrEoywlIEBcI9tExp3IMdilw_6gsHHBZceYRBACD6OVt1m4b9QsRi4jvFOl_Bh7EUl88PgrmhcBIxYaAt0cuz00WhWiITW2tyLSyI5nMAAR9OfMezmYa5qDk2A5V70qw97mEj3LitVkHV8PExjWD-dj0rHevK6zhQuO8yqxwrg-CYhD53WwjDqF0P6INygzYEdHkLZF7unerlKd9kYeD0OHATS4XOWO_qKGZSQc3wp9AfxCwZGF1AB375bee4EoSOWF_Z1Lhlpk39-umFItVFdOd2weZieHF4t4fwTYgeLaOgBur7mH5lx-zi4ZsiJJJMvt7WtM5YJYvG9RbtgT-FXL8whBobceLaEDwyxvhWK0X3Z2nZ0BWQDP8Cz9V_ise1qsWQJSb2OgujEdSHXE_kgQcfi5UPuGW55UnPX-5wYmuzW3AMACzjx7owTxrontx8';

        $headers = [
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ];

        $this->json('GET', 'api/recipes/lemon-sole', $headers)
            ->seeStatusCode(200)
            ->seeJson([
                'box_type' => 'fish'
            ]);
    }

}
