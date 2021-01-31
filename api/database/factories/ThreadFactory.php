<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $isLink = $this->faker->boolean;
        $title = $this->faker->sentence;

        $attrs = [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(6),
            'user_id' => User::factory()
        ];


        if ($isLink){
            $attrs['type'] = 'LINK';
            $attrs['thumbnail'] = $this->faker->imageUrl(560,350);
            $attrs['link'] = $this->faker->url;
        }else{
            $attrs['type'] = 'TEXT';
            $attrs['body'] = $this->faker->paragraph;
        }

        return $attrs;

    }
}
