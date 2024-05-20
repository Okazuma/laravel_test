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

        // $firstName = $this->faker->firstName;
        // $lastName = $this->faker->lastName;
        // $email = strtolower($lastName.'.'.$firstName) . '@example.com';

        // $category = Category::find($categoryId);

        // $detail = $this->generateInquiryContent($category->id,$category->content);

        return [
            //
            'category_id' => $categoryId,
            'first_name' =>$this->faker->firstName(),
            'last_name' =>$this->faker->lastName(),
            'gender' =>$this->faker->randomElement([1,2,3]),
            'email' =>$this->$faker->safeEmail(),
            'tel' =>$this->faker->phoneNumber(),
            'address' =>$this->faker->address(),
            'detail' =>$sentence,
        ];
    }

    // private function
    // generateInquiryContent($categoryKey,$categoryName)
    // {
    //     switch ($categoryKey){
    //         case 1:
    //             return $faker->text(50).''.$categoryName.'の詳細を知りたいです。';
    //         case 2:
    //             return $faker->text(50).''.$categoryName.'の手続きを教えてください。';
    //         case 3:
    //             return $faker->text(50).''.$categoryName.'がありお問い合わせをしました。';
    //         case 4:
    //             return $faker->text(50).''.$categoryName.'を電話で対応して欲しいです。';
    //         case 5:
    //             return $faker->text(50).''.$categoryName.'について知りたいです。';

    //     }

    }


