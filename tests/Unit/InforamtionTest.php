<?php

namespace Tests\Unit;

use App\Models\Information;
use Tests\TestCase;

class InforamtionTest extends TestCase
{
    public function getInformationTestData()
    {
        $this->createApplication();
        return  [[[
            "name"  => "leri@mailinator.com",
            "gender" => "male",
            "email" => "kyvypo@mailinator.com",
            "phone" => 6509858785,
            "address" => "cesifyguzi@mailinator.net",
            "dob" => "2021-05-05",
            "nationality" => "Anim sit anim soluta",
            "contact_via" => "Email",
            "education_background" => "Nihil anim tenetur d"
        ]]];
    }
    /**
     * @dataProvider getInformationTestData
     */
    public function testIfInformationIsSaved($information)
    {
        $info = Information::saveToExcel($information);

        $this->assertTrue($info);
    }

    /**
     * @dataProvider getInformationTestData
     */
    public function testIfSavedDataIsRetrived($information)
    {
        $informations = Information::getExcelData();

        $this->assertEquals($information, end($informations));
    }
}
