<?php

namespace Database\Factories;

use App\Models\UserDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDetails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => 'Yudas Malabi',
            'photo'     => '1uGIIXzzcc89stcsT4GhIcibS6WkkR1VT',
            'linkedin'  => 'https://www.linkedin.com/in/Yudas1337/',
            'gmail'     => 'yudasmalabi@gmail.com',
            'telegram'  => 'https://t.me/Yudas1337',
            'github'    => 'https://github.com/Yudas1337',
            'whatsapp'  => 'https://wa.me/send?phone=6282257181297',
            'instagram' => 'https://www.instagram.com/Yudas1337/',
            'facebook'  => 'https://www.facebook.com/yudas1337/'
        ];
    }
}
