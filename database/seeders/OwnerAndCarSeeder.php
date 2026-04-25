<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Owner;
use App\Models\Car;

class OwnerAndCarSeeder extends Seeder
{
    public function run(): void
    {
        $owners = [
            ['name' => 'John', 'surname' => 'Smith', 'phone' => '+1234567890', 'email' => 'john@email.com', 'address' => '123 Main St'],
            ['name' => 'Jane', 'surname' => 'Doe', 'phone' => '+1234567891', 'email' => 'jane@email.com', 'address' => '456 Oak Ave'],
            ['name' => 'Mike', 'surname' => 'Johnson', 'phone' => '+1234567892', 'email' => 'mike@email.com', 'address' => '789 Pine Rd'],
            ['name' => 'Sarah', 'surname' => 'Williams', 'phone' => '+1234567893', 'email' => 'sarah@email.com', 'address' => '321 Elm St'],
            ['name' => 'Tom', 'surname' => 'Brown', 'phone' => '+1234567894', 'email' => 'tom@email.com', 'address' => '654 Maple Dr'],
            ['name' => 'Emma', 'surname' => 'Davis', 'phone' => '+1234567895', 'email' => 'emma@email.com', 'address' => '987 Cedar Ln'],
            ['name' => 'James', 'surname' => 'Wilson', 'phone' => '+1234567896', 'email' => 'james@email.com', 'address' => '147 Birch Blvd'],
            ['name' => 'Olivia', 'surname' => 'Taylor', 'phone' => '+1234567897', 'email' => 'olivia@email.com', 'address' => '258 Walnut Way'],
            ['name' => 'Liam', 'surname' => 'Anderson', 'phone' => '+1234567898', 'email' => 'liam@email.com', 'address' => '369 Spruce St'],
            ['name' => 'Sophia', 'surname' => 'Martinez', 'phone' => '+1234567899', 'email' => 'sophia@email.com', 'address' => '741 Ash Ave'],
        ];

        $cars = [
            ['reg_number' => 'ABC123', 'brand' => 'Toyota', 'model' => 'Corolla'],
            ['reg_number' => 'DEF456', 'brand' => 'Honda', 'model' => 'Civic'],
            ['reg_number' => 'GHI789', 'brand' => 'Ford', 'model' => 'Focus'],
            ['reg_number' => 'JKL012', 'brand' => 'BMW', 'model' => 'X5'],
            ['reg_number' => 'MNO345', 'brand' => 'Audi', 'model' => 'A4'],
            ['reg_number' => 'PQR678', 'brand' => 'Mercedes', 'model' => 'C200'],
            ['reg_number' => 'STU901', 'brand' => 'Volkswagen', 'model' => 'Golf'],
            ['reg_number' => 'VWX234', 'brand' => 'Nissan', 'model' => 'Qashqai'],
            ['reg_number' => 'YZA567', 'brand' => 'Hyundai', 'model' => 'Tucson'],
            ['reg_number' => 'BCD890', 'brand' => 'Kia', 'model' => 'Sportage'],
            ['reg_number' => 'EFG123', 'brand' => 'Mazda', 'model' => 'CX-5'],
            ['reg_number' => 'HIJ456', 'brand' => 'Subaru', 'model' => 'Outback'],
            ['reg_number' => 'KLM789', 'brand' => 'Volvo', 'model' => 'XC60'],
            ['reg_number' => 'NOP012', 'brand' => 'Peugeot', 'model' => '308'],
            ['reg_number' => 'QRS345', 'brand' => 'Renault', 'model' => 'Megane'],
            ['reg_number' => 'TUV678', 'brand' => 'Skoda', 'model' => 'Octavia'],
            ['reg_number' => 'WXY901', 'brand' => 'Seat', 'model' => 'Leon'],
            ['reg_number' => 'ZAB234', 'brand' => 'Fiat', 'model' => 'Tipo'],
            ['reg_number' => 'CDE567', 'brand' => 'Opel', 'model' => 'Astra'],
            ['reg_number' => 'FGH890', 'brand' => 'Chevrolet', 'model' => 'Cruze'],
        ];

        foreach ($owners as $ownerData) {
            $owner = Owner::create($ownerData);
            $numCars = rand(1, 3);
            for ($i = 0; $i < $numCars; $i++) {
                $car = array_shift($cars);
                if ($car) {
                    Car::create(array_merge($car, ['owner_id' => $owner->id]));
                }
            }
        }
    }
}
