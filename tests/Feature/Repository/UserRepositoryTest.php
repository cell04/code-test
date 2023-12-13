<?php

namespace Tests\Feature\Repository;

use DTApi\Repository\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    /**
     * A basic functional to test the create or update without user id for payed customer.
     */
    public function test_create_or_update_without_id_for_payed_customer(): void
    {

        $data = array(
            'role' => 'customer',
            'name' => 'customer name',
            'company_id' => 'company id',
            'department_id' => 'department id',
            'email' => 'customer@customer.com',
            'dob_or_orgid' => 'dob',
            'phone' => '02-444-1111',
            'mobile' => '09999999999',
            'password' => 'customer password',
            'consumer_type' => 'paid',
            'username' => 'customer101',
            'post_code' => '1010',
            'address' => 'customer address',
            'city' => 'customer city',
            'town' => 'customer town',
            'country' => 'customer country',
            'reference' => 'yes',
            'additional_info' => 'customer additional info',
            'cost_place' => 'customer cost place',
            'fee' => 'customer fee',
            'time_to_charge' => '2023-05-03 14:52:09',
            'time_to_pay' => '2023-05-03 14:52:09',
            'charge_ob' => 'customer charge ob',
            'customer_id' => 'customer id',
            'charge_km' => '20',
            'maximum_km' => '50',
            'translator_ex' => 'ex',
            'new_towns' => 'new town',
            'user_towns_projects' => array('id-one', 'id-two'),
            'status' => '1'
        );

        $user = UserRepository::createOrUpdate(null, $data);

        $this->assertEquals($data['name'], $user->name);
    }

    /**
     * A basic functional to test the create or update without user id for unpayed customer.
     */
    public function test_create_or_update_without_id_for_unpayed_customer(): void
    {

        $data = array(
            'role' => 'customer',
            'name' => 'customer name',
            'company_id' => 'company id',
            'department_id' => 'department id',
            'email' => 'customer@customer.com',
            'dob_or_orgid' => 'dob',
            'phone' => '02-444-1111',
            'mobile' => '09999999999',
            'password' => 'customer password',
            'consumer_type' => 'unpaid',
            'username' => 'customer101',
            'post_code' => '1010',
            'address' => 'customer address',
            'city' => 'customer city',
            'town' => 'customer town',
            'country' => 'customer country',
            'reference' => 'yes',
            'additional_info' => 'customer additional info',
            'cost_place' => 'customer cost place',
            'fee' => 'customer fee',
            'time_to_charge' => '2023-05-03 14:52:09',
            'time_to_pay' => '2023-05-03 14:52:09',
            'charge_ob' => 'customer charge ob',
            'customer_id' => 'customer id',
            'charge_km' => '20',
            'maximum_km' => '50',
            'translator_ex' => 'ex',
            'new_towns' => 'new town',
            'user_towns_projects' => array('id-one', 'id-two'),
            'status' => '1'
        );

        $user = UserRepository::createOrUpdate(null, $data);

        $this->assertEquals($data['name'], $user->name);
    }

    /**
     * A basic functional to test the create or update with user id for payed customer.
     */
    public function test_create_or_update_with_id_for_payed_customer(): void
    {
        $data = array(
            'role' => 'customer',
            'name' => 'customer name',
            'company_id' => 'company id',
            'department_id' => 'department id',
            'email' => 'customer@customer.com',
            'dob_or_orgid' => 'dob',
            'phone' => '02-444-1111',
            'mobile' => '09999999999',
            'password' => 'customer password',
            'consumer_type' => 'paid',
            'username' => 'customer101',
            'post_code' => '1010',
            'address' => 'customer address',
            'city' => 'customer city',
            'town' => 'customer town',
            'country' => 'customer country',
            'reference' => 'yes',
            'additional_info' => 'customer additional info',
            'cost_place' => 'customer cost place',
            'fee' => 'customer fee',
            'time_to_charge' => '2023-05-03 14:52:09',
            'time_to_pay' => '2023-05-03 14:52:09',
            'charge_ob' => 'customer charge ob',
            'customer_id' => 'customer id',
            'charge_km' => '20',
            'maximum_km' => '50',
            'translator_ex' => 'ex',
            'new_towns' => 'new town',
            'user_towns_projects' => array('id-one', 'id-two'),
            'status' => '1'
        );

        $createdUser = User::create($data);

        $user = UserRepository::createOrUpdate($createdUser->id, $data);

        $this->assertEquals($data['name'], $user->name);
    }

    /**
     * A basic functional to test the create or update with user id for unpayed customer.
     */
    public function test_create_or_update_with_id_for_unpayed_customer(): void
    {
        $data = array(
            'role' => 'customer',
            'name' => 'customer name',
            'company_id' => 'company id',
            'department_id' => 'department id',
            'email' => 'customer@customer.com',
            'dob_or_orgid' => 'dob',
            'phone' => '02-444-1111',
            'mobile' => '09999999999',
            'password' => 'customer password',
            'consumer_type' => 'unpaid',
            'username' => 'customer101',
            'post_code' => '1010',
            'address' => 'customer address',
            'city' => 'customer city',
            'town' => 'customer town',
            'country' => 'customer country',
            'reference' => 'yes',
            'additional_info' => 'customer additional info',
            'cost_place' => 'customer cost place',
            'fee' => 'customer fee',
            'time_to_charge' => '2023-05-03 14:52:09',
            'time_to_pay' => '2023-05-03 14:52:09',
            'charge_ob' => 'customer charge ob',
            'customer_id' => 'customer id',
            'charge_km' => '20',
            'maximum_km' => '50',
            'translator_ex' => 'ex',
            'new_towns' => 'new town',
            'user_towns_projects' => array('id-one', 'id-two'),
            'status' => '1'
        );

        $createdUser = User::create($data);

        $user = UserRepository::createOrUpdate($createdUser->id, $data);

        $this->assertEquals($data['name'], $user->name);
    }

    /**
     * A basic functional to test the create or update without user id for translator.
     */
    public function test_create_or_update_without_id_for_translator(): void
    {

        $data = array(
            'role' => 'translator',
            'name' => 'translator name',
            'company_id' => 'company id',
            'department_id' => 'department id',
            'email' => 'translator@translator.com',
            'dob_or_orgid' => 'dob',
            'phone' => '02-444-1111',
            'mobile' => '09999999999',
            'password' => 'translator password',
            'translator_type' => 'type',
            'new_towns' => 'new town',
            'worked_for' => 'yes',
            'gender' => 'male',
            'translator_level' => '2',
            'additional_info' => 'additional info',
            'post_code' => '1010',
            'address' => 'address',
            'address_2' => 'address two',
            'town' => 'town',
            'user_language' => array('english', 'filipino'),
            'new_towns' => 'new town',
            'user_towns_projects' => array('id-one', 'id-two'),
            'status' => '1'
        );

        $user = UserRepository::createOrUpdate(null, $data);

        $this->assertEquals($data['name'], $user->name);
    }

    /**
     * A basic functional to test the create or update with user id for translator.
     */
    public function test_create_or_update_with_id_for_translator(): void
    {

        $data = array(
            'role' => 'translator',
            'name' => 'translator name',
            'company_id' => 'company id',
            'department_id' => 'department id',
            'email' => 'translator@translator.com',
            'dob_or_orgid' => 'dob',
            'phone' => '02-444-1111',
            'mobile' => '09999999999',
            'password' => 'translator password',
            'translator_type' => 'type',
            'new_towns' => 'new town',
            'worked_for' => 'yes',
            'gender' => 'male',
            'translator_level' => '2',
            'additional_info' => 'additional info',
            'post_code' => '1010',
            'address' => 'address',
            'address_2' => 'address two',
            'town' => 'town',
            'user_language' => array('english', 'filipino'),
            'new_towns' => 'new town',
            'user_towns_projects' => array('id-one', 'id-two'),
            'status' => '1'
        );

        $createdUser = User::create($data);

        $user = UserRepository::createOrUpdate($createdUser->id, $data);

        $this->assertEquals($data['name'], $user->name);
    }
}
