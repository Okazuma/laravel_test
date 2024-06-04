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
        $faker = $this->faker;

        $categoryIds = [1,2,3,4,5];
        $categoryId = $this->faker->randomElement($categoryIds);
        $sentence = 'ご対応よろしくお願いいたします。';

        $prefecture = $this->faker->prefecture();  // 都道府県
        $city = $this->faker->city();  // 市区町村
        $ward = $this->faker->ward();  // 区
        $town = $this->faker->streetName();  // 町名
        $buildingNumber = $this->faker->buildingNumber();  // 番地

        $address = "{$prefecture}{$city}{$ward}{$town}{$buildingNumber}";



        return [
            //
            'category_id' => $categoryId,
            'first_name' =>$this->faker->firstName(),
            'last_name' =>$this->faker->lastName(),
            'gender' =>$this->faker->randomElement([1,2,3]),
            'email' =>$this->faker->safeEmail(),
            'tel' =>$this->faker->phoneNumber(),
            'address' => $address,
            'detail' =>$sentence,
        ];
    }

}


