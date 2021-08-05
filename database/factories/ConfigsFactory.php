<?php

namespace Database\Factories;

use App\Models\Configs;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Configs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'header'        => "Yudas Malabi",
            'subheader'     => "Fullstack Web and Mobile Developer",
            'sidebardesc'   => "Hi, my name is Yudas Malabi and I'm a Fullstack Web and Mobile Developer. Welcome to my personal Resume!",
            'headerdesc'    => "I'm Yudas Malabi . I'm From Indonesia . I'm a Freelancer and also Fullstack Web & Mobile Developer. I've made a lot of web and mobile application such as Educational Site , Geographic Information System , Course Site with Payment Gateway and Live Chat Integration , etc. I also love discussing new product ideas. I'm ready ASAP for working . You can contact me below if you interest with me. 😄✌️",
            'aboutphoto'    => '1pcBM6skzgvn4wi39r8Z7UH0__zxwIZ3P',
            'sidebarphoto'  => '1VCS1kh_rQkn78ItapljmzIs0ZXMJbNOT',
            'skilldesc'     => 'I have more than 3 years experience of building Website and Mobile Apps. Below are my core competencies and technologies I use.'
        ];
    }
}
