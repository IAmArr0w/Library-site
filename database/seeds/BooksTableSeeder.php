<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Book;

require_once 'C:\Laravel\library\vendor\fzaninotto\faker\src\autoload.php';

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $books_pic = array('image1.jpg', 'image2.jpg', 'image3.jpg');

        // добавим 50 книг
        for ($i = 0; $i < 10; $i++) {
            Book::create([
                'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.99, $max = 44.99),
                'picrel' => $books_pic[array_rand($books_pic, 1)],
                'instock' => $faker->randomDigitNotNull,
                'author' => $faker->name,
                'type' => 'art',
                'kind' => 'ancient',
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Book::create([
                'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.99, $max = 44.99),
                'picrel' => $books_pic[array_rand($books_pic, 1)],
                'instock' => $faker->randomDigitNotNull,
                'author' => $faker->name,
                'type' => 'art',
                'kind' => 'middle',
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Book::create([
                'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.99, $max = 44.99),
                'picrel' => $books_pic[array_rand($books_pic, 1)],
                'instock' => $faker->randomDigitNotNull,
                'author' => $faker->name,
                'type' => 'art',
                'kind' => 'renaissance',
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Book::create([
                'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.99, $max = 44.99),
                'picrel' => $books_pic[array_rand($books_pic, 1)],
                'instock' => $faker->randomDigitNotNull,
                'author' => $faker->name,
                'type' => 'art',
                'kind' => 'new',
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Book::create([
                'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.99, $max = 44.99),
                'picrel' => $books_pic[array_rand($books_pic, 1)],
                'instock' => $faker->randomDigitNotNull,
                'author' => $faker->name,
                'type' => 'art',
                'kind' => 'newest',
            ]);
        }
    }
}
