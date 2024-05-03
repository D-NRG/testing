<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Answer;
use App\Models\Attr;
use App\Models\Categories;
use App\Models\Category;
use App\Models\Color;
use App\Models\Manufacture;
use App\Models\Product;
use App\Models\Question;
use App\Models\Size;
use App\Models\Track;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//       $this->call(ColorSeeder::class);
//       $this->call(CategoriesSeeder::class);
//       $this->call(ManufactureSeeder::class);
//       $this->call(SizeSeeder::class);
//       $this->call(AttrSeeder::class);
//       $this->call(ProductSeeder::class);
        Color::factory(10)->create();
        Size::factory(10)->create();
        Manufacture::factory(10)->create();
        Categories::factory(10)->create();
        Product::factory(5)->create();
        Attr::factory(10)->create();
        User::factory(50)->create();

        Track::truncate();
        $this->addTracks();

        $tracks = Track::all();
        Question::truncate();
        Answer::truncate();

        $questionAndAnswers = $this->getData();
        foreach ($tracks as $track) {
            $questionAndAnswers->where('track', $track->id)->each(function ($question) {
                $createdQuestion = Question::create([
                    'text' => $question['question'],
                    'track_id' => $question['track'],
                    'points' => $question['points'],
                ]);

                collect($question['answers'])->each(function ($answer) use ($createdQuestion) {
                    Answer::create([
                        'question_id' => $createdQuestion->id,
                        'text' => $answer['text'],
                        'correct_one' => $answer['correct_one'],
                    ]);
                });
            });
        }




    }
}
