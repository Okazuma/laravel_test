<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $faker = FakerFactory::create('ja_JP');

        $categoryIds = [1,2,3,4,5];
        $categoryId = $this->faker->randomElement($categoryIds);
        $sentence = 'ご対応よろしくお願いいたします。';



        return [
            //
            'category_id' => $categoryId,
            'first_name' =>$this->faker->firstName(),
            'last_name' =>$this->faker->lastName(),
            'gender' =>$this->faker->randomElement([1,2,3]),
            'email' =>$this->faker->safeEmail(),
            'tel' =>$this->faker->phoneNumber(),
            'address' =>$this->faker->address(),
            'detail' =>$sentence,
        ];
    }

}


