<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $department = [
            'Finance',
            'Marketing',
            'Human Resource',
            'IT',
            'Sales',
            'Production',
            'Research and Development',
            'Purchasing',
            'Accounting',
            'Legal',
            'Services',
            'Support',
            'Training',
            'Product Management',
            'Engineering',
            'Business Development',
            'Quality Assurance',
            'Customer Service',
            'Sales and Marketing',
            'Project Management',
            'Information Technology',
        ];

        return [
            'name' => $this->faker->unique()->randomElement($department),
        ];
    }
}
